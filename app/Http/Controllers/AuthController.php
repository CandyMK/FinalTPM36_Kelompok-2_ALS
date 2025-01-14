<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function ShowRegisterForm() {
        return view('auth.register');
    }

    public function Register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            return redirect()->route('login')->with('success', 'Registration successful.');
        } catch (\Exception $error) {
            Log::error('Registration failed', [
                'error' => $error->getMessage(),
                'input' => $request->all()
            ]);
            return back()->withErrors(['error' => 'An error has occurred. Please check your input again.']);
        }
    }

    public function ShowLoginForm() {
        return view('auth.login');
    }

    public function Login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Login successful.');
        } else {
            return redirect()->route('login')->with('error', 'Login failed, please try again.');
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
