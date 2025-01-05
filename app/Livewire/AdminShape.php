<?php

namespace App\Livewire;

use App\Models\Origin;
use Livewire\Component;
use App\Models\Shape;
use Filament\Notifications\Notification;
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

    public function addshape()
    {
        if (trim($this->newshape) === '' || Shape::where('name', $this->newshape)->exists()) {
            Notification::make()
                ->title('Tên hình dáng phải là duy nhất và không được để trống!')
                ->danger()
                ->iconColor('danger')
                ->icon('heroicon-o-x-mark')
                ->duration(3000)
                ->body('Vui lòng nhập lại!')
                ->send();
            return;
        }

        $newShape = Shape::create([
            'name' => $this->newshape,
        ]);
        $this->newshape = '';
        $this->mount();

        Notification::make()
            ->title('Tạo mới kiểu dáng '.$newShape->name.' thành công!')
            ->success()
            ->iconColor('success')
            ->icon('heroicon-o-check')
            ->duration(3000)
            ->send();
    }

    public function editshape($id){
        $shape = Shape::find($id);
        $shape->name = $this->listShape[$id];
        $shape->save();
        $this->mount();
    }

    public function deleteshape($id){
        Notification::make()
            ->title('Đã xóa kiểu dáng '.Shape::find($id)->name.' thành công!')
            ->success()
            ->iconColor('success')
            ->icon('heroicon-o-check')
            ->duration(3000)
            ->send();

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
