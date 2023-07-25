<?php

namespace App\Http\Controllers\Accounting;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Budjet;
use DB;

class BudjetController extends Controller
{
    public function index(){
        $budjetData = Budjet::latest()->get();
        return view('roster.accounting.budjets', compact('budjetData'));
    }

    public function add(Request $request){
        $id = Auth::user()->id;

        $request->validate([
            'item_name'          => 'required',
            'projected_amount'   => 'required',
        ]);

        $item_name           = $request->item_name;
        $projected_amount    = $request->projected_amount;

        $data = array(
            'budjet_name'             => $item_name,
            'projected_amount'      => $projected_amount,
            'assigned_by'           => $id,
            'created_at'            => date("Y-m-d H:i:s"),
            'updated_at'            => date("Y-m-d H:i:s"),
        );
        
        DB::table('budjets')->insert($data);

        

        $notification  = array(
        'message'    => 'New Item Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
