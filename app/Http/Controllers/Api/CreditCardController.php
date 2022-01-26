<?php

namespace App\Http\Controllers\Api;

use App\CreditCard;
use App\Customer;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CreditCardController extends Controller
{
    public function CreditCards(){
        $CreditCards=CreditCard::all();
        return response()->json($CreditCards);
    }
    
    public function SaveCreditCard(Request $request){

        $rules = array(
        'customer_id' => 'required|integer',
        'card_number' => 'required|unique:credit_cards',                        
        'cvc'         => 'required|integer|min:3|max:255',                          
        'expiry_date' => 'required|string|min:3|max:255',    
        'note'        => 'required|string|min:3|max:260',                          
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
            $CreditCard=new CreditCard();
            $CreditCard->customer_id=$request->customer_id;
            $CreditCard->card_number=$request->card_number;
            $CreditCard->cvc=$request->cvc;
            $CreditCard->expiry_date=$request->expiry_date;
            $CreditCard->note=$request->note;
            $CreditCard->save();
            return response()->json([
                'status' => '200',
                 'response' => 'CreditCard Added'
                 ]);
        }
    
    }

    public function UpdateCreditCard(Request $request){
        $rules = array(
        'creditcard_id'=> 'required|integer',
        'customer_id' => 'required|integer',
        'card_number' => 'required',                        
        'cvc'         => 'required|integer|min:3|max:255',                          
        'expiry_date' => 'required|string|min:3|max:255',    
        'note'        => 'required|string|min:3|max:260',                        
            
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json($validator->errors());
        }
        else{
             
            $CreditCard=CreditCard::find($request->creditcard_id);
            if($CreditCard == null){
                return response()->json([
                    'status' => '200',
                    'response' => 'CreditCard not found'
                    ]);
                }
                $Customer=Customer::find($request->customer_id);
                if($Customer == null){
                    return response()->json([
                        'status' => '200',
                        'response' => 'Customer not found'
                        ]);
                    }       
                $CreditCard->customer_id=$request->customer_id;
                $CreditCard->card_number=$request->card_number;
                $CreditCard->cvc=$request->cvc;
                $CreditCard->expiry_date=$request->expiry_date;
                $CreditCard->note=$request->note;
                $CreditCard->update();

            return response()->json([
                'status' => '200',
                'response' => 'CreditCard Updated'
                 ]);
        }
    }

    public function DeleteCreditCard(Request $request){
        $id=$request->creditcard_id;
        if($id ==null){
            return response()->json([
                'status' => '200',
                 'response' => 'CreditCard required'
                 ]);
        }
        $CreditCard=CreditCard::find($id);
            if($CreditCard == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'CreditCard not found'
                     ]);
            }
            CreditCard::where('id',$id)->delete();
            return response()->json([
            'status' => '200',
            'response' => 'CreditCard Deleted'
             ]);
    }
}
