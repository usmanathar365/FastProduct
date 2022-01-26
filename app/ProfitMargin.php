<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfitMargin extends Model
{
    protected $fillable=[
        'brand_id',
        'category_id',
        'sub_category_id',
        'profit_margin_type',
        'profit_margin',
        'note',
 ];
}
