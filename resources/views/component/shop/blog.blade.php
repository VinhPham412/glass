@php
    $posts= \App\Models\Post::orderBy('created_at','desc')->limit(2)->get();
@endphp

        <!-- Blog Bài Viết -->
<div class="max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Tiêu đề -->
    <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Bài Viết Nổi Bật</h2>
        <p class="mt-1 text-gray-600 dark:text-neutral-400">Khám phá xu hướng thời trang và kinh nghiệm mua sắm từ
            Glass.com.</p>
    </div>
    <!-- Kết thúc Tiêu đề -->

    <!-- Lưới -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post)
            <!-- Thẻ -->
            <a class="group flex flex-col focus:outline-none" href="{{route('shop.post',$post->id)}}">
                <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
                    <img class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out rounded-xl"
                         src="{{config('app.asset_url')}}/storage/{{$post->thumbnail}}"
                         alt="Hình ảnh Blog">
                </div>

                <div class="mt-7">
                    <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
                        {{ $post->title }}
                    </h3>
                    <p class="mt-3 text-gray-800 dark:text-neutral-200">
                        {{ Str::limit(strip_tags($post->content), 20, '...') }}
                    </p>
                    <p class="mt-5 inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 group-hover:underline group-focus:underline font-medium dark:text-blue-500">
                        Xem chi tiết
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"/>
                        </svg>
                    </p>
                </div>
            </a>
            <!-- Kết thúc Thẻ -->
        @endforeach
        <!-- Thẻ -->
        <a class="group relative flex flex-col w-full min-h-60 bg-[url('https://images.unsplash.com/photo-1634017839464-5c339ebe3cb4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80')] bg-center bg-cover rounded-xl hover:shadow-lg focus:outline-none focus:shadow-lg transition"
           href="#">
            <div class="flex-auto p-4 md:p-6">
                <h3 class="text-xl text-white/90 group-hover:text-white"><span class="font-bold">Glass.com</span>
                    Khám phá các bài viết khác
                </h3>
            </div>
            <div class="pt-0 p-4 md:p-6">
                <div class="inline-flex items-center gap-2 text-sm font-medium text-white group-hover:text-white/70 group-focus:text-white/70">
                    Khám phá ngay
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"/>
                    </svg>
                </div>
            </div>
        </a>
        <!-- Kết thúc Thẻ -->
    </div>
    <!-- Kết thúc Lưới -->
</div>
<!-- Kết thúc Blog Bài Viết -->
