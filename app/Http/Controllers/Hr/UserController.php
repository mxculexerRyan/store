<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    //
    public function userslist() { 
        $userList = User::latest()->get();
        return response()->json(array('msg'=> $userList), 200);
    }
}