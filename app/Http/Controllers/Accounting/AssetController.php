<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Asset;
use DB;

class AssetController extends Controller
{
    public function index(){
        $assetData = Asset::latest()->get();
        return view("roster.accounting.assets", compact('assetData'));
    }

    public function add(Request $request){
        $request->validate([
            'asset_name'      => 'required',
            'asset_amount'    => 'required',
            'asset_value'     => 'required',
            'asset_type'      => 'required',
            'description'     => 'required',
        ]);

        Asset::insert([
            'asset_name'    => $request->asset_name,
            'asset_amount'  => $request->asset_amount,
            'asset_value'   => $request->asset_value,
            'asset_type'    => $request->asset_type,
            'description'    => $request->description,
        ]);

        $notification  = array(
            'message'    => 'New Asset Added',
            'alert-type' => 'success'
            );
    
        return redirect()->back()->with($notification);
    }

    public function assetdata(){
        $assetId = $_GET['id'];
        $assetData = DB::table('assets')->where('id', $assetId)->get();
        return response()->json(array('msg'=> $assetData), 200);
    }
}
