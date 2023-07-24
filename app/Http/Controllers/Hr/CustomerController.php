<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use DB;

class CustomerController extends Controller
{
    public function index() { 
        $customerData = Customer::latest()->get();
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
            'customer_name'      => $customer_name,
            'customer_email'     => $customer_email,
            'customer_phone'     => $customer_phone,
            'customer_location'  => $customer_location,
            'customer_bank'      => $customer_bank,
            'customer_account'   => $customer_account,
        );
        
        DB::table('customers')->insert($data);

        $notification  = array(
        'message'    => 'New customer Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
