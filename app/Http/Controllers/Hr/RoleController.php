<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hr\Role;
use DB;

class RoleController extends Controller
{
    public function index(){
        $roleData = Role::latest()->get();
        return view('roster.human_resource.roles', compact('roleData'));
    }

    public function add(Request $request){
        $request->validate([
            'role_name'     => 'required',
            'created_at'            => date("Y-m-d H:i:s"),
            'updated_at'            => date("Y-m-d H:i:s"),
        ]);

        $role_name  = $request->role_name;

        $data = array(
            'roles'      => $role_name,
        );
        
        DB::table('roles')->insert($data);

        $notification  = array(
        'message'    => 'New Shareholder Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
