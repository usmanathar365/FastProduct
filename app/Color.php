<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable=[
        'name',
        'brand_id',
        'hex',
        'description',
    ];
}
