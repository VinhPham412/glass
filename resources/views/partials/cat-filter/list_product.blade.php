@php
    $product_image = $product->versions->flatMap->images->first()->link ?? null;
    $product_image_url = $product_image ? env('APP_URL').'/storage/'.$product_image : 'https://robohash.org/empty';

    $promotions = $product->cats()
        ->with('promotion')
        ->get()
        ->pluck('promotion')
        ->filter()
        ->pluck('name')
        ->unique();

    $prices = $product->versions->pluck('price')->unique()->sort();
    $priceDisplay = $prices->count() == 1
        ? number_format($prices->first(), 0, ',', '.')
        : number_format($prices->first(), 0, ',', '.') . ' - ' . number_format($prices->last(), 0, ',', '.');
@endphp

<div class="relative bg-white dark:bg-gray-900 text-gray-800 dark:text-white shadow-lg rounded-xl p-4 hover:shadow-xl transition-shadow max-w-sm">
    <!-- Product Image with Overlay -->
    <div class="relative">
        <a href="{{route('shop.product_overview',$product->id)}}" class="block">
            <div class="h-48 bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden">
                <img src="{{ $product_image_url }}" alt="Product Image" class="h-full w-auto mx-auto">
            </div>
        </a>

        <!-- Overlay Content -->
        <div class="absolute top-2 left-2 right-2 space-y-2 z-2">
            <!-- Discount Tags -->
            @if($promotions->isNotEmpty())
                <div class="flex flex-wrap gap-2">
                    @foreach($promotions as $promotion)
                        <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-lg">
                            {{ $promotion }}
                        </span>
                    @endforeach
                </div>
            @endif

            <!-- Product Info -->
            <div class="text-sm bg-gray-800 bg-opacity-75 text-white rounded-lg p-2">
                @if ($product->cats->isNotEmpty())
                    <div>Danh mục: <span class="font-medium">{{ $product->cats->first()->name }}</span></div>
                @endif
                @if (!empty($product->brand->name))
                    <div>Thương hiệu: <span class="font-medium">{{ $product->brand->name }}</span></div>
                @endif
            </div>
        </div>
    </div>

    <!-- Product Title -->
    <h3 class="font-semibold text-lg mt-4 text-center">
        <a href="#" class="text-gray-800 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">
            {{ $product->name }}
        </a>
    </h3>

    <!-- Price and Actions -->
    <div class="mt-2 text-center space-y-4">
        <p class="text-2xl font-bold text-blue-600">
            {{ $priceDisplay }} VND
        </p>
        <button class="bg-blue-600 text-white font-medium px-6 py-2 rounded-lg hover:bg-blue-700 transition w-full max-w-[200px]">
            Thêm vào giỏ
        </button>
    </div>
</div>
