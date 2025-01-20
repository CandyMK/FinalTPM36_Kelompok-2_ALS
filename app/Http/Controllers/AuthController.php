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
        return view('auth.login');
    }

    public function Login(Request $request) {
        $request->validate([
            'group_name' => 'required',
            'password' => 'required',
        ]);
    
        $user = Registration::where('group_name', $request->group_name)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user); 
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
