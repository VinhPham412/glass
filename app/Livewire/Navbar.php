<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Cat;
use Filament\Notifications\Notification;
use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Livewire\Attributes\On;

class Navbar extends Component
{
    public $isSearchExpanded = false;
    public $cats ;
    public $brands;
	public $cart ;
	public $user;
	public $name_user="";
	public $email_user="";
	public $phone_user="";
	public $address_user="";
	public $amount_cart=0;

    public function mount(){
        $this->cats = Cat::all();
        $this->brands = Brand::all();
		
		// Khi người dùng lần đàu truy cập vào website thì tạo ra Cookie cart
	    if(!Cookie::has('cart')){
			// Tạo ra cart
            Cookie::queue('cart',"", 60*24*365); // 1 năm
        }
		// Load dữ liệu từ Cookie cart vào biến $cart
	    $this->cart = json_decode(Cookie::get('cart'), true)?: [];
		if(!Cookie::has('user')){
			// Tạo ra user
            Cookie::queue('user',"", 60*24*365); // 1 năm
        }
		$this->user = json_decode(Cookie::get('user'), true)?: [];
    }
	
	#[On('add_cart_success')]
	public function addCartSuccess(){
		$this->cart = json_decode(Cookie::get('cart'), true)?: [];
//		dd($this->cart);
    }
	
	public function removeCartItem($version_id){
		if(isset($this->cart[$version_id])){
            unset($this->cart[$version_id]);
            Cookie::queue('cart', json_encode($this->cart), 60*24*365);
        }
		Notification::make()
			->title('Xóa sản phẩm khỏi giỏ thành công!')
			->success()
			->send();
    }
	public function decreaseCartItem($version_id){
		if(isset($this->cart[$version_id]) && $this->cart[$version_id]> 1){
            $this->cart[$version_id]--;
            Cookie::queue('cart', json_encode($this->cart), 60*24*365);
			Notification::make()
				->title('Giảm số lượng sản phẩm trong giỏ thành công!')
				->success()
				->send();
        }
		
//		// Ngăn chặn việc render lại
//		$this->skipRender();
        
    }
	public function increaseCartItem($version_id){
		if(isset($this->cart[$version_id])){
            $this->cart[$version_id]++;
            Cookie::queue('cart', json_encode($this->cart), 60*24*365);
            Notification::make()
                ->title('Tăng số lượng sản phẩm trong giỏ thành công!')
                ->success()
                ->send();
        }
//		// Ngăn chặn việc render lại
//		$this->skipRender();
    }
	public function dathang(){
	
	}
	
	
	public function render()
    {
        return view('livewire.navbar');
    }
	
}