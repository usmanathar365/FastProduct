<?php

namespace App\Http\Controllers\Api;
use App\Category;
use App\Brand;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function Brands(){
        $brands=Brand::all();
        return response()->json($brands);
    }
    
    public function SaveBrand(Request $request){

        $rules = array(
            'name'  => 'required|unique:brands|string|min:3|max:255',
            'username'   => 'required|string|min:3|max:255',                        
            'email'  => 'required|email|string|min:3|max:255',                        
            'password'  => 'required|string|min:6|max:255',                        
            'contact' => 'required|integer|min:3',    
            'status' => 'required|string|min:3|max:255',                        
            'address' => 'required|string|min:3|max:255',                        
            'note'  => 'required|string|min:3|max:255',                          
            'description' =>    'required|string|min:3|max:260',                          
            'feature_image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        );
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json($validator->errors());
        }
        else{
            
            if ($request->hasFile('feature_image')) {
                $image = $request->file('feature_image');
                $originalname=$image->getClientOriginalName();
                $name = time().$originalname.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
            }
            
            $Brand=new Brand();
            $Brand->name=$request->name;
            $Brand->description=$request->description;
            $Brand->username=$request->username;
            $Brand->email=$request->email;
            $Brand->password=$request->password;
            $Brand->contact=$request->contact;
            $Brand->status=$request->status;
            $Brand->address=$request->address;
            $Brand->note=$request->note;
            $Brand->feature_image=$name;
            $Brand->save();
            return response()->json([
                'status' => '200',
                 'response' => 'Brand Added'
                 ]);
           
        }
    
    }

    public function UpdateBrand(Request $request){
        $rules = array(
            'brand_id'  => 'required|integer',
            'name'  => 'required|string|min:3|max:255',
            'username'   => 'required|string|min:3|max:255',                        
            'email'  => 'required|email|string|min:3|max:255',                        
            'password'  => 'required|string|min:6|max:255',                        
            'contact' => 'required|integer|min:3',    
            'status' => 'required|string|min:3|max:255',                        
            'address' => 'required|string|min:3|max:255',                        
            'note'  => 'required|string|min:3|max:255',                          
            'description' =>    'required|string|min:3|max:260',                          
            
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
                          
            if ($request->hasFile('feature_image')) {
                $image = $request->file('feature_image');
                $originalname=$image->getClientOriginalName();
                $name = time().$originalname.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
            }
            else{
                $name= Brand::where('id',$request->brand_id)->pluck('feature_image')->first();
            }
            
            $Brand=Brand::find($request->brand_id);
            $Brand->name=$request->name;;
            $Brand->description=$request->description;
            $Brand->username=$request->username;
            $Brand->email=$request->email;
            $Brand->password=$request->password;
            $Brand->contact=$request->contact;
            $Brand->status=$request->status;
            $Brand->address=$request->address;
            $Brand->note=$request->note;
            $Brand->feature_image=$name;
            $Brand->update();
            return response()->json([
                'status' => '200',
                'response' => 'Brand Updated'
                 ]);
        }
    }

    public function DeleteBrand(Request $request){
        $id=$request->brand_id;
        if($id ==null){
            return response()->json([
                'status' => '200',
                 'response' => 'Brand required'
                 ]);
        }
        $Brand=Brand::find($id);
            if($Brand == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Brand not found'
                     ]);
            }
            Brand::where('id',$id)->delete();
        return response()->json([
            'status' => '200',
            'response' => 'Brand Deleted'
             ]);
    }
}
