<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable =[
        'brand_id',
         'name',
         'values',
         'note',
     ];
}
