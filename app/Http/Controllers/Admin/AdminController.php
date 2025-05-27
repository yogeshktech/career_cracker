<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Mail\StudentWelcome;
use App\Models\User;
use App\Models\Order;
use App\Models\Course;
use App\Models\OrderCourse;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function showLoginForm(): View
    {
        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard(): View
    {
        $courses = Course::count();
        $users = User::get()->count();
        $orders = Order::count();
        return view('admin.dashboard',compact('orders','users','courses'));
    }

    public function profile(): View
    {
        return view('admin.profile', ['admin' => Auth::guard('admin')->user()]);
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:admins,email,' . $admin->id],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png', 'max:5120'],
            'current_password' => [
                'nullable',
                'string',
                function ($attribute, $value, $fail) use ($admin) {
                    if (!Hash::check($value, $admin->password)) {
                        $fail('The current password is incorrect.');
                    }
                }
            ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $profile_image = $admin->profile_image;

        if ($request->hasFile('profile_image')) {
            if ($profile_image && file_exists(public_path($profile_image))) {
                unlink(public_path($profile_image));
            }
            $image = $request->file('profile_image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = public_path('uploads/admins');
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $image->move($path, $filename);
            $profile_image = 'uploads/admins/' . $filename;
        }

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $admin->password,
            'profile_image' => $profile_image,
        ]);

        return redirect()->route('admin.profile')->with('status', 'Profile updated successfully.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }


    public function index()
    {
        $students = User::get();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'contact_no' => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'contact_no' => $request->contact_no,
        ]);

        // Assign 'student' role (assuming Spatie Laravel Permission)


        // Send welcome email
        Mail::to($user->email)->send(new StudentWelcome($user, $request->password));

        return redirect()->route('admin.students.index')->with('success', 'Student added successfully.');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }

}