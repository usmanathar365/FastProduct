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
    public function categories() {
        return $this->hasMany(App\Category::class);
    }
    public function sub_categories() {
        return $this->hasMany(App\SubCategory::class);
    }
}
