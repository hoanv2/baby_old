<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ClientController extends Controller
{
    public function index(){
        return view('client.index');
    }

    public function diapers()
    {
        $diapers = DB::table('products')->join('category_products' , 'products.id','category_products.product_id')
            ->where('category_products.category_id','1')->get();
        return view('client/diapers/diapers',(compact('diapers')));
    }
    public function diapersShow($id)
    {
        $products = DB::table('products')
            ->join('category_products' , 'products.id','category_products.product_id')
            ->where('category_products.category_id','1')
            ->where('category_products.id' , $id)
            ->get()->toArray();
        return view('client/diapers/show',(compact('products')));
    }

    public function milk()
    {
        $milks = DB::table('products')->join('category_products' , 'products.id','category_products.product_id')
            ->where('category_products.category_id','2')->get();
        return view('client/milk/milk',(compact('milks')));
    }
}
