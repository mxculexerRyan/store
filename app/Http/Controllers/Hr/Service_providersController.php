<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hr\Shareholder;
use DB;

class Service_providersController extends Controller
{
    public function index(){
        $serviceProviderData = Shareholder::latest()->where('role', '=', '8')->get();
        return view('roster.human_resource.service_providers', compact('serviceProviderData'));
    }

    public function add(Request $request){
        $request->validate([
            'service_provider_name'     => 'required',
            'service_provider_email'    => 'required',
            'service_provider_phone'    => 'required',
            'service_provider_location' => 'required',
            'service_provider_bank'     => 'required',
            'service_provider_account'  => 'required',
            'providers_photo'           => 'required',
        ]);

        $provider_name      = $request->service_provider_name;
        $provider_email     = $request->service_provider_email;
        $provider_phone     = $request->service_provider_phone;
        $provider_location  = $request->service_provider_location;
        $provider_bank      = $request->service_provider_bank;
        $provider_account   = $request->service_provider_account;
        $providers_photo    = "";

        if($request->file('providers_photo')){
            $file     = $request->file('providers_photo');
            $filename = "provider_".date('YmdHi')."_".$file->getClientOriginalName();
            $file->move(public_path('uploads/providers/'),$filename);
            $providers_photo = $filename;
        }

        $data = array(
            'name'               => $provider_name,
            'email'              => $provider_email,
            'phone'              => $provider_phone,
            'location'           => $provider_location,
            'payement_method'      => $provider_bank,
            'account_number'     => $provider_account,
            'photo'              => $providers_photo,
            'role'               => '8',
            'created_at'         => date("Y-m-d H:i:s"),
            'updated_at'         => date("Y-m-d H:i:s"),
        );
        
        DB::table('shareholders')->insert($data);

        $notification  = array(
        'message'    => 'New Partner Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
