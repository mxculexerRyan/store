<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

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
            $file->move(public_path('uploads/images/'.$id.'/'),$filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $notification  = array(
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function account(){
        $id = Auth::user()->id;
        $profileData = user::find($id);
        return view('features.account', compact('profileData'));
    }

    public function account_update(Request $request){
        // validation
        
        $request->validate([
            'cpassword' => 'required',
            'password' => 'required|confirmed',

        ]);

        $id = Auth::user()->id;
        $data = user::find($id);

        if (!Hash::check($request->cpassword, $data->password)){
            $notification  = array(
                'message' => 'Current Password Does Not Match',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{

            user::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->password)
            ]);

            $notification  = array(
                'message' => 'Password Updated Succesfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

    }
}
