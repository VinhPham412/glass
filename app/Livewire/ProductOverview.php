<?php
	
	namespace App\Livewire;
	
	use App\Models\Product;
	use Livewire\Component;
	
	class ProductOverview extends Component {
		public $product_id;
		public $product;
		public $list_colors;
		public $list_sizes;
		
		public $list_colors_selected = "";
		public $list_sizes_selected = "";
		
		public function mount($product_id) {
			$this->product = Product::find($product_id);
			$this->list_colors = $this->product->versions->pluck('color')->unique()->values()->all();
			$this->list_sizes = $this->product->versions->pluck('size')->unique()->values()->all();
		}
		public function change_color($color) {
			$this->list_colors_selected = $color;
		}
		public function change_size($size) {
            $this->list_sizes_selected = $size;
        }
		public function render() {
			return view('livewire.product-overview');
		}
	}