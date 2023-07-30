<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Supplier;
class ProductController extends Controller
{
    public function index(){ 
        $productData = Product::latest()->get();
        $brandData = Brand::latest()->get();
        return view('activities.products.product', compact('productData'));
    }

    public function prodlist(){
        $id = $_GET['id'];
        $productData = Product::select("*")->where("product_status", "available")->get();
        return response()->json([
            'msg' => view('activities.products.productlist', compact('productData', 'id'))->render(),
        ]);
    }

    public function prodsupp(){
        $id = $_GET['id'];
        $supplierData = Supplier::select("*")->where("supplier_status", "available")->get();
        return response()->json([
            'msg' => view('activities.products.productsuppliers', compact('supplierData', 'id'))->render(),
        ]);
    }

    public function prodprices(){
        $id = $_GET['id'];
        $supplierData = DB::table('buying_prices')->join('suppliers', 'suppliers.id', '=', 'buying_prices.supplier_id' )
        ->join('products', 'products.id', '=', 'buying_prices.product_id')->where("buying_prices.product_id", $id)->get();
        return response()->json(array('msg'=> $supplierData), 200);
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
            'created_at'            => date("Y-m-d H:i:s"),
            'updated_at'            => date("Y-m-d H:i:s"),
        );
        
        DB::table('products')->insert($data);
        
        $notification  = array(
        'message' => 'New Product Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
