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
        foreach (Material::all() as $material ) {
            $this->listMaterial[$material->id] = $material->name;
        }
    }

    public function addmaterial(){
        // Notification::create()
        // ->title('Saved successfully')
        // ->success()
        // ->send();
        $validate = $this->validate([
            'newmaterial' => 'required|unique:materials,name',
        ]);

        // if (!$validate) {
        //     Notification::create()
        //         ->message('Chất liệu lỗi !')
        //         ->send();
        //     return;
        // }
        

        Material::create([
            'name' => $this->newmaterial,
        ]);
        $this->newmaterial = '';
        $this->mount();
    }

    public function editmaterial($id){
        $material = Material::find($id);
        $material->name = $this->listMaterial[$id];
        $material->save();
        $this->mount();
    }

    public function deletematerial($id){
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
