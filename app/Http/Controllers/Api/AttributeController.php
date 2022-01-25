<?php

namespace App\Http\Controllers\Api;
use App\Attribute;
use App\Brand;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator; 

class AttributeController extends Controller
{
    public function Attributes(){
        $Attributes=Attribute::all();
        
        return response()->json($Attributes);
    }
    public function SaveAttribute(Request $request){
        $rules = array(
            'brand_id' => 'required|integer',
            'name'     => 'required|string|min:3|max:255',                        
            'values'   => 'required|string|min:3|max:255',                         
            'note'     => 'required|string|min:3|max:260',
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
             
        $Attribute=new Attribute();
        $Attribute->brand_id=$request->brand_id;
        $Attribute->name=$request->name;
        $Attribute->values=$request->values;
        $Attribute->note=$request->note;
        $Attribute->save();
        return response()->json([
            'status' => '200',
             'response' => 'Attribute Added'
             ]);
        }
    }
    public function UpdateAttribute(Request $request){
        $rules = array(
            'attribute_id' => 'required|integer',                         
            'brand_id'     => 'required|integer',                         
            'name'         => 'required|string|min:3|max:255',                        
            'values'       => 'required|string|min:3|max:255',
            'note'         => 'required|string|min:3|max:260',                            
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
            $Attribute=Attribute::find($request->attribute_id);
            if($Attribute == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Attribute not found'
                     ]);
            }
        
            $Attribute->brand_id=$request->brand_id;
            $Attribute->name=$request->name;
            $Attribute->values=$request->values;
            $Attribute->note=$request->note;           
            $Attribute->update();
            return response()->json([
                'status' => '200',
                'response' => 'Attribute Updated'
                 ]);
        }
    }
    public function DeleteAttribute(Request $request){
        $id=$request->attribute_id;
        if($id ==null){
            return response()->json([
                'status' => '200',
                 'response' => 'Attribute required'
                 ]);
        }
        $Attribute=Attribute::find($id);
            if($Attribute == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Attribute not found'
                     ]);
            }
        Attribute::where('id',$id)->delete();
        return response()->json([
            'status' => '200',
            'response' => 'Attribute Deleted'
             ]);
    }
}
