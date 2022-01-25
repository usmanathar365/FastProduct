<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable=[
         'brand_id',
         'name',
         'location',
         'description',
         'contact',
         'address',
         'note',
     ];
}
