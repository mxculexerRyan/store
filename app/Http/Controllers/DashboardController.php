<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(isset(Auth::user()->role_id)){
            $role = Auth::user()->role_id;
            if($role == '2'){
                return view('owner.dashboard');
            }
            if($role == '3'){

                return view('admin.dashboard');
            }else{
                return view('dashboard');
            }

        }else{
            return redirect()->route('login');
        }
    }

    public function Logout(){
        Auth::logout();
        return redirect()->route('dashboard');
    }
}
