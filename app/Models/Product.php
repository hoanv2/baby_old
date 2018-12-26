<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price','brand_id','image','content','description','slug'
    ];

    const Category = [
        1 => 'Sữa',
        2 => 'Bỉm',
        3 => 'Khác',
    ];

    public static function getConst($consts)
    {
        if (empty($consts)) {
            return $consts;
        }

        $result = [];
        foreach ($consts as $key => $value) {
            $result[$key] = $value;
        }

        return $result;
    }

    public function category()
    {
        return $this->belongsToMany('App\Models\Category', 'category_products', 'product_id', 'category_id')->withTimestamps();
    }

    public function brand()
    {
        return $this->belongsToMany('App\Models\Brand', 'brand_products', 'product_id', 'brand_id')->withTimestamps();
    }

}
