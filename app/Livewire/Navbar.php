<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Cat;
use Livewire\Component;

class Navbar extends Component
{
    public $isSearchExpanded = false;

    public $cats ;
    public $brands;

    public function mount(){
        $this->cats = Cat::all();
        $this->brands = Brand::all();
    }


    public function render()
    {
        return view('livewire.navbar');
    }
}