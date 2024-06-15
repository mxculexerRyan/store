<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hr\Shareholder;
use DB;

class CustomerController extends Controller
{
    public function index() { 
        $customerData = Shareholder::latest()->where('role', '=', '5')->get();
        return view('roster.human_resource.customers', compact('customerData'));
    }

    public function add(Request $request){
        $request->validate([
            'customer_name'     => 'required',
            'customer_email'    => 'required',
            'customer_phone'    => 'required',
            'customer_location' => 'required',
            'customer_bank'     => 'required',
            'customer_account'  => 'required',
        ]);

        $customer_name      = $request->customer_name;
        $customer_email     = $request->customer_email;
        $customer_phone     = $request->customer_phone;
        $customer_location  = $request->customer_location;
        $customer_bank      = $request->customer_bank;
        $customer_account   = $request->customer_account;

        $data = array(
            'name'              => $customer_name,
            'email'             => $customer_email,
            'phone'             => $customer_phone,
            'location'          => $customer_location,
            'payement_method'   => $customer_bank,
            'account_number'    => $customer_account,
            'role'              => '5',
            'created_at'        => date("Y-m-d H:i:s"),
            'updated_at'        => date("Y-m-d H:i:s"),
        );
        
        DB::table('shareholders')->insert($data);

        $notification  = array(
        'message'    => 'New customer Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
