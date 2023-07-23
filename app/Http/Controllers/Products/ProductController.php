<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Brand;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){ 
        $productData = Product::latest()->get();
        $brandData = Brand::latest()->get();
        return view('activities.products.product', compact('productData'));
    }

    public function add(Request $request){

        $request->validate([
            'brand_name' => 'required',
            'product_name' => 'required|unique:products',
            'product_key' => 'required',
            'product_desc' => 'required',
        ]);

        $brand_name = $request->brand_name;
        $product_name = $request->product_name;
        $product_key = $request->product_key;
        $product_desc = $request->product_desc;

        $data = array(
            'product_name' => $product_name,
            'product_key'  => $product_key,
            'product_desc' => $product_desc,
            'brand_id'     => $brand_name,
        );
        
        DB::table('products')->insert($data);
        
        $notification  = array(
        'message' => 'New Product Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
