<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'address1',
        'address2',
        'city',
        'state',
        'postal_code',
        'country',
        'phone',
        'email',
        'password', 
         
    ];
}
