<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hr\Shareholder;
use DB;

class ShareHolderController extends Controller
{
    //
    public function index(){
        $shareholderData = Shareholder::latest()->where('status', '=', 'available')->get();
        return view('roster.human_resource.shareholders', compact('shareholderData'));
    }

    public function add(Request $request){
        $request->validate([
            'shareholders_name'     => 'required',
            'shareholders_email'    => 'required',
            'shareholders_phone'    => 'required',
            'shareholders_location' => 'required',
            'payment_method'        => 'required',
            'shareholders_account'  => 'required',
            'role_name'             => 'required',
            'created_at'            => date("Y-m-d H:i:s"),
            'updated_at'            => date("Y-m-d H:i:s"),
        ]);

        $shareholders_name  = $request->shareholders_name;
        $shareholders_email = $request->shareholders_email;
        $shareholders_phone = $request->shareholders_phone;
        $shareholders_location = $request->shareholders_location;
        $payment_method = $request->payment_method;
        $shareholders_account = $request->shareholders_account;
        $role_name      = $request->role_name;

        $data = array(
            'name'      => $shareholders_name,
            'email'     => $shareholders_email,
            'phone'     => $shareholders_phone,
            'location'  => $shareholders_location,
            'payement_method'  => $payment_method,
            'account_number'  => $shareholders_account,
            'role'   => $role_name,
        );
        
        DB::table('shareholders')->insert($data);

        $notification  = array(
        'message'    => 'New Shareholder Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function shareholderslist(){
        $shareholdersList = Shareholder::latest()->get();
        return response()->json(array('msg'=> $shareholdersList), 200);
    }

    public function userdelete(){
        $userId = $_GET['id'];

        $userData = Shareholder::find($userId);
        $userData->status = 'unavailable';
        $userData->save();

        return response()->json(array('msg'=> $userData), 200);
    }

    public function shareholdersData(){
        $id = $_GET['id'];
        $shareholdersData = DB::table('shareholders')->where("id","=", $id)->get();
        return response()->json(array('msg'=> $shareholdersData), 200);
    }

    public function edit(Request $request){
        $id   = $request->shareholders_id;
        $name   = $request->shareholders_name;
        $email   = $request->shareholders_email;
        $phone   = $request->shareholders_phone;
        $location   = $request->shareholders_location;
        $role   = $request->role_name;

        $shareholdersData = Shareholder::find($id);
        $shareholdersData->name = $name;
        $shareholdersData->email = $email;
        $shareholdersData->phone = $phone;
        $shareholdersData->location = $location;
        $shareholdersData->role = $role;
        $shareholdersData->save();

        $notification  = array(
            'message' => 'Shareholder Updated',
            'alert-type' => 'success'
            );
    
        return redirect()->back()->with($notification);
    }
}
