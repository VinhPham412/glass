<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Origin;
use Livewire\WithPagination;

class AdminOrigin extends Component
{
    use WithPagination;
    public $neworigin = '';
    public $listOrigin = [];

    public function mount(): void
    {
        foreach (Origin::all() as $origin ) {
            $this->listOrigin[$origin->id] = $origin->name;
        }
    }

    public function addorigin(){
        $this->validate([
            'neworigin' => 'required|min:3',
        ]);
        Origin::create([
            'name' => $this->neworigin,
        ]);
        $this->neworigin = '';
        $this->mount();
    }

    public function editorigin($id){
        $origin = Origin::find($id);
        $origin->name = $this->listOrigin[$id];
        $origin->save();
        $this->mount();
    }

    public function deleteorigin($id){
        Origin::find($id)->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin-origin', [
            'origins' => Origin::paginate(5),
        ]);
    }

}
