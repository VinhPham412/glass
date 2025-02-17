<div class="max-w-7xl mx-auto">
    <div class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white p-4 sm:p-6">
        <div class="container mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Product Images -->
            <div class="space-y-4">
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-4 flex justify-center items-center">
                    <img id="mainImage" src="{{config('app.asset_url')}}/storage/{{$product->getFirstImage()}}"
                         alt="Sản phẩm"
                         class="w-full h-auto max-h-96 object-contain rounded-lg">
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const mainImage = document.getElementById('mainImage');
                        const thumbnails = document.querySelectorAll('.thumbnail-image');

                        thumbnails.forEach(thumbnail => {
                            thumbnail.addEventListener('click', function () {
                                const newSrc = this.getAttribute('data-src');
                                mainImage.src = newSrc;
                            });
                        });
                    });
                </script>
                <div class="flex overflow-x-auto space-x-4 pb-2 scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200">
                    @foreach($product->versions as $version)
                        @foreach($version->images as $image)
                            <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-2 hover:shadow-md transition flex-shrink-0">
                                <img src="{{config('app.asset_url')}}/storage/{{$image->link}}"
                                     alt="Thumbnail"
                                     class="w-20 h-20 sm:w-24 sm:h-24 object-cover rounded-lg thumbnail-image cursor-pointer"
                                     data-src="{{config('app.asset_url')}}/storage/{{$image->link}}">
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

            <!-- Product Details -->
            <div class="space-y-4">
                <div class="mb-4">
                    <span class="bg-green-500 text-white text-sm px-3 py-1 rounded-full">Còn hàng</span>
                    @if(!empty($product->try_on))
                        <a href="{{route('shop.try_on',$product->id)}}" target="_blank"
                           class="bg-red-500 text-white text-sm px-3 py-1 rounded-full cursor-pointer">Thử kính</a>
                    @endif
                </div>

                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-4">
                    {{ $product->name }}
                </h1>
                <p class="text-lg sm:text-xl lg:text-2xl font-bold mb-4">
                    @if($product->versions->min('price') == $product->versions->max('price'))
                        {{ number_format($product->versions->min('price'),0,',','.') }}đ
                    @else
                        Từ {{ number_format($product->versions->min('price'),0,',','.') }}đ
                        đến {{ number_format($product->versions->max('price'),0,',','.') }}đ
                    @endif
                </p>

                @if($list_colors_selected!='' and $list_sizes_selected!='')
                    <div class="flex flex-wrap gap-4 mb-6">
                        <button type="button"
                                data-drawer-target="drawer-cart" data-drawer-show="drawer-cart"
                                aria-controls="drawer-cart"
                                data-drawer-placement="right" data-drawer-backdrop="false"
                                data-drawer-body-scrolling="true"
                                wire:click="add_to_cart('{{$product->versions->where('color', $list_colors_selected)->where('size', $list_sizes_selected)->first()->id}}')"
                                class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-lg flex items-center space-x-2">
                            <i class="fas fa-shopping-cart"></i>
                            <span>
                            Thêm vào giỏ
                        </span>
                            <div class="hidden" wire:loading wire:target="add_to_cart">
                                <div role="status">
                                    <svg aria-hidden="true"
                                         class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                         viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                              fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                              fill="currentFill"/>
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </button>
                        <div class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                            <span class="font-medium">Chỉ còn lại:</span>
                            {{ $product->versions
                                ->where('color', $list_colors_selected)
                                ->where('size', $list_sizes_selected)->first()
                                 ?$product->versions
                                ->where('color', $list_colors_selected)
                                ->where('size', $list_sizes_selected)->first()->stock
                                : null
                            }}
                            sản phẩm
                        </div>
                    </div>
                @endif

                <!-- Color Options -->
                <div>
                    <h3 class="text-lg font-medium mb-2">Màu sắc</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($list_colors as $color)
                            <button
                                    wire:model.live="list_colors_selected" value="{{ $color }}"
                                    wire:click="change_color('{{$color}}')"
                                    class="
                                    px-4 py-2 rounded-lg  dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-900 dark:text-white flex items-center space-x-2
                                    @if($list_colors_selected!= '' && $list_colors_selected== $color)
                                        bg-blue-500
                                    @else
                                        bg-gray-200
                                    @endif
                                    ">
                                <img src="{{
                                        $product->versions->where('color', $color)->first()->images->first()->link
                                            ? config('app.asset_url')."/storage/".$product->versions->where('color', $color)->first()->images->first()->link
                                            : 'https://robohash.org/anh_rong' }}"
                                     alt="Đỏ" class="w-6 h-6 rounded-full">
                                <span>{{$color}}</span>
                            </button>
                        @endforeach
                    </div>
                </div>

                <!-- Size Options -->
                <div>
                    <h3 class="text-lg font-medium mb-2">Kích thước</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($list_sizes as $size)
                            <button
                                    wire:model.live="list_sizes_selected" value="{{ $size }}"
                                    wire:click="change_size('{{$size}}')"
                                    class="
                                    px-4 py-2 rounded-lg  dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-900 dark:text-white
                                    @if($list_sizes_selected!= '' && $list_sizes_selected== $size)
                                        bg-blue-500
                                    @else
                                        bg-gray-200
                                    @endif
                                    ">
                                {{ $size }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- Product Description -->
    <div class="mt-2 bg-gray-50 dark:bg-gray-800 rounded-lg shadow-md p-3">
        <h2 class="text-2xl font-bold mb-4 text-gray-800 dark:text-white">Mô tả sản phẩm</h2>
        <div class="prose prose-lg max-w-none text-gray-600 dark:text-gray-300">
            <p>
                {!! $product->description !!}
            </p>

        </div>
    </div>


</div>
