<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Cat;
use App\Models\Material;
use App\Models\Origin;
use App\Models\Product;
use App\Models\Shape;
use App\Models\Style;
use Livewire\Component;

class CatFilter extends Component
{
    public $products;
    public $brands;
    public $list_cats;
    public $list_brands;
    public $list_materials;
    public $list_origins;
    public $list_styles;
    public $list_shapes;
    public $min_price ;
    public $max_price ;

    public function mount(){
        $this->products = Product::all();
        $this->list_cats = Cat::pluck('name', 'id');
        $this->list_brands = Brand::pluck('name', 'id');
        $this->list_materials = Material::pluck('name','id');
        $this->list_origins = Origin::pluck('name', 'id');
        $this->list_shapes = Shape::pluck('name','id');
        $this->list_styles = Style::pluck('name','id');
    }

    public function render()
    {
        return view('livewire.cat-filter');
    }
}
