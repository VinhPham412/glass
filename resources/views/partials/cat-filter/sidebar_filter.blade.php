<aside class="w-full md:w-1/4 p-6 rounded-lg shadow-md bg-white dark:bg-gray-900">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Bộ lọc</h2>
        <button id="clearFilters" class="text-sm text-red-500 hover:underline">Xóa tất cả</button>
    </div>

    <!-- Search -->
    <div class="mb-6">
        <label for="search" class="block text-sm font-medium mb-3 text-gray-700 dark:text-gray-300">Tìm kiếm sản
            phẩm</label>
        <input type="text" id="search" placeholder="Nhập tên sản phẩm..."
               class="w-full border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-600 dark:text-white shadow-sm">
    </div>

    <!-- Filter Sections -->
    <div class="space-y-6">
        <!-- Categories -->
        <div>
            <h3 class="font-medium text-gray-800 dark:text-white mb-3">Danh mục</h3>
            <ul class="space-y-3">
                @foreach($list_cats as $cat)
                    <li><label class="flex items-center space-x-2">
                            <input type="checkbox"
                                   class="form-checkbox rounded text-gray-600 focus:ring-gray-500 dark:focus:ring-gray-400">
                            <span>
                            {{ $cat }}
                        </span>
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Price Range -->
        <div x-data="{ price: 0, min: {{ $min_price  }}, max: {{ $max_price  }} }">
            <h3 class="font-medium text-gray-800 dark:text-white mb-3">Khoảng giá</h3>
            <div class="relative">
                <input
                        type="range"
                        x-model="price"
                        :min="min"
                        :max="max"
                        class="w-full focus:outline-none focus:ring-2 focus:ring-gray-500"
                />
                <span
                        class="absolute top-0 left-0 transform -translate-y-5 text-sm text-gray-700 dark:text-gray-300"
                        :style="{ left: `calc(${(price / max) * 100}% - 20px)` }"
                        x-text="`${price}₫`"
                ></span>
            </div>
            <div class="flex justify-between text-sm mt-2">
                <span x-text="`${min}₫`" class="text-gray-700 dark:text-gray-300"></span>
                <span x-text="`${max}₫`" class="text-gray-700 dark:text-gray-300"></span>
            </div>
        </div>

        <!-- Colors -->
        <div>
            <h3 class="font-medium text-gray-800 dark:text-white mb-3">Màu sắc</h3>
            <div class="grid grid-cols-2 gap-3">
                <label class="flex items-center space-x-2"><input type="checkbox"
                                                                  class="form-checkbox rounded text-gray-600 focus:ring-gray-500 dark:focus:ring-gray-400"><span>Đỏ</span></label>
                <label class="flex items-center space-x-2"><input type="checkbox"
                                                                  class="form-checkbox rounded text-gray-600 focus:ring-gray-500 dark:focus:ring-gray-400"><span>Xanh</span></label>
                <label class="flex items-center space-x-2"><input type="checkbox"
                                                                  class="form-checkbox rounded text-gray-600 focus:ring-gray-500 dark:focus:ring-gray-400"><span>Vàng</span></label>
                <label class="flex items-center space-x-2"><input type="checkbox"
                                                                  class="form-checkbox rounded text-gray-600 focus:ring-gray-500 dark:focus:ring-gray-400"><span>Tím</span></label>
            </div>
        </div>

        <!-- Additional Filters -->
        <div>
            <h3 class="font-medium text-gray-800 dark:text-white mb-3">Thương hiệu</h3>
            <ul class="space-y-3">
                @foreach($list_brands as $brand)
                    <li><label class="flex items-center space-x-2">
                            <input type="checkbox"
                                   class="form-checkbox rounded text-gray-600 focus:ring-gray-500 dark:focus:ring-gray-400">
                            <span>
                            {{ $brand }}
                        </span>
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3 class="font-medium text-gray-800 dark:text-white mb-3">Chất liệu</h3>
            <ul class="space-y-3">
                @foreach($list_materials as $material)
                    <li><label class="flex items-center space-x-2">
                            <input type="checkbox"
                                   class="form-checkbox rounded text-gray-600 focus:ring-gray-500 dark:focus:ring-gray-400">
                            <span>
                            {{ $material }}
                        </span>
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3 class="font-medium text-gray-800 dark:text-white mb-3">Xuất xứ</h3>
            <ul class="space-y-3">
                @foreach($list_origins as $origin)
                    <li><label class="flex items-center space-x-2">
                            <input type="checkbox"
                                   class="form-checkbox rounded text-gray-600 focus:ring-gray-500 dark:focus:ring-gray-400">
                            <span>
                            {{ $origin }}
                        </span>
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3 class="font-medium text-gray-800 dark:text-white mb-3">Kiểu dáng</h3>
            <ul class="space-y-3">
                @foreach($list_shapes as $shape)
                    <li><label class="flex items-center space-x-2">
                            <input type="checkbox"
                                   class="form-checkbox rounded text-gray-600 focus:ring-gray-500 dark:focus:ring-gray-400">
                            <span>
                            {{ $shape }}
                        </span>
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3 class="font-medium text-gray-800 dark:text-white mb-3">Phong cách</h3>
            <ul class="space-y-3">
                @foreach($list_styles as $style)
                    <li><label class="flex items-center space-x-2">
                            <input type="checkbox"
                                   class="form-checkbox rounded text-gray-600 focus:ring-gray-500 dark:focus:ring-gray-400">
                            <span>
                            {{ $style }}
                        </span>
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</aside>
