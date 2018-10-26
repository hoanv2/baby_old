<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    'name','slug'
        ];

    public function product()
    {
        return $this->belongsToMany('App\Models\Product', 'category_product', 'category_id', 'product_id')->withTimestamps();
    }
}
