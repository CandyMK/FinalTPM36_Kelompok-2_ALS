<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    
    public function showUserDashboard()
    {
        $groupName = session('group_name'); 
        // dd($groupName);
        $user = Registration::where('group_name', $groupName)->first();
        // dd($user);


        // $registrations = Registration::all();
        return view('userDashboard', compact('user'));
    }
}



