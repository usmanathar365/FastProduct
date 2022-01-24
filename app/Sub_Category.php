<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    protected $fillable=[
        'category_id',
        'brand_id',
        'name',
        'image',
        'description',
        'status',
        'note',
    ];
}
