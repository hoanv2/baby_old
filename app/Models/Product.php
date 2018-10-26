<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price','brand_id','image','content','description','slug'
    ];

    public function category()
    {
//        return $this->belongsToMany('App\Models\Category');
        return $this->belongsToMany('App\Models\Category', 'category_product', 'product_id', 'category_id')->withTimestamps();
    }

}
