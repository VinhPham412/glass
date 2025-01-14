<?php
	
	namespace App\Livewire;
	
	use App\Models\Brand;
	use App\Models\Cat;
	use App\Models\Material;
	use App\Models\Origin;
	use App\Models\Product;
	use App\Models\Shape;
	use App\Models\Style;
	use App\Models\Version;
	use Livewire\Component;
	
	class CatFilter extends Component {
		public $products;
		public $brands;
		public $list_cats;
		public $list_brands;
		public $list_brands_selected = [];
		public $list_materials;
		public $list_materials_selected = [];
		public $list_origins;
		public $list_origins_selected = [];
		public $list_styles;
		public $list_styles_selected = [];
		public $list_shapes;
		public $list_shapes_selected = [];
		public $list_colors;
		public $list_colors_selected = [];
		public $list_sizes;
		public $list_sizes_selected = [];
		public $min_price;
		public $max_price;
		public $selected_price;
		public $search = '';
		public $tong_mat_kinh = 0;
		public $cat_selected = [];
		public $sort = "latest";
		public $product_on_page ;
		public $on_page;
		
		public function mount() {
			$this->products = Product::all();
			$this->list_cats = Cat::pluck('name', 'id');
			$this->list_brands = Brand::pluck('name', 'id');
			$this->list_materials = Material::pluck('name', 'id');
			$this->list_origins = Origin::pluck('name', 'id');
			$this->list_shapes = Shape::pluck('name', 'id');
			$this->list_styles = Style::pluck('name', 'id');
			$this->list_colors = Version::pluck('color', 'id')->unique()->values()->all();
			$this->list_sizes = Version::pluck('size', 'id')->unique()->values()->all();
			
			// Lấy ra giá sản phẩm thấp nhất
			$this->min_price = Version::min('price');
			// Lấy ra giá sản phẩm cao nhất
			$this->max_price = Version::max('price');
			
			$this->selected_price = $this->max_price;
			
			$this->product_on_page = 4;
			$this->on_page = $this->product_on_page;
			
		}
		
		public function updatingSearch() {
			$this->on_page = $this->product_on_page;
			$this->render();
		}
		
		public function updatingSort()
		{
			$this->on_page = $this->product_on_page;
			$this->render();
		}
		
		public function loadMore()
		{
			$this->on_page += $this->product_on_page;
		}
		
		public function clearfilter(){
			$this->search = '';
			$this->list_brands_selected = [];
			$this->list_materials_selected = [];
			$this->list_origins_selected = [];
			$this->list_styles_selected = [];
			$this->list_shapes_selected = [];
			$this->list_colors_selected = [];
			$this->list_sizes_selected = [];
			$this->selected_price = $this->max_price;
			
			$this->on_page = $this->product_on_page;
		}
		
		public function render() {
			// Khởi tạo query
			$query = Product::query()->where('name', 'like', '%' . $this->search . '%');
			
			// Lọc theo danh mục (nhiều-nhiều)
			if (!empty($this->cat_selected)) {
				$query->whereHas('cats', function ($query) {
					$query->whereIn('name', $this->cat_selected);
				});
			}
			
			// Lọc theo khoảng giá
			$query->whereHas('versions', function ($query) {
				$query->whereBetween('price', [$this->min_price, $this->selected_price]);
			});
			
			// Lọc theo màu sắc
			if (!empty($this->list_colors_selected)) {
				$query->whereHas('versions', function ($query) {
					$query->whereIn('color', $this->list_colors_selected);
				});
			}
			
			// Lọc theo size
			if (!empty($this->list_sizes_selected)) {
				$query->whereHas('versions', function ($query) {
					$query->whereIn('size', $this->list_sizes_selected);
				});
			}
			
			// Lọc theo brand
			if (!empty($this->list_brands_selected)) {
				$query->whereHas('brand', function ($query) {
					$query->whereIn('name', $this->list_brands_selected);
				});
			}
			
			// Lọc theo material
			if (!empty($this->list_materials_selected)) {
				$query->whereHas('material', function ($query) {
					$query->whereIn('name', $this->list_materials_selected);
				});
			}
			
			// Lọc theo origin
			if (!empty($this->list_origins_selected)) {
				$query->whereHas('origin', function ($query) {
					$query->whereIn('name', $this->list_origins_selected);
				});
			}
			
			// Lọc theo shape
			if (!empty($this->list_shapes_selected)) {
				$query->whereHas('shape', function ($query) {
					$query->whereIn('name', $this->list_shapes_selected);
				});
			}
			
			// Lọc theo style
			if (!empty($this->list_styles_selected)) {
				$query->whereHas('style', function ($query) {
					$query->whereIn('name', $this->list_styles_selected);
				});
			}
			
			// Sắp xếp (comment lại nếu không dùng)
			if (!empty($this->sort)) {
				if ($this->sort === 'latest') {
					$query->orderBy('updated_at', 'desc');
				} elseif ($this->sort === 'price_asc') {
					$query->orderByRaw('(SELECT MIN(price) FROM versions WHERE versions.product_id = products.id) ASC');
				} elseif ($this->sort === 'price_desc') {
					$query->orderByRaw('(SELECT MAX(price) FROM versions WHERE versions.product_id = products.id) DESC');
				}
			}
			
			// Lấy kết quả
			$this->products = $query->get();
			$this->tong_mat_kinh = $this->products->count();
			
			return view('livewire.cat-filter');
			
		}
	}
