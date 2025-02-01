<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ViewTeamController extends Controller
{
    
    public function index($id, Request $request) {
        $listOfTeams = $this->getTeamsByGroupId($id);
        $groupDetails = $this->getGroupDetailsById($id);

        $isEdit = $request->query('edit');        
        if($isEdit) session(['status' => 'Edit']);
        
        return view('admin/adminPanel-view')
        ->with('listOfTeams', $listOfTeams)
        ->with('group', $groupDetails);
    }

    public function getGroupDetailsById($id) {
        return DB::table('groups')->where('id','=',$id)->get()->first();
    }

    public function getTeamsByGroupId(string $id) {
        return DB::table('users')->where('group_id', '=', $id)->get();
    }


}
