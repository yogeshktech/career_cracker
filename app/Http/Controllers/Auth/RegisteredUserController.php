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
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request with OTP.
     */
    public function store(Request $request)
    {
        // Validate the registration form
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'contact_no' => ['nullable', 'string', 'max:15'],
            'terms' => ['accepted'],
        ]);

        // Generate OTP
        $otp = rand(100000, 999999);

        // Store OTP in the database
        Otp::create([
            'email' => $request->email,
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10),
        ]);

        // Send OTP via email
        Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
            $message->to($request->email)->subject('Your OTP Code');
        });

        // Store registration data in session
        session([
            'registration_data' => $request->only(['name', 'email', 'password', 'contact_no']),
        ]);

        // Return JSON response for AJAX
        return response()->json(['email' => $request->email]);
    }

    /**
     * Verify the OTP and complete registration.
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'otp' => ['required', 'string', 'size:6'],
        ]);

        // Find the OTP record
        $otpRecord = Otp::where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('expires_at', '>', now())
            ->first();

        if (!$otpRecord) {
            return response()->json(['errors' => ['otp' => 'Invalid or expired OTP.']], 422);
        }

        // Retrieve registration data from session
        $data = session('registration_data');

        if (!$data || $data['email'] !== $request->email) {
            return response()->json(['errors' => ['otp' => 'Session data mismatch. Please try registering again.']], 422);
        }

        // Create the user
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'contact_no' => $data['contact_no'],
        ]);

        // Fire the Registered event
        event(new Registered($user));

        // Log the user in
        Auth::login($user);

        // Clear session and OTP
        session()->forget('registration_data');
        $otpRecord->delete();

        // Return success response
        return response()->json(['message' => 'Registration successful']);
    }

    /**
     * Resend OTP.
     */
    public function resendOtp(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // Generate new OTP
        $otp = rand(100000, 999999);

        // Delete old OTPs for this email
        Otp::where('email', $request->email)->delete();

        // Store new OTP
        Otp::create([
            'email' => $request->email,
            'otp' => $otp,
            'expires_at' => now()->addMinutes(10),
        ]);

        // Send OTP via email
        Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
            $message->to($request->email)->subject('Your OTP Code');
        });

        return response()->json(['message' => 'OTP resent']);
    }
}
