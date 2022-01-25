<?php

namespace App\Http\Controllers\Api;
use App\Product;
use App\Customer;
use Auth;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function Reviews(){
        $Reviews=Review::all();
        return response()->json($Reviews);
    }
    
    public function SaveReview(Request $request){

        $rules = array(
            'product_id'   => 'required|integer',                        
            'customer_id'  => 'required|integer',          
            'rating'       => 'required|string|min:6|max:255',                        
            'review'       => 'required|unique:reviews|string|min:3|max:255',    
            'status'       => 'required|string|min:3|max:255',   
            'image'        => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        );
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json($validator->errors());
        }
        else{
            $Product=Product::find($request->product_id);
            if($Product == null){
                return response()->json([
                    'status' => '200',
                    'response' => 'Product not found'
                    ]);
                }
                $Customer=Customer::find($request->customer_id);
                if($Customer == null){
                    return response()->json([
                        'status' => '200',
                        'response' => 'Customer not found'
                        ]);
                    }
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $originalname=$image->getClientOriginalName();
                $name = time().$originalname.'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $name);
            }
            
            $Review=new Review();
            $Review->product_id=$request->product_id;
            $Review->customer_id=$request->customer_id;
            $Review->rating=$request->rating;
            $Review->review=$request->review;
            $Review->status=$request->status;
            $Review->image=$name;
            $Review->save();
            return response()->json([
                'status' => '200',
                 'response' => 'Review Added'
                 ]);
           
        }
    
    }

    public function UpdateReview(Request $request){
        $rules = array(
            'review_id'   => 'required|integer',                        
            'product_id'   => 'required|integer',                        
            'customer_id'  => 'required|integer',          
            'rating'       => 'required|string|min:6|max:255',                        
            'review'       => 'required|unique:reviews|string|min:3|max:255',    
            'status'       => 'required|string|min:3|max:255',   
                       
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json($validator->errors());
        }
        else{
             
            $Product=Product::find($request->product_id);
            if($Product == null){
                return response()->json([
                    'status' => '200',
                    'response' => 'Product not found'
                    ]);
             }
            $Customer=Customer::find($request->customer_id);
                if($Customer == null){
                    return response()->json([
                        'status' => '200',
                        'response' => 'Customer not found'
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
                $name= Review::where('id',$request->review_id)->pluck('image')->first();
            }
            
            $Review=Review::find($request->review_id);
            $Review->customer_id=$request->customer_id;
            $Review->product_id=$request->product_id;
            $Review->rating=$request->rating;
            $Review->status=$request->status;
            $Review->review=$request->review;
            $Review->image=$name;
            $Review->update();
            return response()->json([
                'status' => '200',
                'response' => 'Review Updated'
                 ]);
        }
    }

    public function DeleteReview(Request $request){
        $id=$request->review_id;
        if($id == null){
            return response()->json([
                'status' => '200',
                 'response' => 'Review required'
                 ]);
        }
        $Review=Review::find($id);
            if($Review == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Review not found'
                     ]);
            }
            Review::where('id',$id)->delete();
        return response()->json([
            'status' => '200',
            'response' => 'Review Deleted'
             ]);
    }
}
