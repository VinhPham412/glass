<?php

namespace App\Livewire;

use App\Models\CatPost;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCatPost extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin-cat-post', [
            'catposts' => CatPost::paginate(10),
        ]);
    }
}

