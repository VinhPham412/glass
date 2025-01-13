@php
    $product_image = $product->versions->flatMap->images->first()->link ?? null;
    $product_image_url = $product_image ? env('APP_URL').'/storage/'.$product_image : 'https://robohash.org/empty';
@endphp

<div class="bg-white dark:bg-gray-900 text-gray-800 dark:text-white shadow-lg rounded-xl p-5 hover:shadow-xl transition-shadow max-w-sm space-y-4">
    <!-- Product Image -->
    <a href="#" class="block">
        <div class="h-48 bg-gray-200 dark:bg-gray-700 rounded-lg flex justify-center items-center overflow-hidden">
            <img src="{{ $product_image_url }}" alt="Product Image" class="h-full w-auto">
        </div>
    </a>

    <!-- Discount Tag -->
    @php
        $promotions = $product->cats()
            ->with('promotion')
            ->get()
            ->pluck('promotion')
            ->filter() // Loại bỏ các giá trị null
            ->pluck('name') // Lấy cột name sau khi đã loại bỏ null
            ->unique();
    @endphp
    @if($promotions->isNotEmpty())
        <div class="flex flex-wrap gap-2">
            @foreach($promotions as $promotion)
                <span class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-lg">
                {{ $promotion }}
            </span>
            @endforeach
        </div>
    @endif

    <!-- Product Title -->
    <h3 class="font-semibold text-lg">
        <a href="#" class="text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">
            {{ $product->name }}
        </a>
    </h3>

    <!-- Additional Info -->
    <div class="text-sm text-gray-500 dark:text-gray-400 space-y-2">
        @if ($product->cats->isNotEmpty())
            <div>
                Danh mục:
                <span class="font-medium">
                    {{ $product->cats->first()->name }}
                </span>
            </div>
        @endif

        @if (!empty($product->brand->name))
            <div>
                Thương hiệu:
                <span class="font-medium">
                    {{ $product->brand->name }}
                </span>
            </div>
        @endif
    </div>

    <!-- Price and Actions -->
    <div class="space-y-4">
        <p class="text-2xl font-bold text-center text-blue-600">
            39.500.000₫
        </p>
        <div class="flex justify-center">
            <button class="bg-blue-600 text-white font-medium px-6 py-2 rounded-lg hover:bg-blue-700 transition w-full max-w-[200px]">
                Thêm vào giỏ
            </button>
        </div>
    </div>
</div>
