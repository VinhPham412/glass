<button
        data-drawer-target="drawer-example"
        data-drawer-show="drawer-example"
        aria-controls="drawer-example"
        class="md:hidden px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:outline-none transition">
    Ẩn/Hiện lọc
</button>

<aside
        {{--        id="drawer-example"--}}
        {{--       class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800"--}}
        class="w-full md:w-1/4 p-6 rounded-lg shadow-md bg-white dark:bg-gray-900"
>
    <div class="flex justify-between items-center mb-6">
        <h2
                class="text-lg font-semibold text-gray-800 dark:text-white cursor-pointer">Bộ lọc</h2>
        <button wire:click="clearFilter()"
                id="clearFilters" class="text-sm text-red-500 hover:underline">
            Xóa tất cả
        </button>
    </div>

    <!-- Search -->
    <div class="mb-6">
        <label for="search" class="block text-sm font-medium mb-3 text-gray-700 dark:text-gray-300">Tìm kiếm sản
            phẩm</label>
        <input wire:model.live.debounce.300ms="search"
               type="text" id="search" placeholder="Nhập tên sản phẩm..."
               class="w-full border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-600 dark:text-white shadow-sm">
    </div>

    <!-- Filter Sections -->
    <div class="space-y-6 grid grid-cols-2">
        <!-- Categories -->
        <div>
            <h3 class="font-medium text-gray-800 dark:text-white mb-3">Danh mục</h3>
            <ul class="space-y-3">
                @foreach($list_cats as $cat)
                    <li><label class="flex items-center space-x-2">
                            <input type="checkbox" wire:model.live="cat_selected" value="{{ $cat }}"
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
        <div class="col-span-2"
             x-data="{ price: @entangle('selected_price').live, min: @entangle('min_price'), max: @entangle('max_price')}">
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
                        :style="{ left: `calc(${(price - min) / (max - min) * 100}% - 20px)` }"
                        x-text="`${parseInt(price).toLocaleString()}₫`"
                ></span>
            </div>
            <div class="flex justify-between text-sm mt-2">
                <span x-text="`${parseInt(min).toLocaleString()}₫`" class="text-gray-700 dark:text-gray-300"></span>
                <span x-text="`${parseInt(max).toLocaleString()}₫`" class="text-gray-700 dark:text-gray-300"></span>
            </div>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Khoảng giá: <span
                        x-text="`${parseInt(min).toLocaleString()}₫ - ${parseInt(price).toLocaleString()}₫`"></span>
            </p>
        </div>

        <!-- Colors -->
        <div>
            <h3 class="font-medium text-gray-800 dark:text-white mb-3">Màu sắc</h3>
            <ul class="space-y-3">
                @foreach($list_colors as $color)
                    <li><label class="flex items-center space-x-2">
                            <input type="checkbox" wire:model.live="list_colors_selected" value="{{ $color }}"
                                   class="form-checkbox rounded text-gray-600 focus:ring-gray-500 dark:focus:ring-gray-400">
                            <span>
                            {{ $color }}
                        </span>
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3 class="font-medium text-gray-800 dark:text-white mb-3">Kích thước</h3>
            <ul class="space-y-3">
                @foreach($list_sizes as $size)
                    <li><label class="flex items-center space-x-2">
                            <input type="checkbox" wire:model.live="list_sizes_selected" value="{{ $size }}"
                                   class="form-checkbox rounded text-gray-600 focus:ring-gray-500 dark:focus:ring-gray-400">
                            <span>
                            {{ $size }}
                        </span>
                        </label>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Additional Filters -->
        <div>
            <h3 class="font-medium text-gray-800 dark:text-white mb-3">Thương hiệu</h3>
            <ul class="space-y-3">
                @foreach($list_brands as  $brand)
                    <li><label class="flex items-center space-x-2">
                            <input type="checkbox" wire:model.live="list_brands_selected" value="{{ $brand }}"
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
                @foreach($list_materials as  $material)
                    <li><label class="flex items-center space-x-2">
                            <input type="checkbox" wire:model.live="list_materials_selected" value="{{ $material }}"
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
                @foreach($list_origins as  $origin)
                    <li><label class="flex items-center space-x-2">
                            <input type="checkbox" wire:model.live="list_origins_selected" value="{{ $origin }}"
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
                @foreach($list_shapes as  $shape)
                    <li><label class="flex items-center space-x-2">
                            <input type="checkbox" wire:model.live="list_shapes_selected" value="{{ $shape }}"
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
                @foreach($list_styles as  $style)
                    <li><label class="flex items-center space-x-2">
                            <input type="checkbox" wire:model.live="list_styles_selected" value="{{ $style }}"
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


