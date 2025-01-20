<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function showPage1()
    {
        return view('register.page1');
    }

    public function submitPage1(Request $request)
    {
        $request->validate([
            'group_name' => 'required|string|max:255|unique:registrations,group_name',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[A-Z]/',    // Must have uppercase
                'regex:/[a-z]/',    // Must have lowercase
                'regex:/[0-9]/',    // Must have a number
                'regex:/[@$!%*?&#]/', // Must have a special character
                'confirmed',       // Must match confirm password
            ],
            'password_confirmation' => 'required',
            'binusian_status' => 'required|in:Binusian,Non-Binusian',
        ]);

        session([
            'group_name' => $request->group_name,
            'password' => bcrypt($request->password), // Hash the password
            'binusian_status' => $request->binusian_status,
        ]);

        return redirect()->route('register.page2');
    }

    public function showPage2()
    {
        return view('register.page2');
    }

    public function submitPage2(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:registrations,email',
            'whatsapp' => 'required|string|max:15',
            'line_id' => 'required|string|max:50|unique:registrations,line_id',
            'github_id' => 'required|string|max:100',
            'birthplace' => 'required|string|max:100',
            'birthdate' => 'required|date',
            'cv' => 'required|mimes:pdf|max:2048',
            'flazz_card' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'id_card' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ], [
            'email.unique' => 'Email is already taken, please use another one.',
            'line_id.unique' => 'Line ID is already taken, please use another one.',
            'email.email' => 'Please enter a valid email like user@gmail.com.',
        ]);

        // Store the files
        $cvPath = $request->file('cv')->store('uploads/cv', 'public');
        $flazzCardPath = $request->file('flazz_card') 
            ? $request->file('flazz_card')->store('uploads/flazz_cards', 'public') 
            : null; // Optional for Flazz Card
        $idCardPath = $request->file('id_card') 
            ? $request->file('id_card')->store('uploads/id_cards', 'public') 
            : null; // Optional for ID Card
    
        // Save the registration data
        Registration::create([
            'group_name' => session('group_name'),
            'password' => session('password'),
            'binusian_status' => session('binusian_status'),
            'full_name' => $request->full_name,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'line_id' => $request->line_id,
            'github_id' => $request->github_id,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'cv' => $cvPath,
            'flazz_card' => $flazzCardPath,
            'id_card' => $idCardPath,
        ]);

        // Redirect to the success page or confirmation
        return redirect()->route('login')->with('message', 'Registration successful!');
    }

}
