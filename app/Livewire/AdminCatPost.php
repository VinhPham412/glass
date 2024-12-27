<?php

namespace App\Livewire;

use App\Models\CatPost;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCatPost extends Component
{
    use WithPagination;
    public $newCatPost = '';
    public $listCatPost = [];

    public function mount(){
        foreach (CatPost::all() as $catpost) {
            $this->listCatPost[$catpost->id] = $catpost->title;
        }
    }

    public function addCatPost()
    {
        $this->validate([
            'newCatPost' => 'required',
        ]);

        $catpost = CatPost::create([
            'title' => $this->newCatPost,
        ]);

        $this->listCatPost[$catpost->id] = $this->newCatPost;
        $this->newCatPost = '';
    }

    public function editCatPost($id)
    {
        $catpost = CatPost::find($id);
        $catpost->update([
            'title' => $this->listCatPost[$id],
        ]);
    }

    public function deleteCatPost($id)
    {
        $catpost = CatPost::find($id);
        $catpost->delete();
    }

    public function render()
    {
        return view('livewire.admin-cat-post', [
            'catposts' => CatPost::paginate(10),
        ]);
    }
}

