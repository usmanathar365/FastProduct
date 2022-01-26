<?php

namespace App\Http\Controllers\Api;
use App\Coupon;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    public function Coupons(){
        $Coupons=Coupon::all();
        return response()->json($Coupons);
    }
    
    public function SaveCoupon(Request $request){

        $rules = array(
        'code'                          => 'required|unique:coupons',
        'description'                   => 'required|string|min:3|max:255',                        
        'discount_type'                 => 'required|string|min:3|max:255',                          
        'coupon_amount'                 => 'required|string|min:3|max:260',                          
        'allow_free_shipping'           => 'required|string|min:3|max:260',                          
        'expiry_date'                   => 'required|string|min:3|max:255',    
        'usage_limit'                   => 'required|string|min:3|max:255',                        
        'usage_restrictions_products'   => 'required|string|min:3|max:255',                          
        'usage_restrictions_categories' => 'required|string|min:3|max:260',
        'usage_restrictions_brands'     => 'required|string|min:3|max:255',                        
        'usage_by_users'                => 'required|string|min:3|max:255',
        );
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json($validator->errors());
        }
        else{            
            $Coupon=new Coupon();
            $Coupon->code=$request->code;
            $Coupon->description=$request->description;
            $Coupon->discount_type=$request->discount_type;
            $Coupon->coupon_amount=$request->coupon_amount;
            $Coupon->allow_free_shipping=$request->allow_free_shipping;
            $Coupon->expiry_date=$request->expiry_date;
            $Coupon->usage_limit=$request->usage_limit;
            $Coupon->usage_restrictions_products=$request->usage_restrictions_products;
            $Coupon->usage_restrictions_categories=$request->usage_restrictions_categories;
            $Coupon->usage_restrictions_brands=$request->usage_restrictions_brands;
            $Coupon->usage_by_users=$request->usage_by_users;
            $Coupon->save();
            return response()->json([
                'status' => '200',
                 'response' => 'Coupon Added'
                 ]);
           
        }
    
    }

    public function UpdateCoupon(Request $request){
        $rules = array(
        'coupon_id'                     => 'required|integer',
        'code'                          => 'required',
        'description'                   => 'required|string|min:3|max:255',                        
        'discount_type'                 => 'required|string|min:3|max:255',                          
        'coupon_amount'                 => 'required|string|min:3|max:260',                          
        'allow_free_shipping'           => 'required|string|min:3|max:260',                          
        'expiry_date'                   => 'required|string|min:3|max:255',    
        'usage_limit'                   => 'required|string|min:3|max:255',                        
        'usage_restrictions_products'   => 'required|string|min:3|max:255',                          
        'usage_restrictions_categories' => 'required|string|min:3|max:260',
        'usage_restrictions_brands'     => 'required|string|min:3|max:255',                        
        'usage_by_users'                => 'required|string|min:3|max:255',                        
            
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json($validator->errors());
        }
        else{
             
            $Coupon=Coupon::find($request->coupon_id);
            if($Coupon == null){
                return response()->json([
                    'status' => '200',
                    'response' => 'Coupon not found'
                    ]);
                }
            $Coupon->code=$request->code;
            $Coupon->description=$request->description;
            $Coupon->discount_type=$request->discount_type;
            $Coupon->coupon_amount=$request->coupon_amount;
            $Coupon->allow_free_shipping=$request->allow_free_shipping;
            $Coupon->expiry_date=$request->expiry_date;
            $Coupon->usage_limit=$request->usage_limit;
            $Coupon->usage_restrictions_products=$request->usage_restrictions_products;
            $Coupon->usage_restrictions_categories=$request->usage_restrictions_categories;
            $Coupon->usage_restrictions_brands=$request->usage_restrictions_brands;
            $Coupon->usage_by_users=$request->usage_by_users;
            $Coupon->update();

            return response()->json([
                'status' => '200',
                'response' => 'Coupon Updated'
                 ]);
        }
    }

    public function DeleteCoupon(Request $request){
        $id=$request->coupon_id;
        if($id ==null){
            return response()->json([
                'status' => '200',
                 'response' => 'Coupon required'
                 ]);
        }
        $Coupon=Coupon::find($id);
            if($Coupon == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Coupon not found'
                     ]);
            }
            Coupon::where('id',$id)->delete();
            return response()->json([
            'status' => '200',
            'response' => 'Coupon Deleted'
             ]);
    }
}
