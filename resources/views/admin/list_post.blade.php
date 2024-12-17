@extends('layouts.dashboard')

@section('content')
    {{-- Làm giao diện bài viết
        - Hiển thị danh sách bài viết
        - Có nút thêm bài viết
        - Có nút xóa bài viết
        - Có nút sửa bài viết
        - nút tìm kiếm bài viết
        - nút xoá nhiều bài viết
        - núi ẩn nhiều bài viết
        - nủt ẩn bài viết
        - sort theo tên bài viết/ngày tạo tăng/giảm
    --}}

  

    @include('component.admin.table_list_post')

    
    
@endsection