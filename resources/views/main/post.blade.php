@extends('layouts.shop')

@section('content')
    @php
        $post = App\Models\Post::find($post_id);
    @endphp

    <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
        <!-- Card Container -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
            <!-- Post Thumbnail -->
            <div class="relative">
                <img src="{{ asset(Storage::url($post->thumbnail)) }}" alt="post image" class="w-full h-full object-cover object-center transition-transform duration-300 transform ">
                <div class="absolute inset-0 bg-gradient-to-t from-black opacity-40"></div>
            </div>

            <!-- Content Wrapper -->
            <div class="p-6">
                <!-- Title -->
                <div class="text-3xl font-semibold text-gray-900 mb-4 hover:text-primary transition-colors duration-300">
                    {{$post->title}}
                </div>

                <!-- Author -->
                <div class="text-lg text-gray-700 mb-6">
                    <span class="font-medium text-gray-900">Tác giả:</span> {{$post->user->name}}
                </div>

                <!-- Post Content -->
                <div class="prose prose-lg text-gray-800 leading-relaxed space-y-4">
                    {!! $post->content !!}
                </div>

                <!-- Action Section (Optional) -->
                <div class="mt-6 flex items-center justify-between">

                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-gray-600">Đã đăng: {{$post->created_at->diffForHumans()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
