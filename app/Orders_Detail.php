<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders_Detail extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'product_details_id',
       'quantity',
       'amount',
        'status',
    ];
}