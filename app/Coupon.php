<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable=[
        'code',
       'description',
        'discount_type',
        'coupon_amount',
        'allow_free_shipping',
        'expiry_date',
        'usage_limit',
        'usage_restrictions_products ',
        'usage_restrictions_categories ',
        'usage_restrictions_brands ',
        'usage_by_users',
    ];
}
