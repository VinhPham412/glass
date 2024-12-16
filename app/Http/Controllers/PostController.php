<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Cứ 10 bài viết sẽ phân trang
        $posts = Post::all();

        return view('admin.list_post', compact('posts'));
    }

    public function create()
    {
        return view('admin.create_post');
    }

    public function store(Request $request)
    {

    }
}
