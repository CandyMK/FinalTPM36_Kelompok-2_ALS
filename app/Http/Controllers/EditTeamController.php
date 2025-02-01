<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EditTeamController extends Controller
{
    public function index($id) {
        $groupDetails = $this->getUserDetailsById($id);
        return view('admin/adminPanel-edit')->with('group', $groupDetails);
    }

    public function getUserDetailsById($id) {
        return DB::table('users')->where('id', '=', $id)->first();
    }

    public function update(Request $request, $id) {
        // Validate the request
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'whatsapp' => 'required|string|max:255',
            'lineid' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
            'birthplace' => 'required|string|max:255',
            'birthdate' => 'required|date',
        ]);

        // Update the user in the database
        DB::table('users')->where('id', $id)->update([
            'name' => $request->fullname,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            'lineid' => $request->lineid,
            'github' => $request->github,
            'birthplace' => $request->birthplace,
            'birthdate' => $request->birthdate,
            'updated_at' => now(),
        ]);

        // Redirect back with a success message
        return redirect()->route('admin.dashboard')->with('success', 'Team member updated successfully!');
    }
}