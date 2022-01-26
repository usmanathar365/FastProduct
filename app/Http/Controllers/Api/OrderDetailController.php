<?php

namespace App\Http\Controllers\Api;
use App\OrderDetail;
use App\Order;
use App\Product;
use App\ProductDetail;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class OrderDetailController extends Controller
{
    public function OrderDetails(){
        $OrderDetails=OrderDetail::all();
        return response()->json($OrderDetails);
    }
    
    public function SaveOrderDetail(Request $request){

        $rules = array(                         
        'order_id'           => 'required|integer',                          
        'product_id'         => 'required|integer',                        
        'product_details_id' => 'required|integer',                   
        'quantity'           => 'required|integer',                          
        'amount'             => 'required|integer',                          
        'status'             => 'required|string|max:260',                                   
        );
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json($validator->errors());
        }
        else{ 
            $Order=Order::find($request->order_id);
            if($Order == null){
                return response()->json([
                    'status' => '200',
                    'response' => 'Order not found'
                    ]);
                }  
                $Product=Product::find($request->product_id);
            if($Product == null){
                return response()->json([
                    'status' => '200',
                    'response' => 'Product not found'
                    ]);
                }
                $ProductDetail=ProductDetail::find($request->product_details_id);
            if($ProductDetail == null){
                return response()->json([
                    'status' => '200',
                    'response' => 'ProductDetail not found'
                    ]);
                }       
            $OrderDetail=new OrderDetail();
            $OrderDetail->order_id=$request->order_id;
            $OrderDetail->product_id=$request->product_id;
            $OrderDetail->product_details_id=$request->product_details_id;
            $OrderDetail->quantity=$request->quantity;
            $OrderDetail->amount=$request->amount;
            $OrderDetail->status=$request->status;
            $OrderDetail->save();
            return response()->json([
                'status' => '200',
                 'response' => 'Order Detail Added'
                 ]);
        }
    }

    public function UpdateOrderDetail(Request $request){
        $rules = array(
        'orderdetail_id'    => 'required|integer',
        'order_id'           => 'required|integer',                          
        'product_id'         => 'required|integer',                        
        'product_details_id' => 'required|integer',                   
        'quantity'           => 'required|integer',                          
        'amount'             => 'required|integer',                          
        'status'             => 'required|string|max:260',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json($validator->errors());
        }
        else{
                $Order=Order::find($request->order_id);
                if($Order == null){
                    return response()->json([
                        'status' => '200',
                        'response' => 'Order not found'
                        ]);
                    }  
                    $Product=Product::find($request->product_id);
                if($Product == null){
                    return response()->json([
                        'status' => '200',
                        'response' => 'Product not found'
                        ]);
                    }
                    $ProductDetail=ProductDetail::find($request->product_details_id);
                if($ProductDetail == null){
                    return response()->json([
                        'status' => '200',
                        'response' => 'ProductDetail not found'
                        ]);
                    }  
                    $OrderDetail=OrderDetail::find($request->orderdetail_id);
            if($OrderDetail == null){
                return response()->json([
                    'status' => '200',
                    'response' => 'Order Detail not found'
                    ]);
                }      
                    $OrderDetail->order_id=$request->order_id;
                    $OrderDetail->product_id=$request->product_id;
                    $OrderDetail->product_details_id=$request->product_details_id;
                    $OrderDetail->quantity=$request->quantity;
                    $OrderDetail->amount=$request->amount;
                    $OrderDetail->status=$request->status;
                $OrderDetail->update();

            return response()->json([
                'status' => '200',
                'response' => 'Order Detail Updated'
                 ]);
        }
    }

    public function DeleteOrderDetail(Request $request){
        $id=$request->OrderDetail_id;
        if($id ==null){
            return response()->json([
                'status' => '200',
                 'response' => 'OrderDetail required'
                 ]);
        }
        $OrderDetail=OrderDetail::find($id);
            if($OrderDetail == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'OrderDetail not found'
                     ]);
            }
            OrderDetail::where('id',$id)->delete();
            return response()->json([
            'status' => '200',
            'response' => 'OrderDetail Deleted'
             ]);
    }
}
