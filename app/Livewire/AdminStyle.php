<?php

namespace App\Livewire;

use App\Models\Shape;
use Filament\Notifications\Notification;
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
        if (trim($this->newstyle) === '' || Style::where('name', $this->newstyle)->where('id', '!=', $this->id)->exists()) {
            Notification::make()
                ->title('Tên phong cách phải là duy nhất và không được để trống!')
                ->danger()
                ->iconColor('danger')
                ->icon('heroicon-o-x-mark')
                ->duration(3000)
                ->body('Vui lòng nhập lại!')
                ->send();
        }
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
