<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Material;
use Filament\Notifications\Notification;
use Livewire\WithPagination;

class AdminMaterial extends Component
{
    use WithPagination;

    public $newmaterial = '';
    public $listMaterial = [];

    public function mount(): void
    {
        foreach (Material::all() as $material) {
            $this->listMaterial[$material->id] = $material->name;
        }
    }

    public function addmaterial()
    {
        if (trim($this->newmaterial) === '' || Material::where('name', $this->newmaterial)->where('id', '!=', $this->id)->exists()) {
            Notification::make()
                ->title('Tên chất liệu phải là duy nhất và không được để trống!')
                ->danger()
                ->iconColor('danger')
                ->icon('heroicon-o-x-mark')
                ->duration(3000)
                ->body('Vui lòng nhập lại!')
                ->send();
        }


        Material::create([
            'name' => $this->newmaterial,
        ]);
        $this->newmaterial = '';
        $this->mount();
    }

    public function editmaterial($id)
    {
        $material = Material::find($id);
        $material->name = $this->listMaterial[$id];
        $material->save();
        $this->mount();
    }

    public function deletematerial($id)
    {
        Material::find($id)->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin-material', [
            'materials' => Material::paginate(5),
        ]);
    }

}
