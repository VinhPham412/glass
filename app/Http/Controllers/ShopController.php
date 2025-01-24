<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Livewire\ProductOverview;

class ShopController extends Controller
{
	public $product;
	public $product_id;
	public function mount($product_id){
		$this->product = Product::find($product_id);
	}
    public function index()
    {
        return view('main.store_front');
    }

    public function catfilter()
    {
        return view('main.catfilter');
    }
	
	public function product_overview($id){
		return view('main.product_overview',[
			'product_id' => $id
		]);
	}
	
	public function try_on($id){
		$product = Product::find($id);
		return view('main.try_on',[
			'product' => $product
		]);
	}

    public function test()
    {
        return view('main.test');
    }
}
