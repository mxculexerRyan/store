<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Asset;

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
        ]);

        Asset::insert([
            'asset_name'    => $request->asset_name,
            'asset_amount'  => $request->asset_amount,
            'asset_value'   => $request->asset_value,
            'asset_type'    => $request->asset_type,
        ]);

        $notification  = array(
            'message'    => 'New Asset Added',
            'alert-type' => 'success'
            );
    
        return redirect()->back()->with($notification);
    }

    public function assetdata(){
        
        return View::make("components.accounting.assets")->with("product", $product)->render();
    }
}
