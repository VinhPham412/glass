<?php
	
	namespace App\Livewire;
	
	use App\Models\Product;
	use Illuminate\Support\Facades\Cookie;
	use Livewire\Component;
	use Filament\Notifications\Notification;
	
	class ProductOverview extends Component {
		public $product_id;
		public $product;
		public $list_colors;
		public $list_sizes;
		public $list_colors_selected = "";
		public $list_sizes_selected = "";
		
		public $cart;
  public $loading_add_to_cart = false;
		
		public function mount($product_id) {
			$this->product = Product::find($product_id);
			$this->list_colors = $this->product->versions->pluck('color')->unique()->values()->all();
			$this->list_sizes = $this->product->versions->pluck('size')->unique()->values()->all();
			
			// Khi người dùng lần đàu truy cập vào website thì tạo ra Cookie cart
			if(!Cookie::has('cart')){
				// Tạo ra cart
				Cookie::queue('cart',"", 60*24*365); // 1 năm
			}
			// Load dữ liệu từ Cookie cart vào biến $cart
			$this->cart = json_decode(Cookie::get('cart'), true)?: [];
		}
		
		public function change_color($color) {
			$this->list_colors_selected = $color;
		}
		
		public function change_size($size) {
			$this->list_sizes_selected = $size;
		}
		
		public function add_to_cart($version_id) {
			if ($this->loading_add_to_cart) {
				return;
			}
			$this->loading_add_to_cart = true;
			
			// Nếu version_id chưa có trong cart thì thêm một dòng vào và có số là 1
			if (!isset($this->cart[$version_id])) {
                $this->cart[$version_id] = 1;
            } else {
                // Nếu version_id đã có trong cart thì tăng số lượng lên 1
                $this->cart[$version_id]++;
            }
            // Lưu dữ liệu về Cookie cart
            Cookie::queue('cart', json_encode($this->cart), 60*24*365); // 1 năm
			$this->dispatch('add_cart_success');
            // Hiển thị thông báo thêm sản phẩm vào gi�� hàng thành công
			Notification::make()
				->title('Thêm sản phẩm vào giỏ hàng thành công!')
				->success()
				->send();
			
			$this->loading_add_to_cart = false;
		}
		
		public function render() {
			return view('livewire.product-overview');
		}
	}