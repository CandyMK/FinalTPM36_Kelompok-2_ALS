<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.adminPanel-login'); // Adjust the view path as necessary
    }

    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->username, 'password' => $request->password, 'role' => 'admin'])) {
            // Redirect to the admin dashboard
            return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully!');
        }

        // If login fails, redirect back with an error message
        return redirect()->back()->withErrors(['username' => 'Invalid credentials.'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully!');
    }
}