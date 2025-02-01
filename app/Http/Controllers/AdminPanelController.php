<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminPanelController extends Controller
{
    public function index(Request $request) {
        $listOfGroups = [];
        $orderBy = $request->query('sortBy', 'asc');
        $column = $request->query('column', 'name');
        $search = $request->query('search');

        // Fetch Data from MySQL
        if(!empty($search)) {
            $listOfGroups = $this->searchGroup($search);
        } else {
            $listOfGroups = $this->fetchGroup($orderBy, $column);
        }
        
        $listOfSortOptions = [
            ['column' => 'name','sortBy' => 'asc', 'name' => 'Team Name A-Z'],
            ['column' => 'name','sortBy' => 'desc', 'name' => 'Team Name Z-A'],
            ['column' => 'created_at','sortBy' => 'desc', 'name' => 'Oldest Registration Date'],
            ['column' => 'created_at','sortBy' => 'asc', 'name' => 'Latest Registration Date'],
        ];
        
        return view('admin/adminPanel-show' )
                ->with('listOfGroups', $listOfGroups)
                ->with('listOfSortOptions', $listOfSortOptions);
    }

    public function fetchGroup(String $orderBy,String $column) {
        return DB::table('groups')->orderBy($column, $orderBy)->get();        
    }

    public function searchGroup(string $search) {        
        return  DB::table('groups')->where('name', 'like', $search)->get();
    }

    public function deleteGroup($id) {
        $deleted = DB::table('groups')->where('id', '=', $id)->delete();
        if(!$deleted) {
            return redirect()->route('admin.dashboard')->with('error', 'Failed to Delete Group');
        }
        return redirect()->route('admin.dashboard')->with('success', 'Group Deleted');
    }
    

    public function showTeamDetails($teamId)
    {
    $team = DB::table('teams')->where('id', $teamId)->first();
    $members = DB::table('team_members')->where('team_id', $teamId)->get();

    return view('adminPanel-view', compact('team', 'members'));
    }
}
