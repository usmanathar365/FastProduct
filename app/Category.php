<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'brand_id',
        'name',
        'feature_image',
        'description',
        'status',
        'note',
     ];
     public function brand() {
        return $this->belongsTo(Brand::class);
    }
}
