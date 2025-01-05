<?php

namespace App\Livewire;

use App\Models\Origin;
use Livewire\Component;
use App\Models\Style;
use Filament\Notifications\Notification;
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

    public function addstyle()
    {
        if (trim($this->newstyle) === '' || Style::where('name', $this->newstyle)->exists()) {
            Notification::make()
                ->title('Tên phong cách phải là duy nhất và không được để trống!')
                ->danger()
                ->iconColor('danger')
                ->icon('heroicon-o-x-mark')
                ->duration(3000)
                ->body('Vui lòng nhập lại!')
                ->send();
            return;
        }

        $newStyle = Style::create([
            'name' => $this->newstyle,
        ]);
        $this->newstyle = '';
        $this->mount();

        Notification::make()
            ->title('Tạo mới phong cách '.$newStyle->name.' thành công!')
            ->success()
            ->iconColor('success')
            ->icon('heroicon-o-check')
            ->duration(3000)
            ->send();
    }

    public function editstyle($id){
        $style = Style::find($id);
        $style->name = $this->listStyle[$id];
        $style->save();
        $this->mount();
    }

    public function deletestyle($id){
        Notification::make()
            ->title('Đã xóa phong cách '.Style::find($id)->name.' thành công!')
            ->success()
            ->iconColor('success')
            ->icon('heroicon-o-check')
            ->duration(3000)
            ->send();

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
