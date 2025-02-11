<?php

namespace App\Livewire;

use Filament\Notifications\Notification;
use Livewire\Attributes\On;
use Livewire\Component;

class ModelOrderUser extends Component
{
	public $list_order ;
	public function mount()  {
		$list_order = $this->list_order;
	}
	#[On('order_success')]
	public function order_success() {
		$this->render();
	}
    public function render()
    {
        return view('livewire.model-order-user');
    }
}
