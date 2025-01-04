<?php

namespace App\Livewire;

use App\Models\Material;
use Filament\Notifications\Notification;
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
        if (trim($this->newbrand) === '' || Material::where('name', $this->newbrand)->where('id', '!=', $this->id)->exists()) {
            Notification::make()
                ->title('Tên thương hiệu phải là duy nhất và không được để trống!')
                ->danger()
                ->iconColor('danger')
                ->icon('heroicon-o-x-mark')
                ->duration(3000)
                ->body('Vui lòng nhập lại!')
                ->send();
        }
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
