<?php

namespace App\Http\Controllers\Api;
use App\SubCategory;
use App\Category;
use App\Brand;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function SubCategories(){
        $sub_categories=SubCategory::all();
          
        return response()->json($sub_categories);
    }
    public function SaveSubCategory(Request $request){

        $rules = array(
            'category_id' => 'required',
            'brand_id'    => 'required',
            'name'        => 'required|unique:sub_categories|string|min:3|max:255',                        
            'description' => 'required|string|min:3|max:260',     
            'status'      => 'required',                         
            'note'        => 'required',                       
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg',
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

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $originalname=$image->getClientOriginalName();
                $name = time().$originalname.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
            }
            
        $SubCategory=new SubCategory();
        $SubCategory->category_id=$request->category_id;
        $SubCategory->brand_id=$request->brand_id;
        $SubCategory->name=$request->name;
        $SubCategory->description=$request->description;
        $SubCategory->status=$request->status;
        $SubCategory->note=$request->note;
        $SubCategory->image=$name;
        $SubCategory->save();
        return response()->json([
            'status' => '200',
             'response' => 'Sub Category Added'
             ]);
        }

    }
    public function UpdateSubCategory(Request $request){
        $rules = array(
            'sub_category_id' => 'required',                         
            'category_id'     => 'required',                         
            'brand_id'        => 'required',                         
            'name'            => 'required|string|min:3|max:255',                        
            'description'     => 'required|string|min:3|max:260',     
            'status'          => 'required',                         
            'note'            => 'required',
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
              $Sub_Category=SubCategory::find($request->sub_category_id);
              if($Sub_Category == null){
                  return response()->json([
                      'status' => '200',
                      'response' => 'Sub Category not found'
                      ]);
                    }
                    
                    if ($request->hasFile('image')) {
                        $image = $request->file('image');
                $originalname=$image->getClientOriginalName();
                $name = time().$originalname.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
            }
            else{
                $name= SubCategory::where('id',$request->sub_category_id)->pluck('image')->first();
            }
                         
            $SubCategory=SubCategory::find($request->sub_category_id);
            $SubCategory->category_id=$request->category_id;
            $SubCategory->brand_id=$request->brand_id;
            $SubCategory->name=$request->name;
            $SubCategory->description=$request->description;
            $SubCategory->status=$request->status;
            $SubCategory->note=$request->note;
            $SubCategory->image=$name;
            $SubCategory->update();
            return response()->json([
                'status' => '200',
                'response' => 'Sub Category Updated'
                 ]);
        }
    }
    public function DeleteSubCategory(Request $request){
        $id=$request->sub_category_id;
        if($id ==null){
            return response()->json([
                'status' => '200',
                 'response' => 'Sub Category required'
                 ]);
        }
        $SubCategory=SubCategory::find($id);
            if($SubCategory == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Sub Category not found'
                     ]);
            }
        SubCategory::where('id',$id)->delete();
        return response()->json([
            'status' => '200',
            'response' => 'Sub Category Deleted'
             ]);
    }
}
