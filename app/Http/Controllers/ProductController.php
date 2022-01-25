<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 
use App\Category;
use App\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
   
     ////////////////// Products //////////////////////////
     
    public function Products(){
       
           $products=Product::where('user_id',auth()->user()->id)->get();
           $categories=Category::where('user_id',auth()->user()->id)->get();
        
        return view('Vendor.Products',compact('products','categories'));
      
    }
    public function AddProduct(){
          
             $categories=Category::where('user_id',auth()->user()->id)->get();
            return view('Vendor.AddProduct',compact('categories'));
           
    }
    public function SaveProduct(Request $request){
      dd($request);
        $rules = array(
            'name'             => 'required|string|min:3|max:255',                        
            'slug'             => 'required|string|min:3|max:255',                        
            'product_description'=> 'required|string|min:3|max:260',     
            'short_description'=> 'required|string|min:3|max:260',     
            'price'            => 'required|string|min:3|max:255',
            'old_price'        => 'required|string|min:3|max:255',
            'stock'            => 'required|string|min:3|max:255',
            'stock_quantity'   => 'required|string|min:3|max:255',
            'meta_title'       => 'required|string|min:3|max:255',
            'meta_description' => 'required|string|min:3|max:255',     
            'visibility'       => 'required',     
            'publish_date'     => 'required|string|min:3|max:255', 
            'image'            => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->route('add.product')
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
            
            $Product=new Product();
            $Product->user_id=auth()->user()->id;
            $Product->name=$request->name;
            $Product->description=$request->product_description;
            $Product->meta_title=$request->meta_title;
            $Product->meta_description=$request->meta_description;
            $Product->publish_date=$request->publish_date;
            $Product->parent_product=$request->parent_product;
            $Product->visibility=$request->visibility;
            $Product->image=$name;
            $Product->slug=Str::slug($request->slug,'-');
            $Product->save();
            return redirect()->route('products')->with('message','Product Added');
           
        }
    
    }
    public function EditProduct(Request $request){
     
           $id=$request->editid;
           $product=Product::find($id);
           
        return view('Vendor.AddProduct',compact('product'));
       
    }
    public function UpdateProduct(Request $request){
        $rules = array(
            'name'             => 'required|string|min:3|max:255',                        
            'Product_description'=> 'required|string|min:3|max:260',     
            'meta_title'       => 'required|string|min:3|max:255',
            'slug'             => 'required|string|min:3|max:255',                        
            'meta_description' => 'required|string|min:3|max:255',     
            'publish_date'     => 'required|string|min:3|max:255',
            'parent_Product'  => 'required|string|min:3|max:255',                        
           
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->route('add.Product')
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
                $name= Product::where('id',$request->id)->pluck('image')->first();
            }
             
            $Product=Product::find($request->id);
            $Product->name=$request->name;
            $Product->description=$request->product_description;
            $Product->meta_title=$request->meta_title;
            $Product->meta_description=$request->meta_description;
            $Product->publish_date=$request->publish_date;
            $Product->parent_product=$request->parent_product;
            $Product->visibility=$request->visibility;
            $Product->image=$name;
            $Product->slug=Str::slug($request->slug,'-');
            $Product->update();
            return redirect()->route('products')->with('message','Product Updated');
        }
    }
    public function DeleteProduct(){
            $id=request()->query('id');
            Product::where('id',$id)->delete();
            return 'ok';
    }
}
