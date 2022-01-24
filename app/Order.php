<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=[
        'customer_id',
        'order_number',
         'payment_type',
         'payment_status',
         'order_date',
         'ship_date',
         'delivery_charges',
         'transaction_status',
         'tracking_number',
         'amount',
         'discount',
         'status',
         'order_details_id',
         'note',
     ];
}
