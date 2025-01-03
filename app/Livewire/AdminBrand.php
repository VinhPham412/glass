<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Brand;
use Livewire\WithPagination;

class AdminBrand extends Component
{
    use WithPagination;
    // public $newCatPost = '';
    public $listBrand = [];

    public function mount(){
        foreach (Brand::all() as $brand) {
            $this->listBrand[$brand->id] = $brand->name;
        }
    }

    // public function addCatPost()
    // {
    //     $this->validate([
    //         'newCatPost' => 'required',
    //     ]);

    //     $catpost = CatPost::create([
    //         'title' => $this->newCatPost,
    //     ]);

    //     $this->listCatPost[$catpost->id] = $this->newCatPost;
    //     $this->newCatPost = '';
    // }

    // public function editCatPost($id)
    // {
    //     $catpost = CatPost::find($id);
    //     $catpost->update([
    //         'title' => $this->listCatPost[$id],
    //     ]);
    // }

    // public function deleteCatPost($id)
    // {
    //     $catpost = CatPost::find($id);
    //     $catpost->delete();
    // }

    public function render()
    {
        return view('livewire.admin-brand', [
            'brands' => Brand::paginate(10),
        ]);
    }


}
