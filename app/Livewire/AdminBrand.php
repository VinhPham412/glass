<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Brand;
use Livewire\WithPagination;

class AdminBrand extends Component
{
    use WithPagination;
    public $newbrand = '';
    public $listBrand = [];

    public function mount(): void
    {
        foreach (Brand::all() as $brand) {
            $this->listBrand[$brand->id] = $brand->name;
        }
    }

    public function addbrand(){
        $this->validate([
            'newbrand' => 'required|min:3',
        ]);
        Brand::create([
            'name' => $this->newbrand,
        ]);
        $this->newbrand = '';
        $this->mount();
    }

    public function editbrand($id){
        $brand = Brand::find($id);
        $brand->name = $this->listBrand[$id];
        $brand->save();
        $this->mount();
    }

    public function deletebrand($id){
        Brand::find($id)->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin-brand', [
            'brands' => Brand::paginate(5),
        ]);
    }

}
