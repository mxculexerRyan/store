<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class EmployeeController extends Controller
{
    public function index() { 
        $employeeData = User::latest()->get();
        return view('roster.human_resource.employees', compact('employeeData'));
    }

    public function add(Request $request){
        $request->validate([
            'employee_name'  => 'required',
            'employee_email' => 'required',
            'employee_phone' => 'required',
            'role_name'      => 'required',
            'password'       => 'required',
            'created_at'     => date("Y-m-d H:i:s"),
            'updated_at'     => date("Y-m-d H:i:s"),
        ]);

        $employee_name  = $request->employee_name;
        $employee_email = $request->employee_email;
        $employee_phone = $request->employee_phone;
        $role_name      = $request->role_name;
        $password       = Hash::make('$request->password');

        $data = array(
            'name'      => $employee_name,
            'uname'     => $employee_name,
            'email'     => $employee_email,
            'phone'     => $employee_phone,
            'role_id'   => $role_name,
            'password'  => $password,
        );
        
        DB::table('users')->insert($data);

        $notification  = array(
        'message'    => 'New Employee Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
