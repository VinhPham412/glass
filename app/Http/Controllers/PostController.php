<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Truyền bài viết vào view (Livewire sẽ xử lý phân trang)
        return view('admin.list_post');
    }

    public function create()
    {
        return view('admin.create_post');
    }

    public function store(Request $request)
    {

    }
}
