<?php

namespace App\Livewire;

use Livewire\Component;

class CatFilter extends Component
{
    public $giay;
    public $ao;
    public $tatvo;
    public $phukien;
    public $products;
    public $brands;
    public $types;

    public function render()
    {
        return view('livewire.cat-filter');
    }
}
