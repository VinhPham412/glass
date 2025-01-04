<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Style;
use Livewire\WithPagination;

class AdminStyle extends Component
{
    use WithPagination;
    public $newstyle = '';
    public $listStyle = [];

    public function mount(): void
    {
        foreach (Style::all() as $style ) {
            $this->listStyle[$style->id] = $style->name;
        }
    }

    public function addstyle(){
        $this->validate([
            'newstyle' => 'required|min:3',
        ]);
        Style::create([
            'name' => $this->newstyle,
        ]);
        $this->newstyle = '';
        $this->mount();
    }

    public function editstyle($id){
        $style = Style::find($id);
        $style->name = $this->listStyle[$id];
        $style->save();
        $this->mount();
    }

    public function deletestyle($id){
        Style::find($id)->delete();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin-style', [
            'styles' => Style::paginate(5),
        ]);
    }

}
