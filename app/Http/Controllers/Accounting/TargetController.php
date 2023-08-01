<?php

namespace App\Http\Controllers\Accounting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Accounting\Target;
use DB;

class TargetController extends Controller
{
    public function index(){
        $targetData = Target::latest()->get();
        return view('roster.accounting.targets', compact('targetData'));
    }

    public function add(Request $request){
        $request->validate([
            'entity_name'       => 'required',
            'target_measure'    => 'required',
            'targeted_amount'   => 'required',
            'deadline'          => 'required',
            'assigned_group'    => 'required',
            'assigned_to'       => 'required',
        ]);

            $entity_name       = $request->entity_name;
            $target_measure    = $request->target_measure;
            $targeted_amount   = $request->targeted_amount;
            $assigned_group    = $request->assigned_group;
            $assigned_to       = $request->assigned_to;
            $deadline          = $request->deadline;
            $lastdate          = $deadline." ".date("H:i:s");

        $data = array(
            'entity_name'      => $entity_name,
            'target_measure'   => $target_measure,
            'targeted_amount'  => $targeted_amount,
            'assigned_group'   => $assigned_group,
            'assigned_to'      => $assigned_to,
            'deadline'         => $lastdate,
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date("Y-m-d H:i:s"),
        );
        
        DB::table('targets')->insert($data);

        $notification  = array(
            'message'    => 'New Target Added',
            'alert-type' => 'success'
            );
    
        return redirect()->back()->with($notification);
    }
}
