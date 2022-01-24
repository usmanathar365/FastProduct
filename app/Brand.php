<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable=[
        'name',
        'feature_image',
        'description',
        'username',
        'email',
        'password',
        'contact', 
        'status',
        'address',
        'note',

    ];
}
