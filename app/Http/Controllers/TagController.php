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
            'tag_name' => 'required|unique:tags',
            'tag_key' => 'required',
            'tag_desc' => 'required',
        ]);

        $tag_name = $request->tag_name;
        $tag_key = $request->tag_key;
        $tag_desc = $request->tag_desc;

        $data = array(
            'tag_name' => $tag_name,
            'tag_key'  => $tag_key,
            'tag_desc' => $tag_desc
        );
        
        DB::table('tags')->insert($data);
        
        $notification  = array(
        'message' => 'New Tag Added',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function tagdata(){
        $id = $_GET['id'];
        $tagData = Tag::latest()->where("id","=", $id)->get();
        return response()->json(array('msg'=> $tagData), 200);
    }

    public function edit(Request $request){
        $id = $request->tag_id;
        $tag_name = $request->tag_name;
        $tag_key = $request->tag_key;
        $tag_desc = $request->tag_desc;

        $tagData = Tag::find($id);
        $tagData->tag_name = $tag_name;
        $tagData->tag_key = $tag_key;
        $tagData->tag_desc = $tag_desc;
        $tagData->save();

        $notification  = array(
            'message' => 'Tags Updated Succesfully',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

}
