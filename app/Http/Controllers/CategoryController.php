<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
use App\Category;
use App\Product;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    ///////////// Categories ////////////////////////

    public function Categories(){
     $categories=Category::all();
     return view('Vendor.Categories',compact('categories'));
    }
    public function AddCategory(){
     return view('Vendor.AddCategory');

    }
    public function SaveCategory(Request $request){

        $rules = array(
            'name'             => 'required|string|min:3|max:255',                        
            'category_description'=> 'required|string|min:3|max:260',     
            'meta_title'       => 'required|string|min:3|max:255',
            'slug'             => 'required|string|min:3|max:255',                        
            'meta_description' => 'required|string|min:3|max:255',     
            'visibility' => 'required',     
            'publish_date'     => 'required|string|min:3|max:255',
            'parent_category'  => 'required|string|min:3|max:255',                        
            'image'            => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->route('add.category')
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
            
        $Category=new Category();
        $Category->user_id=auth()->user()->id;
        $Category->name=$request->name;
        $Category->description=$request->category_description;
        $Category->meta_title=$request->meta_title;
        $Category->meta_description=$request->meta_description;
        $Category->publish_date=$request->publish_date;
        $Category->parent_category=$request->parent_category;
        $Category->visibility=$request->visibility;
        $Category->image=$name;
        $Category->slug=Str::slug($request->slug,'-');
        $Category->save();
            return redirect()->route('categories')->with('message','Category Added');
        
        }

    }
    public function EditCategory(Request $request){
    $id=$request->editid;
    $category=Category::find($id);
    
    return view('Vendor.AddCategory',compact('category'));

    }
    public function UpdateCategory(Request $request){
        $rules = array(
            'name'             => 'required|string|min:3|max:255',                        
            'category_description'=> 'required|string|min:3|max:260',     
            'meta_title'       => 'required|string|min:3|max:255',
            'slug'             => 'required|string|min:3|max:255',                        
            'meta_description' => 'required|string|min:3|max:255',     
            'publish_date'     => 'required|string|min:3|max:255',
            'parent_category'  => 'required|string|min:3|max:255',                        
        
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->route('add.category')
                ->withErrors($validator)->withInput();
        }
        else{
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $originalname=$image->getClientOriginalName();
                $name = time().$originalname.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
            }
            else{
                $name= Category::where('id',$request->id)->pluck('image')->first();
            }
            
            $Category=Category::find($request->id);
            $Category->name=$request->name;
            $Category->description=$request->category_description;
            $Category->meta_title=$request->meta_title;
            $Category->meta_description=$request->meta_description;
            $Category->publish_date=$request->publish_date;
            $Category->parent_category=$request->parent_category;
            $Category->visibility=$request->visibility;
            $Category->image=$name;
            $Category->slug=Str::slug($request->slug,'-');
            $Category->update();
            return redirect()->route('categories')->with('message','Category Updated');
        }
    }
    public function DeleteCategory(){
        $id=request()->query('id');
        Category::where('id',$id)->delete();
        return 'ok';
    }
}
