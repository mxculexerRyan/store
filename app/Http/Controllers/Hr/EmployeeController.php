<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;

class EmployeeController extends Controller
{
    public function index() { 
        $employeeData = User::latest()->get();
        return view('roster.human_resource.employees', compact('employeeData'));
    }

    public function add(Request $request){
        $notification  = array(
        'message' => 'New Brand Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
