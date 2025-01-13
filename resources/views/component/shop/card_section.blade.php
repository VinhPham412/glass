@php
    // Lấy ra 3 sản phẩm mới nhất trong shop
   $products = \App\Models\Product::orderBy('created_at', 'desc')->limit(3)->get();

@endphp

        <!-- Card Blog -->
<div class="max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($products as $product)
            <!-- Card -->
            <div class="group flex flex-col h-full bg-white border border-gray-200 shadow-md rounded-xl dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70 transition-transform duration-300 hover:shadow-lg hover:scale-105">
                <div class="relative w-full h-56 bg-gradient-to-r from-blue-500 to-blue-700 rounded-t-xl">
                    <div class="relative w-full h-full overflow-hidden rounded-t-xl">
                        <img class="w-full h-full object-cover transform transition-transform duration-300 hover:scale-110"
                             src="{{ $product->versions->isNotEmpty() && $product->versions->first()->images->isNotEmpty() ? env('ASSET_URL').'/storage/'.$product->versions->first()->images->first()->link : 'https://robohash.org/anh_rong' }}"
                             alt="Product Image">
                    </div>
                </div>
                <div class="p-4 md:p-6">
                    <span class="block mb-2 text-sm font-medium uppercase text-blue-600 dark:text-blue-500">
                        Chất liệu: {{ $product->material->name }}
                    </span>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-300 dark:hover:text-white">
                        {{ $product->name }}
                    </h3>
                    <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">
                        {{ $product->brand->name }}
                    </p>
                </div>
                <div class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:border-neutral-700 dark:divide-neutral-700">
                    <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium bg-blue-500 text-white rounded-bl-xl hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                       href="#">
                        Thêm vào giỏ
                    </a>
                    <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium bg-gray-100 text-gray-800 rounded-br-xl hover:bg-gray-200 focus:outline-none focus:ring focus:ring-gray-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:ring-neutral-600"
                       href="#">
                        Mua ngay
                    </a>
                </div>
            </div>
            <!-- End Card -->
        @empty
            <p class="text-center text-gray-500 dark:text-neutral-400">Không có sản phẩm nào mới.</p>
        @endforelse

    </div>
    <!-- End Grid -->
</div>
<!-- End Card Blog -->
