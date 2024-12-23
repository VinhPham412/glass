<?php

namespace App\Livewire;

use App\Models\CatPost;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostPagination extends Component
{
    use WithPagination;
    protected $listeners = [
        'postCreated' => 'render',
        'postDeleted' => 'render',
    ];

    public $search = ''; // Từ khóa tìm kiếm
    public $sortField = 'created_at'; // Trường sắp xếp mặc định
    public $sortAsc = 'desc'; // Hướng sắp xếp mặc định (giảm dần)
    public $count_checkbox = 0; // Số lượng checkbox được chọn
    public $selected = []; // Mảng chứa id của các bài viết được chọn
    public $selectAll = false; // Trạng thái chọn tất cả
    public $catpost;
    public $catpost_id = ""; // ID của danh mục bài viết

    // Khi input search thay đổi tôi muốn render lại trang
    public function updatingSearch()
    {
        $this->selected = [];
        $this->count_checkbox = 0;
        $this->resetPage();
    }
    public function updatingCatpostId()
    {
        $this->selected = [];
        $this->count_checkbox = 0;
        $this->resetPage();
    }
    public function updatedSelected()
    {
        $this->count_checkbox = count($this->selected);
    }
    public function deletePost($id)
    {
        Post::destroy($id);
    }
    public function processSelected($process){
        if (count($this->selected) == 0) {
            $this->dispatch('noselected');
            return;
        }

        if ($process == 'delete') {
            $this->dispatch('cormfirmdelete');
        } else if  ($process == 'hidden') {
            $this->dispatch('confirmhidden');
        } else if($process == 'show') { 
            $this->dispatch('confirmshow');
        }
    }

    public function deleteSelected()
    {
        Post::destroy($this->selected);
        $this->selected = [];
        $this->count_checkbox = 0;
    }

    public function hiddenSelected()
    {
        Post::whereIn('id', $this->selected)->update(['status' => 'hide']);
        $this->selected = [];
        $this->count_checkbox = 0;

    }

    public function showSelected()
    {
        Post::whereIn('id', $this->selected)->update(['status' => 'show']);
        $this->selected = [];
        $this->count_checkbox = 0;
    }


    public function render()
    {
        // Lấy ra danh sách danh mục bài viết
        $this->catpost = CatPost::all();

        // Tìm kiếm và sắp xếp
        $posts = Post::query()
            // Tìm kiếm theo tiêu đề nếu có
            ->when($this->search, function ($query) {
                return $query->where('title', 'like', '%' . $this->search . '%');
            })
            // Tìm kiếm theo danh mục bài viết nếu có
            ->when($this->catpost_id, function ($query) {
                return $query->where('catpost_id', $this->catpost_id);
            })
            // Sắp xếp theo độ dài và từ điển nếu có
            ->orderByRaw('LENGTH(' . $this->sortField . ') ' . $this->sortAsc)
            ->orderBy($this->sortField, $this->sortAsc)  // Sắp xếp theo trường chính
            ->paginate(10); // Phân trang

        return view('livewire.post-pagination', [
            'posts' => $posts,
        ]);
    }

    public function sortBy($field)
    {
        // Nếu đang sắp xếp theo cùng một trường thì đảo chiều sắp xếp
        if ($this->sortField === $field) {
            $this->sortAsc = $this->sortAsc === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortAsc = 'asc'; // Mặc định khi chuyển sang trường mới thì sắp xếp theo chiều tăng dần
        }    

        $this->sortField = $field; // Cập nhật trường sắp xếp
    }

    public function toggleSelectAll()
    {
        $this->selectAll = !$this->selectAll;

        if ($this->selectAll) {
            $this->selected = Post::pluck('id')->toArray();
        } else {
            $this->selected = [];
        }

        $this->count_checkbox = count($this->selected);
    }


}
