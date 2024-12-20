<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Commision;
use App\Models\Accounting\Account;

class CommisionController extends Controller
{
    public function index() { 
        $commisionData = Commision::latest()->get();
        $accountsData = Account::select("*")->where("account_status", "available")->get();
        return view('roster.accounting.commisions', compact('commisionData', 'accountsData')); 
    }

    public function add(Request $request){
        $notification  = array(
            'message'    => 'New Comission Added',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
