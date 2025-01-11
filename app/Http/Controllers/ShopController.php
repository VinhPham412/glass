<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('main.store_front');
    }

    public function catfilter()
    {
        return view('main.catfilter');
    }

    public function product_overview($id)
    {
        return view('main.product_overview');
    }
}
