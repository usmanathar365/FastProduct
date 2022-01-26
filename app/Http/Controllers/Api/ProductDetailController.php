<?php

namespace App\Http\Controllers\Api;
use App\ProductDetail;
use App\Branch;
use App\Product;
use App\Color;
use App\Size;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProductDetailController extends Controller
{
    public function GetProductDetails(){
        $ProductDetails=ProductDetail::all();
        return response()->json($ProductDetails);
    }
    
    public function SaveProductDetail(Request $request){

        $rules = array(      
        'SKU'               => 'required|string|unique:product_details',
        'branch_id'          => 'required|integer',                          
        'product_id'        => 'required|integer',                          
        'color_id'          => 'required|integer',
        'size_id'           => 'required|integer',
        'quantity'          => 'required|integer',
        'regular_price'     => 'required|integer',
        'discounted_price'  => 'required|integer',
        'feature_image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        'gallery_images'    => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        'weight'            => 'required|integer',
                                                      
        );
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json($validator->errors());
        }
        else{ 
            $Branch=Branch::find($request->branch_id);
            if($Branch == null){
                return response()->json([
                    'status' => '200',
                    'response' => 'Branch not found'
                    ]);
                }     
                $Product=Product::find($request->product_id);
                if($Product == null){
                    return response()->json([
                        'status' => '200',
                        'response' => 'Product not found'
                        ]);
                    }     
                    $Color=Color::find($request->color_id);
                if($Color == null){
                    return response()->json([
                        'status' => '200',
                        'response' => 'Color not found'
                        ]);
                    }   
                    $Size=Size::find($request->size_id);
                    if($Size == null){
                        return response()->json([
                            'status' => '200',
                            'response' => 'Size not found'
                            ]);
                    }     
                    
                if ($request->hasFile('feature_image')) {
                    $image = $request->file('feature_image');
                    $originalname=$image->getClientOriginalName();
                    $name = time().$originalname.'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/images');
                    $image->move($destinationPath, $name);
                }
                if ($request->hasFile('gallery_images')) {
                    $gallery_images = $request->file('gallery_images');
                    $originalname=$gallery_images->getClientOriginalName();
                    $gallery_imagesname = time().$originalname.'.'.$gallery_images->getClientOriginalExtension();
                    $destinationPathgallery_images = public_path('/images');
                    $gallery_images->move($destinationPathgallery_images, $gallery_imagesname);
                }
            $ProductDetail=new ProductDetail();
            $ProductDetail->SKU=$request->SKU;
            $ProductDetail->branch_id=$request->branch_id;
            $ProductDetail->product_id=$request->product_id;
            $ProductDetail->color_id=$request->color_id;
            $ProductDetail->size_id=$request->size_id;
            $ProductDetail->quantity=$request->quantity;
            $ProductDetail->regular_price=$request->regular_price;
            $ProductDetail->discounted_price=$request->discounted_price;
            $ProductDetail->feature_image=$name;
            $ProductDetail->gallery_images=$gallery_imagesname;
            $ProductDetail->weight=$request->weight;
             
            $ProductDetail->save();
            return response()->json([
                'status' => '200',
                 'response' => 'ProductDetail Added'
                 ]);
        }
    
    }

    public function UpdateProductDetail(Request $request){
        $rules = array(
        'productdetail_id'  => 'required|integer',
        'SKU'               => 'required|string',
        'branch_id'          => 'required|integer',                          
        'product_id'        => 'required|integer',                          
        'color_id'          => 'required|integer',
        'size_id'           => 'required|integer',
        'quantity'          => 'required|integer',
        'regular_price'     => 'required|integer',
        'discounted_price'  => 'required|integer',
        'weight'            => 'required|integer',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json($validator->errors());
        }
        else{
            $Branch=Branch::find($request->branch_id);
            if($Branch == null){
                return response()->json([
                    'status' => '200',
                    'response' => 'Branch not found'
                    ]);
                }     
                $Product=Product::find($request->product_id);
                if($Product == null){
                    return response()->json([
                        'status' => '200',
                        'response' => 'Product not found'
                        ]);
                    }     
                    $Color=Color::find($request->color_id);
                if($Color == null){
                    return response()->json([
                        'status' => '200',
                        'response' => 'Color not found'
                        ]);
                    }   
                    $Size=Size::find($request->size_id);
                    if($Size == null){
                        return response()->json([
                            'status' => '200',
                            'response' => 'Size not found'
                            ]);
                    }     
                        
            $ProductDetail=ProductDetail::find($request->productdetail_id);
            if($ProductDetail == null){
                return response()->json([
                    'status' => '200',
                    'response' => 'Product Detail not found'
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
                    $name= ProductDetail::where('id',$request->productdetail_id)->pluck('feature_image')->first();
                }  
                if ($request->hasFile('gallery_images')) {
                    $gallery_images = $request->file('gallery_images');
                    $originalname=$gallery_images->getClientOriginalName();
                    $gallery_imagesname = time().$originalname.'.'.$gallery_images->getClientOriginalExtension();
                    $destinationPathgallery_images = public_path('/images');
                    $gallery_images->move($destinationPathgallery_images, $gallery_imagesname);
                } 
                else{
                    $gallery_imagesname= ProductDetail::where('id',$request->productdetail_id)->pluck('gallery_images')->first();
                }    
                $ProductDetail->SKU=$request->SKU;
            $ProductDetail->branch_id=$request->branch_id;
            $ProductDetail->product_id=$request->product_id;
            $ProductDetail->color_id=$request->color_id;
            $ProductDetail->size_id=$request->size_id;
            $ProductDetail->quantity=$request->quantity;
            $ProductDetail->regular_price=$request->regular_price;
            $ProductDetail->discounted_price=$request->discounted_price;
            $ProductDetail->feature_image=$name;
            $ProductDetail->gallery_images=$gallery_imagesname;
            $ProductDetail->weight=$request->weight;
                $ProductDetail->update();

            return response()->json([
                'status' => '200',
                'response' => 'Product Detail Updated'
                 ]);
        }
    }

    public function DeleteProductDetail(Request $request){
        $id=$request->ProductDetail_id;
        if($id ==null){
            return response()->json([
                'status' => '200',
                 'response' => 'ProductDetail required'
                 ]);
        }
        $ProductDetail=ProductDetail::find($id);
            if($ProductDetail == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'ProductDetail not found'
                     ]);
            }
            ProductDetail::where('id',$id)->delete();
            return response()->json([
            'status' => '200',
            'response' => 'ProductDetail Deleted'
             ]);
    }
}
