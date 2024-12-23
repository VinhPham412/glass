<?php

namespace App\Livewire;

use App\Models\CatPost;
use Livewire\Component;

class CreatePost extends Component
{
    public $catpost;
    public $title_cat = '';

    public function addCat(){
        // $this->validate([
        //     // title_cat phải có giá trị khác rỗng , độ dài tối đa là 255 ký tự, không được trùng với dữ liệu đã có trong bảng cat_posts->tilte 
        //     'title_cat' => 'required|max:255|unique:cat_posts,title'
        // ]);
        $is_validated = $this->validate([
            // title_cat phải có giá trị khác rỗng , độ dài tối đa là 255 ký tự, không được trùng với dữ liệu đã có trong bảng cat_posts->tilte 
            'title_cat' => 'required|max:255|unique:cat_posts,title'
        ]);

        if(!$is_validated){
            $this->dispatch('notify', 'Thêm thất bại');
            return;
        }   
        
        CatPost::create([
            'title' => $this->title_cat
        ]);

        $this->dispatch('notify', 'Thêm thành công');

        $this->title_cat = '';
    }

    public function render()
    {
        $this->catpost = CatPost::all();

        return view('livewire.create-post') ;
    }
}
