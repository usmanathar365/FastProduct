<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $fillable=[
        'customer_id',
        'card_number',
        'cvc',
        'expiry_date',
        'note',
    ];
}
