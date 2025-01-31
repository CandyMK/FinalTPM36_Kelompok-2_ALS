<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function showUserDashboard()
    {
        $registrations = Registration::all();
        return view('userDashboard', compact('registrations'));
    }
}



