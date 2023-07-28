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
        $brandData = Brand::latest()->get();
        return view('activities.products.brands', compact('brandData', 'tagData'));
    }

    public function add(Request $request){

        $request->validate([
            'tag_name' => 'required',
            'brand_name' => 'required|unique:brands',
            'brand_key' => 'required',
            'brand_desc' => 'required',
        ]);

        $tag_name = $request->tag_name;
        $brand_name = $request->brand_name;
        $brand_key = $request->brand_key;
        $brand_desc = $request->brand_desc;

        $data = array(
            'brand_name' => $brand_name,
            'brand_key'  => $brand_key,
            'brand_desc' => $brand_desc,
            'tag_id'     => $tag_name,
            'created_at'            => date("Y-m-d H:i:s"),
            'updated_at'            => date("Y-m-d H:i:s"),
        );
        
        DB::table('brands')->insert($data);
        
        $notification  = array(
        'message' => 'New Brand Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
