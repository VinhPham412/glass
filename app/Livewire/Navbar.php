<?php
	
	namespace App\Livewire;
	
	use App\Models\Brand;
	use App\Models\Cat;
	use App\Models\Customer;
	use App\Models\Order;
	use App\Models\OrderItem;
	use App\Models\Version;
	use Filament\Notifications\Notification;
	use Livewire\Component;
	use Illuminate\Support\Facades\Cookie;
	use Livewire\Attributes\On;
	
	class Navbar extends Component {
		public $expand_drawer = false;
		public $cats;
		public $brands;
		public $cart;
		public $user;
		public $name_user = "";
		public $email_user = "";
		public $phone_user = "";
		public $address_user = "";
		public $amount_cart = 0;
		public $payment = 'cod';
		
		public function mount() {
			$this->cats = Cat::all();
			$this->brands = Brand::all();
			
			// Khi người dùng lần đàu truy cập vào website thì tạo ra Cookie cart
			if (!Cookie::has('cart')) {
				// Tạo ra cart
				Cookie::queue('cart', "", 60 * 24 * 365); // 1 năm
			}
			// Load dữ liệu từ Cookie cart vào biến $cart
			$this->cart = json_decode(Cookie::get('cart'), true) ?: [];
			if (!Cookie::has('user')) {
				// Tạo ra user
				Cookie::queue('user', "", 60 * 24 * 365); // 1 năm
			}
			$this->user = json_decode(Cookie::get('user'), true) ?: [];
			$this->name_user = isset($this->user['name']) ? $this->user['name'] : "";
			$this->email_user = isset($this->user['email']) ? $this->user['email'] : "";
			$this->phone_user = isset($this->user['phone']) ? $this->user['phone'] : "";
			$this->address_user = isset($this->user['address']) ? $this->user['address'] : "";
		}
		
		#[On('add_cart_success')]
		public function addCartSuccess() {
			$this->cart = json_decode(Cookie::get('cart'), true) ?: [];
			//		dd($this->cart);
		}
		
		public function removeCartItem($version_id) {
			if (isset($this->cart[$version_id])) {
				unset($this->cart[$version_id]);
				Cookie::queue('cart', json_encode($this->cart), 60 * 24 * 365);
			}
			Notification::make()->title('Xóa sản phẩm khỏi giỏ thành công!')->success()->send();
			// Vẫn mở drawer
			$this->expand_drawer = true;
		}
		
		public function decreaseCartItem($version_id) {
			if (isset($this->cart[$version_id]) && $this->cart[$version_id] > 1) {
				$this->cart[$version_id]--;
				Cookie::queue('cart', json_encode($this->cart), 60 * 24 * 365);
				Notification::make()->title('Giảm số lượng sản phẩm trong giỏ thành công!')->success()->send();
			}
			// Vẫn mở drawer
			$this->expand_drawer = true;
			
		}
		
		public function increaseCartItem($version_id) {
			if (isset($this->cart[$version_id])  and
				(Version::find($version_id)->stock >= $this->cart[$version_id] + 1) ) {
				$this->cart[$version_id]++;
				Cookie::queue('cart', json_encode($this->cart), 60 * 24 * 365);
				Notification::make()->title('Tăng số lượng sản phẩm trong giỏ thành công!')->success()->send();
			} else {
				Notification::make()->title('Thêm vượt qua tồn kho!')->danger()->send();
			}
			// Vẫn mở drawer
			$this->expand_drawer = true;
		}
		
		public function dat_hang() {
			// Kiểm tra có hàng trong giỏ không
			if (empty($this->cart)) {
                Notification::make()->title('Giỏ hàng của bạn đang trống!')->warning()->send();
                return;
            }
            
            // Kiểm tra xem user đã chọn phương thức thanh toán hay chưa
			
			// Kiểm tra số lượng hàng trong giỏ có lớn hơn hoặc bằng tồn kho không
			$cart_updated = false;
			foreach ($this->cart as $version_id => $quantity) {
				$version = \App\Models\Version::find($version_id);
				if ($version && $quantity > $version->stock) {
					$this->cart[$version_id] = $version->stock;
					$cart_updated = true;
					Notification::make()->title("Số lượng sản phẩm '{$version->product->name}' vượt quá tồn kho!")->body("Đã giảm số lượng xuống {$version->stock}.")->warning()->send();
				}
			}
			
			if ($cart_updated) {
				Cookie::queue('cart', json_encode($this->cart), 60 * 24 * 365);
			}
			
			// Kiểm tra xem user đã điền đầy đủ thông tin chưa
			if (empty($this->name_user) || empty($this->email_user) || empty($this->phone_user) || empty($this->address_user)) {
				Notification::make()->title('Vui lòng điền đầy đủ thông tin mua của bạn!')->warning()->send();
				return;
			}
			
			// Nếu đã có email đó thì cập nhật lại thoong tin user ,  còn chưa thì tạo ra user đó, tạo qua model Customer
			// Kiểm tra xem có $this->email_user trong Customer chưa
			$customer_order = null;
			if (Customer::where('email', $this->email_user)->first()) {
				$customer = Customer::where('email', $this->email_user)->first();
                $customer->name = $this->name_user;
                $customer->phone = $this->phone_user;
                $customer->address = $this->address_user;
                $customer->save();
				$customer_order = $customer;
			} else {
				$customer = new Customer();
                $customer->name = $this->name_user;
                $customer->email = $this->email_user;
                $customer->phone = $this->phone_user;
                $customer->address = $this->address_user;
				$customer->password = bcrypt('123456'); // mật khẩu mặc đ��nh
				$customer->google_id = null; // id của user trên Google, mặc đ��nh là null
				$customer->facebook_id = null; // id của user trên Facebook, mặc đ��nh là null
                $customer->save();
				
				$customer_order = $customer;
			}
			
			// Cập nhật cookie user
			$this->user = [
                'name' => $customer->name,
                'email' => $customer->email,
                'phone' => $customer->phone,
                'address' => $customer->address,
            ];
            Cookie::queue('user', json_encode($this->user), 60 * 24 * 365);
			
			// Trừ số lượng hàng trong kho tức trừ stock trong variant
			foreach ($this->cart as $version_id => $quantity) {
                $version = Version::find($version_id);
                if ($version) {
                    $version->stock -= $quantity;
                    $version->save();
                }
            }
			
			// Tạo ra đơn hàng
			$order = new Order();
            $order->customer_id = $customer_order->id;
            $order->save();
            
            // Tạo chi tiết đơn hàng . cụ the là tạo ra cac order_item
			foreach ($this->cart as $version_id => $quantity) {
				$version = Version::find($version_id);
                if ($version) {
                    $order_item = new OrderItem();
                    $order_item->order_id = $order->id;
                    $order_item->version_id = $version_id;
                    $order_item->quantity = $quantity;
                    $order_item->price = $version->price;
					$order_item->image = $version->images->first()->link;
                    $order_item->save();
                }
			}
			// Xóa giỏ hàng và cập nhật cookie
			Cookie::queue('cart', null);
            $this->cart = [];
			
			Notification::make()->title('Đặt hàng thành công!')->success()->send();
			//  Gửi dispatch đến ProductOverview để nó bieest số lượng hàng đã được cập nhật
			$this->dispatch('order_success');
			
			// Vẫn mở drawer
			$this->expand_drawer = true;
			
			// Gửi email thông báo đơn hàng đã được tạo thành công
			
		}
		public function render() {
			return view('livewire.navbar');
		}
		
	}