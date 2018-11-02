<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index(){
        return view('client.index');
    }

    public function milk(){
        return view('client.milk');
    }

    public function diapers()
    {
        $diapers = DB::table('products')->join('category_products' , 'products.id','category_products.product_id')
            ->where('category_products.category_id','1')->get();
        return view('client/diapers/diapers',(compact('diapers')));
    }
    public function diapersShow($id)
    {
        $diapers = DB::table('products')->join('category_products' , 'products.id','category_products.product_id')
            ->where('category_products.category_id','1')
            ->get();

        $a = $diapers->where('products.id',$id)->first();
        dd($a);

        return view('client/diapers/show',(compact('diapers')));
    }
}
