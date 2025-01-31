<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function ShowLoginForm() {

        if (Auth::check()) {
            return redirect()->route('userDashboard');
        }
        return view('auth.login');
    }

    public function Login(Request $request) {
        // Validate the input fields
        $request->validate([
            'group_name' => 'required',
            'password' => 'required',
        ]);

        $groupName = trim($request->group_name);

        $user = Registration::where('group_name', $groupName)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user); 
            
            $request->session()->regenerate();
            $request->session()->put('group_name', $user->group_name);

            // dd('User is logged in');
            return redirect()->route('userDashboard')->with('success', 'Login successful.');
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
