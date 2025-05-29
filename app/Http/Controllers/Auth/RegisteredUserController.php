<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Otp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'contact_no' => ['required', 'string', 'max:15'], // Aligned with frontend
            'show_terms' => ['required', 'accepted'], // Validate show_terms
            'terms_accepted' => ['required', 'accepted'],
        ]);

        // Generate secure OTP
        $otp = sprintf("%06d", random_int(0, 999999));

        // Store OTP in the database (hashed)
        try {
            Otp::create([
                'email' => $request->email,
                'otp' => Hash::make($otp),
                'expires_at' => now()->addMinutes(10),
            ]);
        } catch (\Exception $e) {
            \Log::error('Failed to store OTP', ['email' => $request->email, 'error' => $e->getMessage()]);
            return response()->json(['errors' => ['email' => 'Failed to generate OTP. Please try again.']], 500);
        }

        // Send OTP via email
        try {
            Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
                $message->to($request->email)->subject('Your OTP Code');
            });
        } catch (\Exception $e) {
            \Log::error('Failed to send OTP', ['email' => $request->email, 'error' => $e->getMessage()]);
            return response()->json(['errors' => ['email' => 'Failed to send OTP: ' . $e->getMessage()]], 500);
        }

        // Store registration data in session
        session([
            'registration_data' => $request->only(['name', 'email', 'password', 'contact_no', 'terms_accepted']),
        ]);

        return response()->json(['email' => $request->email]);
    }

    public function verifyOtp(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'string', 'email'],
                'otp' => ['required', 'string', 'size:6'],
                'terms_accepted' => ['required'], // Accept string 'true'
            ]);

            // Find the OTP record
            $otpRecord = Otp::where('email', $request->email)
                ->where('expires_at', '>', now())
                ->first();

            if (!$otpRecord || !Hash::check($request->otp, $otpRecord->otp)) {
                \Log::warning('OTP verification failed', ['email' => $request->email]);
                return response()->json(['errors' => ['otp' => 'The OTP is invalid or has expired.']], 422);
            }

            // Retrieve registration data from session
            $data = session('registration_data');

            if (!$data || $data['email'] !== $request->email) {
                return response()->json(['errors' => ['otp' => 'Session expired. Please register again.']], 422);
            }

            // Create the user
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'contact_no' => $data['contact_no'],
                'terms_accepted' => filter_var($request->terms_accepted, FILTER_VALIDATE_BOOLEAN),
            ]);

            // Fire the Registered event
            event(new Registered($user));

            // Log the user in
            Auth::login($user);

            // Clear session and OTP
            session()->forget('registration_data');
            $otpRecord->delete();

            return response()->json(['message' => 'Registration successful']);
        } catch (\Exception $e) {
            \Log::error('OTP Verification Error', ['email' => $request->email, 'error' => $e->getMessage()]);
            return response()->json(['errors' => ['otp' => 'An error occurred. Please try again.']], 500);
        }
    }

    public function resendOtp(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'string', 'email'],
            ]);

            // Verify session data
            $data = session('registration_data');
            if (!$data || $data['email'] !== $request->email) {
                return response()->json(['errors' => ['email' => 'No registration found for this email.']], 422);
            }

            // Generate new OTP
            $otp = sprintf("%06d", random_int(0, 999999));

            // Delete old OTPs for this email
            Otp::where('email', $request->email)->delete();

            // Store new OTP (hashed)
            Otp::create([
                'email' => $request->email,
                'otp' => Hash::make($otp),
                'expires_at' => now()->addMinutes(10),
            ]);

            // Send OTP via email
            Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
                $message->to($request->email)->subject('Your OTP Code');
            });

            return response()->json(['message' => 'OTP resent']);
        } catch (\Exception $e) {
            \Log::error('Failed to resend OTP', ['email' => $request->email, 'error' => $e->getMessage()]);
            return response()->json(['errors' => ['email' => 'Failed to send OTP: ' . $e->getMessage()]], 500);
        }
    }
}