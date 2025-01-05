<?php

namespace App\Livewire;

use App\Models\Origin;
use Livewire\Component;
use App\Models\Brand;
use Filament\Notifications\Notification;
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

    public function addbrand()
    {
        if (trim($this->newbrand) === '' || Brand::where('name', $this->newbrand)->exists()) {
            Notification::make()
                ->title('Tên thương hiệu phải là duy nhất và không được để trống!')
                ->danger()
                ->iconColor('danger')
                ->icon('heroicon-o-x-mark')
                ->duration(3000)
                ->body('Vui lòng nhập lại!')
                ->send();
            return;
        }

        $newBrand = Brand::create([
            'name' => $this->newbrand,
        ]);
        $this->newbrand = '';
        $this->mount();

        Notification::make()
            ->title('Tạo mới thương hiệu '.$newBrand->name.' thành công!')
            ->success()
            ->iconColor('success')
            ->icon('heroicon-o-check')
            ->duration(3000)
            ->send();
    }

    public function editbrand($id)
    {
        $brand = Brand::find($id);
        $brand->name = $this->listBrand[$id];
        $brand->save();
        $this->mount();
    }

    public function deletebrand($id)
    {
        Notification::make()
            ->title('Đã xóa thương hiệu '.Brand::find($id)->name.' thành công!')
            ->success()
            ->iconColor('success')
            ->icon('heroicon-o-check')
            ->duration(3000)
            ->send();

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