<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Hr\Shareholder;
use DB;

class SupplierController extends Controller
{
    public function index() { 
        $supplierData = Shareholder::latest()->where('role', '=', '6')->get();
        return view('roster.human_resource.suppliers', compact('supplierData'));
    }

    public function add(Request $request){
        $request->validate([
            'name'              => 'required',
            'supplier_email'    => 'required',
            'supplier_phone'    => 'required',
            'supplier_location' => 'required',
            'supplier_bank'     => 'required',
            'supplier_account'  => 'required',
        ]);

        $name               = $request->name;
        $supplier_email     = $request->supplier_email;
        $supplier_phone     = $request->supplier_phone;
        $supplier_location  = $request->supplier_location;
        $supplier_bank      = $request->supplier_bank;
        $supplier_account   = $request->supplier_account;

        $data = array(
            'name'             => $name,
            'email'            => $supplier_email,
            'phone'            => $supplier_phone,
            'location'         => $supplier_location,
            'payement_method'  => $supplier_bank,
            'account_number'   => $supplier_account,
            'role'             => '6',
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date("Y-m-d H:i:s"),
        );
        
        DB::table('shareholders')->insert($data);

        $notification  = array(
        'message'    => 'New Supplier Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
