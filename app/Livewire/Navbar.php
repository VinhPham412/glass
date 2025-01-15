<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Cat;
use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Livewire\Attributes\On;

class Navbar extends Component
{
    public $isSearchExpanded = false;
    public $cats ;
    public $brands;
	public $cart ;

    public function mount(){
        $this->cats = Cat::all();
        $this->brands = Brand::all();
		
		// Khi người dùng lần đàu truy cập vào website thì tạo ra Cookie cart
	    if(!Cookie::has('cart')){
			// Tạo ra cart
            Cookie::queue('cart',"", 60*24*365); // 1 năm
        }
		// Load dữ liệu từ Cookie cart vào biến $cart
	    $this->cart = json_decode(Cookie::get('cart'), true)?: []; // Nếu Cookie không tồn tại thì trả về mảng r��ng, ngược lại trả về giá trị của Cookie nếu tồn tại
    }
	
	#[On('add_cart_success')]
	public function addCartSuccess(){
		$this->cart = json_decode(Cookie::get('cart'), true)?: [];
//		dd($this->cart);
    }
	
	public function render()
    {
        return view('livewire.navbar');
    }
	
}