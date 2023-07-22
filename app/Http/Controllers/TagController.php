<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Tag;

class TagController extends Controller
{
    public function index(){
        $tagData = Tag::latest()->get();
        return view('activities.products.tags', compact('tagData'));
    }

    public function add(Request $request){

        $request->validate([
            'tagname' => 'required|unique:tags',
            'tagkey' => 'required',
            'tagdesc' => 'required',
        ]);

        $tagname = $request->tagname;
        $tagkey = $request->tagkey;
        $tagdesc = $request->tagdesc;

        $data = array(
            'tagname' => $tagname,
            'tagkey'  => $tagkey,
            'tagdesc' => $tagdesc
        );
        
        DB::table('tags')->insert($data);
        
        $notification  = array(
        'message' => 'New Tag Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
