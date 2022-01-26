<?php

namespace App\Http\Controllers\Api;
use App\Order;
use App\Customer;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function Orders(){
        $Orders=Order::all();
        return response()->json($Orders);
    }
    
    public function SaveOrder(Request $request){

        $rules = array(                         
        'customer_id'       => 'required|integer',                          
        'order_number'      => 'required|unique:orders|integer',                        
        'payment_type'      => 'required|string|max:255',                          
        'payment_status'    => 'required|string|max:255',    
        'order_date'        => 'required|string|min:3|max:260',                          
        'ship_date'         => 'required|string|min:3|max:260',                          
        'delivery_charges'  => 'required|string|max:260',                          
        'transaction_status'=> 'required|string|max:260',                          
        'tracking_number'   => 'required|string|max:260',                          
        'amount'            => 'required|string|max:260',                          
        'discount'          => 'required|string|max:260',                          
        'status'            => 'required|string|max:260',                          
        'note'              => 'required|string|max:260',                          
        );
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json($validator->errors());
        }
        else{ 
            $Customer=Customer::find($request->customer_id);
            if($Customer == null){
                return response()->json([
                    'status' => '200',
                    'response' => 'Customer not found'
                    ]);
                }         
            $Order=new Order();
            $Order->customer_id=$request->customer_id;
            $Order->order_number=$request->order_number;
            $Order->payment_type=$request->payment_type;
            $Order->payment_status=$request->payment_status;
            $Order->order_date=$request->order_date;
            $Order->ship_date=$request->ship_date;
            $Order->delivery_charges=$request->delivery_charges;
            $Order->transaction_status=$request->transaction_status;
            $Order->tracking_number=$request->tracking_number;
            $Order->amount=$request->amount;
            $Order->discount=$request->discount;
            $Order->status=$request->status;
            $Order->note=$request->note;
            $Order->save();
            return response()->json([
                'status' => '200',
                 'response' => 'Order Added'
                 ]);
        }
    
    }

    public function UpdateOrder(Request $request){
        $rules = array(
        'order_id'          => 'required|integer',
        'customer_id'       => 'required|integer',                          
        'order_number'      => 'required',                        
        'payment_type'      => 'required|string|max:255',                          
        'payment_status'    => 'required|string|max:255',    
        'order_date'        => 'required|string|min:3|max:260',                          
        'ship_date'         => 'required|string|min:3|max:260',                          
        'delivery_charges'  => 'required|string|max:260',                          
        'transaction_status'=> 'required|string|max:260',                          
        'tracking_number'   => 'required|string|max:260',                          
        'amount'            => 'required|string|max:260',                          
        'discount'          => 'required|string|max:260',                          
        'status'            => 'required|string|max:260',                          
        'note'              => 'required|string|max:260',
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
                $Customer=Customer::find($request->customer_id);
                if($Customer == null){
                    return response()->json([
                        'status' => '200',
                        'response' => 'Customer not found'
                        ]);
                    }       
                $Order->customer_id=$request->customer_id;
                $Order->order_number=$request->order_number;
                $Order->payment_type=$request->payment_type;
                $Order->payment_status=$request->payment_status;
                $Order->order_date=$request->order_date;
                $Order->ship_date=$request->ship_date;
                $Order->delivery_charges=$request->delivery_charges;
                $Order->transaction_status=$request->transaction_status;
                $Order->tracking_number=$request->tracking_number;
                $Order->amount=$request->amount;
                $Order->discount=$request->discount;
                $Order->status=$request->status;
                $Order->note=$request->note;
                $Order->update();

            return response()->json([
                'status' => '200',
                'response' => 'Order Updated'
                 ]);
        }
    }

    public function DeleteOrder(Request $request){
        $id=$request->order_id;
        if($id ==null){
            return response()->json([
                'status' => '200',
                 'response' => 'Order required'
                 ]);
        }
        $Order=Order::find($id);
            if($Order == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Order not found'
                     ]);
            }
            Order::where('id',$id)->delete();
            return response()->json([
            'status' => '200',
            'response' => 'Order Deleted'
             ]);
    }
}
