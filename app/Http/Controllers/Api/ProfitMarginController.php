<?php

namespace App\Http\Controllers\Api;
use App\Brand;
use App\Category;
use App\SubCategory;
use App\ProfitMargin;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProfitMarginController extends Controller
{
    public function ProfitMargins(){
        $ProfitMargins=ProfitMargin::all();
        return response()->json($ProfitMargins);
    }
    
    public function SaveProfitMargin(Request $request){

        $rules = array(                         
        'brand_id'          => 'required|integer',                          
        'category_id'       => 'required|integer',                          
        'sub_category_id'   => 'required|integer',                          
        'profit_margin_type'=> 'required|string',                          
        'profit_margin'     => 'required|string',                        
        'note'              => 'required|string|max:255',                                                  
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
            $ProfitMargin=new ProfitMargin();
            $ProfitMargin->brand_id=$request->brand_id;
            $ProfitMargin->category_id=$request->category_id;
            $ProfitMargin->sub_category_id=$request->sub_category_id;
            $ProfitMargin->profit_margin_type=$request->profit_margin_type;
            $ProfitMargin->profit_margin=$request->profit_margin;
            $ProfitMargin->note=$request->note;
            $ProfitMargin->save();
            return response()->json([
                'status' => '200',
                 'response' => 'ProfitMargin Added'
                 ]);
        }
    
    }

    public function UpdateProfitMargin(Request $request){
        $rules = array(
        'profit_margin_id'  => 'required|integer',
        'brand_id'          => 'required|integer',                          
        'category_id'       => 'required|integer',                          
        'sub_category_id'   => 'required|integer',                          
        'profit_margin_type'=> 'required|string',                          
        'profit_margin'     => 'required|string',                        
        'note'              => 'required|string|max:255',
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
            $ProfitMargin=ProfitMargin::find($request->profit_margin_id);
            if($ProfitMargin == null){
                return response()->json([
                    'status' => '200',
                    'response' => 'ProfitMargin not found'
                    ]);
                }
                      
            $ProfitMargin->brand_id=$request->brand_id;
            $ProfitMargin->category_id=$request->category_id;
            $ProfitMargin->sub_category_id=$request->sub_category_id;
            $ProfitMargin->profit_margin_type=$request->profit_margin_type;
            $ProfitMargin->profit_margin=$request->profit_margin;
            $ProfitMargin->note=$request->note;
            $ProfitMargin->update();

            return response()->json([
                'status' => '200',
                'response' => 'ProfitMargin Updated'
                 ]);
        }
    }

    public function DeleteProfitMargin(Request $request){
        $id=$request->ProfitMargin_id;
        if($id ==null){
            return response()->json([
                'status' => '200',
                 'response' => 'ProfitMargin required'
                 ]);
        }
        $ProfitMargin=ProfitMargin::find($id);
            if($ProfitMargin == null){
                return response()->json([
                    'status' => '200',
                     'response' => 'ProfitMargin not found'
                     ]);
            }
            ProfitMargin::where('id',$id)->delete();
            return response()->json([
            'status' => '200',
            'response' => 'ProfitMargin Deleted'
             ]);
    }
}
