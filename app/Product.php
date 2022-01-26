<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'PSKU',
        'brand_id',
        'category_id',
        'sub_category_id',
        'group_id',
        'name',
        'description',
        'short_description',
        'meterial',
        'type',
        'attributes', 
        'rank',
        'note',
        'feature_image',
        'cross_sell_products',
        'up_sell_products',
        'meta_tags',
        'meta_title',
        'meta_description',
        'title_description',
        'keywords', 
        'url',
        'stauts',
        
    ];
}
