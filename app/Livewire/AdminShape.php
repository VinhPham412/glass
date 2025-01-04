<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Shape;
use Livewire\WithPagination;

class AdminShape extends Component
{
    use WithPagination;
    public $newshape = '';
    public $listShape = [];

    public function mount(): void
    {
        foreach (Shape::all() as $shape ) {
            $this->listShape[$shape->id] = $shape->name;
        }
    }

    public function addshape(){
        $this->validate([
            'newshape' => 'required|min:3',
        ]);
        Shape::create([
            'name' => $this->newshape,
        ]);
        $this->newshape = '';
        $this->mount();
    }

    public function editshape($id){
        $shape = Shape::find($id);
        $shape->name = $this->listShape[$id];
        $shape->save();
        $this->mount();
    }

    public function deleteshape($id){
        Shape::find($id)->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin-shape', [
            'shapes' => Shape::paginate(5),
        ]);
    }

}
