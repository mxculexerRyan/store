<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use DB;

class PartnerController extends Controller
{
    public function index(){
        $partnerData = Partner::latest()->get();
        return view('roster.human_resource.partners', compact('partnerData'));
    }

    public function add(Request $request){
        $request->validate([
            'partner_name'     => 'required',
            'partner_email'    => 'required',
            'partner_phone'    => 'required',
            'partner_location' => 'required',
            'partner_bank'     => 'required',
            'partner_account'  => 'required',
        ]);

        $partner_name      = $request->partner_name;
        $partner_email     = $request->partner_email;
        $partner_phone     = $request->partner_phone;
        $partner_location  = $request->partner_location;
        $partner_bank      = $request->partner_bank;
        $partner_account   = $request->partner_account;

        $data = array(
            'name'              => $partner_name,
            'partner_email'     => $partner_email,
            'partner_phone'     => $partner_phone,
            'partner_location'  => $partner_location,
            'partner_bank'      => $partner_bank,
            'partner_account'   => $partner_account,
            'created_at'            => date("Y-m-d H:i:s"),
            'updated_at'            => date("Y-m-d H:i:s"),
        );
        
        DB::table('partners')->insert($data);

        $notification  = array(
        'message'    => 'New Partner Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
