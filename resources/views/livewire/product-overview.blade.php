<div class="max-w-7xl mx-auto">
    <div class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white p-4 sm:p-6">
        <div class="container mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Product Images -->
            <div class="space-y-4">
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-4 flex justify-center items-center">
                    <img id="mainImage" src="{{ Storage::url($product->getFirstImage())}}"
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
                                <img src="{{Storage::url($image->link)}}"
                                     alt="Thumbnail"
                                     class="w-20 h-20 sm:w-24 sm:h-24 object-cover rounded-lg thumbnail-image cursor-pointer"
                                     data-src="{{Storage::url($image->link)}}">
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

            <!-- Product Details -->
            <div class="space-y-4">
                <div class="mb-4">
                    <span class="bg-green-500 text-white text-sm px-3 py-1 rounded-full">Còn hàng</span>
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

                <div class="
                        flex flex-wrap gap-4 mb-6
                        @if($list_colors_selected=='' or $list_sizes_selected=='') hidden @endif
                        ">
                    <button class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-lg flex items-center space-x-2">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Thêm vào giỏ</span>
                    </button>
                    <div class="flex items-center">
                        <label for="quantity" class="mr-2">Số lượng</label>
                        <input type="number" id="quantity"
                               class="w-16 bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white rounded-lg px-2 py-1"
                               min="1" value="1">
                    </div>
                </div>

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
                                            ? Storage::url($product->versions->where('color', $color)->first()->images->first()->link)
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
                iMac 24" là một máy tính all-in-one mạnh mẽ và đẹp mắt từ Apple. Với chip Apple M1, RAM 8GB và
                SSD
                256GB,
                máy này mang lại hiệu suất ấn tượng cho mọi tác vụ từ công việc văn phòng đến chỉnh sửa ảnh và
                video.
            </p>
            <ul class="list-disc pl-5 mt-4">
                <li>Màn hình Retina 4.5K 24 inch sống động</li>
                <li>Chip Apple M1 với CPU 8 lõi và GPU 7 lõi</li>
                <li>8GB RAM thống nhất</li>
                <li>SSD 256GB siêu nhanh</li>
                <li>Camera FaceTime HD 1080p với ISP của M1</li>
                <li>Hệ thống âm thanh sáu loa với woofer force-cancelling</li>
                <li>Màu sắc tươi sáng và thiết kế mỏng ấn tượng</li>
            </ul>
            <p class="mt-4">
                Với macOS mới nhất, iMac 24" mang đến trải nghiệm máy tính liền mạch và hiệu quả,
                phù hợp cho cả công việc sáng tạo và giải trí hàng ngày.
            </p>
        </div>
    </div>


</div>
