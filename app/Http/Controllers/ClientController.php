<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        return view('client.index');
    }

    public function milk(){
        return view('client.milk');
    }

    public function diapers(){
        return view('client.diapers');
    }
}
