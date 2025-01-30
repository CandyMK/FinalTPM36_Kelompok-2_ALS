<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index() {
        /*  Admin Panel : Front-End
        * 1. Middleware for Role Authorization
        * 2. Using Token System is Recommended
        */
    }

    /**
     * Get users by group ID.
     * @param string $group_id The group ID to filter by.
     */
    public function getUsersByGroupId(string $group_id)
    {
        $participants = \DB::table('participants')->where('group_id', $group_id)->get();
        return response()->json($participants);
    }

    /**
     * Get all groups.
     */
    public function getAllGroups()
    {
        $groups = \DB::table('groups')->get();
        return response()->json($groups);
    }

        /**
     * Edit participant details.
     * @param int $userld The participant ID to edit.
     */
    public function editParticipants(int $userld, Request $request)
    {
        \DB::table('participants')->where('id', $userld)->update([
            'name' => $request->input('name'),
            'other' => $request->input('other')
        ]);
        return response()->json(['message' => 'Participant updated successfully']);
    }

        /**
     * Delete a participant.
     * @param int $userld The participant ID to delete.     
     */
    public function deleteParticipants(int $userld)
    {
        \DB::table('participants')->where('id', $userld)->delete();
        return response()->json(['message' => 'Participant deleted successfully']);
    }
}