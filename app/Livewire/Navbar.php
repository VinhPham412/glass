<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $isSearchExpanded = false;

    public function toggleSearch()
    {
        $this->isSearchExpanded = !$this->isSearchExpanded;
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}