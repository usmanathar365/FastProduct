<?php

namespace App\Http\Controllers\Api;
use App\Size;
use App\Brand;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator; 

class SizeController extends Controller
{
    public function Sizes(){
        $Sizes=Size::all();
        
        return response()->json($Sizes);
    }
    public function SaveSize(Request $request){
        $rules = array(
            'brand_id'    => 'required|integer',
            'size_type'   => 'required|string|min:3|max:255',                        
            'value'       => 'required',                         
            'description' => 'required|string|min:3|max:260',
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
             
        $Size=new Size();
        $Size->brand_id=$request->brand_id;
        $Size->size_type=$request->size_type;
        $Size->value=$request->value;
        $Size->description=$request->description;
        $Size->save();
        return response()->json([
            'status' => '200',
             'response' => 'Size Added'
             ]);
        }

    }
    public function UpdateSize(Request $request){
        $rules = array(
            'size_id' => 'required|integer',                         
            'brand_id' => 'required|integer',                         
            'size_type'        => 'required|string|min:3|max:255',                        
            'value'        => 'required',
            'description' => 'required|string|min:3|max:260',                            
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
            $Size=Size::find($request->size_id);
            if($Size == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Size not found'
                     ]);
            }
        
            $Size->brand_id=$request->brand_id;
            $Size->size_type=$request->size_type;
            $Size->value=$request->value;
            $Size->description=$request->description;           
            $Size->update();
            return response()->json([
                'status' => '200',
                'response' => 'Size Updated'
                 ]);
        }
    }
    public function DeleteSize(Request $request){
        $id=$request->size_id;
        if($id ==null){
            return response()->json([
                'status' => '200',
                 'response' => 'Size required'
                 ]);
        }
        $Size=Size::find($id);
            if($Size == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Size not found'
                     ]);
            }
        Size::where('id',$id)->delete();
        return response()->json([
            'status' => '200',
            'response' => 'Size Deleted'
             ]);
    }
}
