<?php

namespace App\Http\Controllers\Api;
use App\Branch;
use App\Brand;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator; 

class BranchController extends Controller
{
    public function Branches(){
        $Branches=Branch::all();
        return response()->json($Branches);
    }
    public function SaveBranch(Request $request){
        $rules = array(
            'brand_id'    => 'required|integer',
            'name'        => 'required|unique:branches|string|min:3|max:255',                        
            'location'    => 'required|string|min:3|max:255',                         
            'description' => 'required|string|min:3|max:255',                         
            'contact'     => 'required|string|min:3|max:255',                         
            'address'     => 'required|string|min:3|max:255',                         
            'note'        => 'required|string|min:3|max:260',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json($validator->errors());
        }
        else{
            $Brand=Brand::find($request->brand_id);
            if($Brand == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Brand not found'
                     ]);
            }
             
        $Branch=new Branch();
        $Branch->brand_id=$request->brand_id;
        $Branch->name=$request->name;
        $Branch->location=$request->location;
        $Branch->description=$request->description;
        $Branch->contact=$request->contact;
        $Branch->address=$request->address;
        $Branch->note=$request->note;
        $Branch->save();
        return response()->json([
            'status' => '200',
             'response' => 'Branch Added'
             ]);
        }
    }
    public function UpdateBranch(Request $request){
        $rules = array(
            'branch_id'   => 'required|integer',                         
            'brand_id'    => 'required|integer',
            'name'        => 'required|string|min:3|max:255',                        
            'location'    => 'required|string|min:3|max:255',                         
            'description' => 'required|string|min:3|max:255',                         
            'contact'     => 'required|string|min:3|max:255',                         
            'address'     => 'required|string|min:3|max:255',                         
            'note'        => 'required|string|min:3|max:260',                        
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json($validator->errors());
        }
        else{
            $Brand=Brand::find($request->brand_id);
            if($Brand == null){
                return response()->json([
                    'status' => '200',
                    'response' => 'Brand not found'
                    ]);
                }
            $Branch=Branch::find($request->branch_id);
            if($Branch == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Branch not found'
                     ]);
            }
        
            $Branch->brand_id=$request->brand_id;
            $Branch->name=$request->name;
            $Branch->location=$request->location;
            $Branch->description=$request->description;
            $Branch->contact=$request->contact;
            $Branch->address=$request->address;
            $Branch->note=$request->note;          
            $Branch->update();
            return response()->json([
                'status' => '200',
                'response' => 'Branch Updated'
                 ]);
        }
    }
    public function DeleteBranch(Request $request){
        $id=$request->branch_id;
        if($id ==null){
            return response()->json([
                'status' => '200',
                 'response' => 'Branch required'
                 ]);
        }
        $Branch=Branch::find($id);
            if($Branch == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Branch not found'
                     ]);
            }
        Branch::where('id',$id)->delete();
        return response()->json([
            'status' => '200',
            'response' => 'Branch Deleted'
             ]);
    }
}
