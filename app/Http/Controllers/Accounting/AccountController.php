<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Account;
use DB;
class AccountController extends Controller
{
    //
    public function index(){
        $accountsData = Account::latest()->get();
        return view('roster.accounting.accounts', compact('accountsData'));
    }

    public function add(Request $request){
        $request->validate([
            'account_type'      => 'required',
            'account_name'      => 'required',
            'account_number'    => 'required',
            'account_balance'   => 'required',
        ]);

        Account::insert([
            'account_type'    => $request->account_type,
            'account_name'  => $request->account_name,
            'account_number'   => $request->account_number,
            'account_balance'    => $request->account_balance,
        ]);

        $notification  = array(
            'message'    => 'New Account Added',
            'alert-type' => 'success'
            );
    
        return redirect()->back()->with($notification);
    }

    public function accountdata(){
        $accountId = $_GET['id'];
        $accountData = DB::table('accounts')->where('id', $accountId)->get();
        return response()->json(array('msg'=> $accountData), 200);
    }

    // public function edit(){

    // }
}
