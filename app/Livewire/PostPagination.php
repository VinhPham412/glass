<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostPagination extends Component
{
    use WithPagination;

    public $search = ''; // Từ khóa tìm kiếm
    public $sortField = 'updated_at'; // Trường sắp xếp mặc định
    public $sortAsc = 'desc'; // Hướng sắp xếp mặc định (tăng dần)
    public $count_checkbox = 0; // Số lượng checkbox được chọn
    public $selected = []; // Mảng chứa id của các bài viết được chọn
    public $selectAll = false; // Trạng thái chọn tất cả

    // Khi input search thay đổi tôi muốn render lại trang
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatedSelected()
    {
        $this->count_checkbox = count($this->selected);
    }

    public function render()
    {
        // Tìm kiếm và sắp xếp
        $posts = Post::query()
            // Tìm kiếm theo tiêu đề nếu có
            ->when($this->search, function ($query) {
                return $query->where('title', 'like', '%' . $this->search . '%');
            })
            // Sắp xếp theo độ dài và từ điển nếu có
            ->orderByRaw('LENGTH(' . $this->sortField . ') ' . $this->sortAsc)
            ->orderBy($this->sortField, $this->sortAsc)  // Sắp xếp theo trường chính
            ->paginate(10); // Phân trang

        return view('livewire.post-pagination', [
            'posts' => $posts
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

    public function deleteSelected()
    {
        Post::destroy($this->selected);

        $this->selected = [];
        $this->count_checkbox = 0;
        $this->selectAll = false;
    }

    public function showSelected()
    {
        // Thuộc tính post->status set thành show 
        Post::whereIn('id', $this->selected)->update(['status' => 'show']);

        $this->selected = [];
        $this->count_checkbox = 0;
        $this->selectAll = false;
    }

    public function hiddenSelected()
    {
        // Thuộc tính post->status set thành hidden
        Post::whereIn('id', $this->selected)->update(['status' => 'hidden']);
        
        $this->selected = [];
        $this->count_checkbox = 0;
        $this->selectAll = false;
    }

}
