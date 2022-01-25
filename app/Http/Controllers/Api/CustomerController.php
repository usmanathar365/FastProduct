<?php

namespace App\Http\Controllers\Api;
use App\Customer;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function Customers(){
        $Customers=Customer::all();
        return response()->json($Customers);
    }
    
    public function SaveCustomer(Request $request){

        $rules = array(
            'first_name' => 'required|string|min:3|max:255',
            'last_name'  => 'required|string|min:3|max:255',                        
            'email' =>    'required|unique:customers|email',                          
            'password' =>    'required|string|min:6|max:260',                          
            'phone' =>    'required|string|min:3|max:260',                          
            'city'       => 'required|string|min:3|max:255',    
            'state'      => 'required|string|min:3|max:255',                        
            'postal_code'=> 'required|integer',                          
            'country' =>    'required|string|min:3|max:260',
            'address1'   => 'required|string|min:6|max:255',                        
            'address2'   => 'required|string|min:3|max:255',                        
           
        );
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json($validator->errors());
        }
        else{            
            $Customer=new Customer();
            $Customer->first_name=$request->first_name;
            $Customer->last_name=$request->last_name;
            $Customer->email=$request->email;
            $Customer->password=$request->password;
            $Customer->phone=$request->phone;
            $Customer->city=$request->city;
            $Customer->state=$request->state;
            $Customer->postal_code=$request->postal_code;
            $Customer->country=$request->country;
            $Customer->address1=$request->address1;
            $Customer->address2=$request->address2;
            $Customer->save();
            return response()->json([
                'status' => '200',
                 'response' => 'Customer Added'
                 ]);
           
        }
    
    }

    public function UpdateCustomer(Request $request){
        $rules = array(
            'customer_id' => 'required|integer',
            'first_name'  => 'required|string|min:3|max:255',
            'last_name'   => 'required|string|min:3|max:255',                        
            'email'       => 'required|email',                          
            'password'    => 'required|string|min:6|max:260',                          
            'phone'       => 'required|string|min:3|max:260',                          
            'city'        => 'required|string|min:3|max:255',    
            'state'       => 'required|string|min:3|max:255',                        
            'postal_code' => 'required|integer',                          
            'country'     => 'required|string|min:3|max:260',
            'address1'    => 'required|string|min:6|max:255',                        
            'address2'    => 'required|string|min:3|max:255',                        
            
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
                $Customer->first_name=$request->first_name;
                $Customer->last_name=$request->last_name;
                $Customer->email=$request->email;
                $Customer->password=$request->password;
                $Customer->phone=$request->phone;
                $Customer->city=$request->city;
                $Customer->state=$request->state;
                $Customer->postal_code=$request->postal_code;
                $Customer->country=$request->country;
                $Customer->address1=$request->address1;
                $Customer->address2=$request->address2;
                $Customer->update();

            return response()->json([
                'status' => '200',
                'response' => 'Customer Updated'
                 ]);
        }
    }

    public function DeleteCustomer(Request $request){
        $id=$request->customer_id;
        if($id ==null){
            return response()->json([
                'status' => '200',
                 'response' => 'Customer required'
                 ]);
        }
        $Customer=Customer::find($id);
            if($Customer == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'Customer not found'
                     ]);
            }
            Customer::where('id',$id)->delete();
            return response()->json([
            'status' => '200',
            'response' => 'Customer Deleted'
             ]);
    }
}
