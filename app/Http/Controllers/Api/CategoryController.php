<?php

namespace App\Http\Controllers\Api;
use App\Category;
use App\Brand;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator; 

class CategoryController extends Controller
{
    public function Categories(){
        $categories=Category::all();
        
        return response()->json($categories);
    }
    public function SaveCategory(Request $request){

        $rules = array(
            'brand_id'    => 'required',
            'name'        => 'required|unique:categories|string|min:3|max:255',                        
            'description' => 'required|string|min:3|max:260',     
            'status'      => 'required',                         
            'note'        => 'required',                       
            'feature_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json($validator->errors());
        }
        else{
            $brand=Brand::find($request->brand_id);
            if($brand == null){
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
            
        $Category=new Category();
        $Category->brand_id=$request->brand_id;
        $Category->name=$request->name;
        $Category->description=$request->description;
        $Category->status=$request->status;
        $Category->note=$request->note;
        $Category->feature_image=$name;
        $Category->save();
        return response()->json([
            'status' => '200',
             'response' => 'Category Added'
             ]);
        }

    }
    public function UpdateCategory(Request $request){
        $rules = array(
            'category_id' => 'required',                         
            'brand_id' => 'required',                         
            'name'        => 'required|string|min:3|max:255',                        
            'description' => 'required|string|min:3|max:260',     
            'status'      => 'required',                         
            'note'        => 'required',
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
            $Category=Category::find($request->category_id);
            if($Category == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Category not found'
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
                $name= Category::where('id',$request->category_id)->pluck('feature_image')->first();
            }
            
            $Category=Category::find($request->category_id);
            $Category->name=$request->name;
            $Category->brand_id=$request->brand_id;
            $Category->description=$request->description;
            $Category->status=$request->status;
            $Category->note=$request->note;
            $Category->feature_image=$name;
            $Category->update();
            return response()->json([
                'status' => '200',
                'response' => 'Category Updated'
                 ]);
        }
    }
    public function DeleteCategory(Request $request){
        $id=$request->category_id;
        if($id ==null){
            return response()->json([
                'status' => '200',
                 'response' => 'Category required'
                 ]);
        }
        $Category=Category::find($id);
            if($Category == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Category not found'
                     ]);
            }
        Category::where('id',$id)->delete();
        return response()->json([
            'status' => '200',
            'response' => 'Category Deleted'
             ]);
    }
}
