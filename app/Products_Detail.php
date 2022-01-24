<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_Detail extends Model
{
    protected $fillable = [
        'SKU',
        'product_id',
        'brand_id',
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
