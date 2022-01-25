<?php

namespace App\Http\Controllers\Api;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function GetProducts(){
        $categories=Product::all();
        return response()->json($categories);
    }
}
