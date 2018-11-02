<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price','brand_id','image','content','description','slug'
    ];

    const Category = [
        1 => 'bim',
        2 => 'vv',
        5 => 'sữa',
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
//        return $this->belongsToMany('App\Models\Category');
        return $this->belongsToMany('App\Models\Category', 'category_products', 'product_id', 'category_id')->withTimestamps();
    }

}
