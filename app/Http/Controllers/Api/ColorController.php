<?php

namespace App\Http\Controllers\Api;
use App\Color;
use App\Brand;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator; 

class ColorController extends Controller
{
    public function Colors(){
        $colors=Color::all();
        
        return response()->json($colors);
    }
    public function SaveColor(Request $request){
        $rules = array(
            'brand_id'    => 'required|integer',
            'name'        => 'required|string|min:3|max:255',                        
            'hex'         => 'required|unique:colors',                         
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
             
        $Color=new Color();
        $Color->brand_id=$request->brand_id;
        $Color->name=$request->name;
        $Color->hex=$request->hex;
        $Color->description=$request->description;
        $Color->save();
        return response()->json([
            'status' => '200',
             'response' => 'Color Added'
             ]);
        }

    }
    public function UpdateColor(Request $request){
        $rules = array(
            'color_id' => 'required|integer',                         
            'brand_id' => 'required|integer',                         
            'name'        => 'required|string|min:3|max:255',                        
            'hex'        => 'required',
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
            $Color=Color::find($request->color_id);
            if($Color == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Color not found'
                     ]);
            }
        
            $Color->brand_id=$request->brand_id;
            $Color->name=$request->name;
            $Color->hex=$request->hex;
            $Color->description=$request->description;           
            $Color->update();
            return response()->json([
                'status' => '200',
                'response' => 'Color Updated'
                 ]);
        }
    }
    public function DeleteColor(Request $request){
        $id=$request->color_id;
        if($id ==null){
            return response()->json([
                'status' => '200',
                 'response' => 'Color required'
                 ]);
        }
        $Color=Color::find($id);
            if($Color == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Color not found'
                     ]);
            }
        Color::where('id',$id)->delete();
        return response()->json([
            'status' => '200',
            'response' => 'Color Deleted'
             ]);
    }
}
