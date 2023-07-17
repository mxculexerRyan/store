<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FeaturesController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $profileData = user::find($id);
        
        return view('features.profile', compact('profileData'));
    }
}
