<?php

namespace App\Http\Controllers\Api;
use App\Product;
use App\Brand;
use App\Category;
use App\SubCategory;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function GetProducts(){
        $Products=Product::all();
        return response()->json($Products);
    }
    
    public function SaveProduct(Request $request){

        $rules = array(      
        'PSKU'               => 'required|string|unique:products',
        'brand_id'           => 'required|integer',                          
        'category_id'        => 'required|integer',                          
        'sub_category_id'    => 'required|integer',
        'name'               => 'required|string',
        'description'        => 'required|string',
        'short_description'  => 'required|string',
        'meterial'           => 'required|string',
        'type'               => 'required|string|max:9',
        'attributess'         => 'required|string', 
        'rank'               => 'required|integer',
        'note'               => 'required|string',
        'feature_image'      => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        'cross_sell_products'=> 'required|string',
        'up_sell_products'   => 'required|string',
        'meta_tags'          => 'required|string',
        'meta_title'         => 'required|string',
        'meta_description'   => 'required|string',
        'title_description'  => 'required|string',
        'keywords'           => 'required', 
        'url'                => 'required|string',
        'stauts'             => 'required|string',                                                
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
                    $SubCategory=SubCategory::find($request->sub_category_id);
                    if($SubCategory == null){
                        return response()->json([
                            'status' => '200',
                            'response' => 'SubCategory not found'
                            ]);
                    }     
                    
                if ($request->hasFile('feature_image')) {
                    $image = $request->file('feature_image');
                    $originalname=$image->getClientOriginalName();
                    $name = time().$originalname.'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $name);
                }
            $Product=new Product();
            $Product->PSKU=$request->PSKU;
            $Product->brand_id=$request->brand_id;
            $Product->category_id=$request->category_id;
            $Product->sub_category_id=$request->sub_category_id;
            $Product->name=$request->name;
            $Product->description=$request->description;
            $Product->short_description=$request->short_description;
            $Product->meterial=$request->meterial;
            $Product->type=$request->type;
            $Product->attributes=$request->attributess;
            $Product->rank=$request->rank;
            $Product->note=$request->note;
            $Product->feature_image=$name;
            $Product->cross_sell_products=$request->cross_sell_products;
            $Product->up_sell_products=$request->up_sell_products;
            $Product->meta_tags=$request->meta_tags;
            $Product->meta_title=$request->meta_title;
            $Product->meta_description=$request->meta_description;
            $Product->keywords=json_encode($request->keywords);
            $Product->url=$request->url;
            $Product->stauts=$request->stauts;
            $Product->save();
            return response()->json([
                'status' => '200',
                 'response' => 'Product Added'
                 ]);
        }
    
    }

    public function UpdateProduct(Request $request){
        $rules = array(
        'product_id'  => 'required|integer',
        'PSKU'               => 'required|string',
        'brand_id'           => 'required|integer',                          
        'category_id'        => 'required|integer',                          
        'sub_category_id'    => 'required|integer',
        'name'               => 'required|string',
        'description'        => 'required|string',
        'short_description'  => 'required|string',
        'meterial'           => 'required|string',
        'type'               => 'required|string|max:9',
        'attributess'         => 'required|string', 
        'rank'               => 'required|integer',
        'note'               => 'required|string',
        'cross_sell_products'=> 'required|string',
        'up_sell_products'   => 'required|string',
        'meta_tags'          => 'required|string',
        'meta_title'         => 'required|string',
        'meta_description'   => 'required|string',
        'title_description'  => 'required|string',
        'keywords'           => 'required', 
        'url'                => 'required|string',
        'stauts'             => 'required|string',
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
                    $SubCategory=SubCategory::find($request->sub_category_id);
                    if($SubCategory == null){
                        return response()->json([
                            'status' => '200',
                            'response' => 'SubCategory not found'
                            ]);
                    }     
            $Product=Product::find($request->product_id);
            if($Product == null){
                return response()->json([
                    'status' => '200',
                    'response' => 'Product not found'
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
                    $name= Product::where('id',$request->product_id)->pluck('feature_image')->first();
                }      
                $Product->PSKU=$request->PSKU;
                $Product->brand_id=$request->brand_id;
                $Product->category_id=$request->category_id;
                $Product->sub_category_id=$request->sub_category_id;
                $Product->name=$request->name;
                $Product->description=$request->description;
                $Product->short_description=$request->short_description;
                $Product->meterial=$request->meterial;
                $Product->type=$request->type;
                $Product->attributes=$request->attributess;
                $Product->rank=$request->rank;
                $Product->note=$request->note;
                $Product->feature_image=$name;
                $Product->cross_sell_products=$request->cross_sell_products;
                $Product->up_sell_products=$request->up_sell_products;
                $Product->meta_tags=$request->meta_tags;
                $Product->meta_title=$request->meta_title;
                $Product->meta_description=$request->meta_description;
                $Product->keywords=json_encode($request->keywords);
                $Product->url=$request->url;
                $Product->stauts=$request->stauts;
                $Product->update();

            return response()->json([
                'status' => '200',
                'response' => 'Product Updated'
                 ]);
        }
    }

    public function DeleteProduct(Request $request){
        $id=$request->product_id;
        if($id ==null){
            return response()->json([
                'status' => '200',
                 'response' => 'Product required'
                 ]);
        }
        $Product=Product::find($id);
            if($Product == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Product not found'
                     ]);
            }
            Product::where('id',$id)->delete();
            return response()->json([
            'status' => '200',
            'response' => 'Product Deleted'
             ]);
    }
}
