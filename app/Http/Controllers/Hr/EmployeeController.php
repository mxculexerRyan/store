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
}
