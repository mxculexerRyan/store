<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\Models\Brand;
use App\Models\Tag;

class BrandController extends Controller
{
    public function index(){
        $tagData = Tag::latest()->get();
        $brandData = Brand::latest()->where('brand_status', '=', 'available')->get();
        return view('activities.products.brands', compact('brandData', 'tagData'));
    }

    public function add(Request $request){

        $request->validate([
            'brand_name' => 'required|unique:brands',
            'brand_key' => 'required',
            'brand_desc' => 'required',
        ]);

        $brand_name = $request->brand_name;
        $brand_key = $request->brand_key;
        $brand_desc = $request->brand_desc;

        $data = array(
            'brand_name' => $brand_name,
            'brand_key'  => $brand_key,
            'brand_desc' => $brand_desc,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        );
        
        DB::table('brands')->insert($data);
        
        $notification  = array(
        'message' => 'New Brand Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function branddata(){
        $id = $_GET['id'];
        $brandData = Brand::latest()->where("id","=", $id)->get();
        return response()->json(array('msg'=> $brandData), 200);
    }

    public function edit(Request $request){
        $id = $request->brand_id;
        $brand_name = $request->brand_name;
        $brand_key = $request->brand_key;
        $brand_desc = $request->brand_desc;

        $brandData = Brand::find($id);
        $brandData->brand_name = $brand_name;
        $brandData->brand_key = $brand_key;
        $brandData->brand_desc = $brand_desc;
        $brandData->save();

        $notification  = array(
            'message' => 'Brands Updated Succesfully',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

    public function brandsdelete(){
        $brandId = $_GET['id'];

        $brandData = Brand::find($brandId);
        $brandData->brand_status = 'unavailable';
        $brandData->save();

        return response()->json(array('msg'=> $brandData), 200);
    }
}
