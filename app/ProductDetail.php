<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = [
        'SKU',
        'product_id',
        'branch_id',
        'color_id',
        'size_id',
        'quantity',
        'regular_price',
        'discounted_price',
        'feature_image',
        'gallery_images',
        'weight',        
    ];
}
