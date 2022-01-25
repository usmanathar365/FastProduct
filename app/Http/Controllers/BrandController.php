<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator; 
use App\Brand;
class BrandController extends Controller
{
    public function Brand(){
        $brands=Brand::get();
        return view('Vendor.Brands',compact('brands'));
    }
    public function AddBrand(){
        return view('Vendor.AddBrand');
        
    }
    public function SaveBrand(Request $request){
    
        $rules = array(
            'name'  => 'required|string|min:3|max:255',
            'username'   => 'required|string|min:3|max:255',                        
            'password'  => 'required|string|min:3|max:255',                        
            'email'  => 'required|string|min:3|max:255',                        
            'contact' => 'required|integer|min:3',    
            'status' => 'required|string|min:3|max:255',                        
            'address' => 'required|string|min:3|max:255',                        
            'note'  => 'required|string|min:3|max:255',                          
            'description' =>    'required|string|min:3|max:260',                          
            'image'  => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        );
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->route('add.brand')
                ->withErrors($validator)->withInput();;
        }
        else{
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $originalname=$image->getClientOriginalName();
                $name = time().$originalname.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
            }
            
            $Brand=new Brand();
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
            $Brand->save();
            return redirect()->route('add.brand')->with('message','Brand Added');
           
        }
    
       }
}
