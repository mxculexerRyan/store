<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;

class FeaturesController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $profileData = user::find($id);
        $role_id = $profileData->role_id;
        $role = role::find($role_id);
        
        return view('features.profile', compact('profileData', 'role'));
    }

    public function profile_update(Request $request){

        $id = Auth::user()->id;
        $data = user::find($id);
        $data->name = $request->name;
        $data->uname = $request->uname;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $filename = "IMG_".date('YmdHi')."_".$file->getClientOriginalName();
            $file->move(public_path('uploads/images'),$filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();
        return redirect()->back();
    }
}
