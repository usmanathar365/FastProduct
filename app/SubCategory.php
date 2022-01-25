<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable=[
        'category_id',
        'brand_id',
        'name',
        'image',
        'description',
        'status',
        'note',
    ];
    public function brand() {
        return $this->belongsTo(Brand::class);
    }
    public function categories() {
        return $this->belongsTo(Category::class);
    }
}
