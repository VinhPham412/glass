<div class="container mx-auto  py-2">
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Sidebar Filters -->
        <aside class="w-full md:w-1/4  p-6 rounded-lg shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-semibold text-gray-800">Bộ lọc</h2>
                <button id="clearFilters" class="text-sm text-red-500 hover:underline">Xóa tất cả</button>
            </div>
            <!-- Search -->
            <div class="mb-6">
                <label for="search" class="block text-sm font-medium mb-3 text-gray-700">Tìm kiếm sản phẩm</label>
                <input type="text" id="search" placeholder="Nhập tên sản phẩm..." class="w-full border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-600 shadow-sm">
            </div>
            <!-- Categories -->
            <div class="mb-6">
                <h3 class="font-medium text-gray-800 mb-3">Danh mục</h3>
                <ul class="space-y-3">
                    <li>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="form-checkbox rounded text-gray-600 focus:ring-gray-500">
                            <span>Túi xách</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="form-checkbox rounded text-gray-600 focus:ring-gray-500">
                            <span>Ba lô</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="form-checkbox rounded text-gray-600 focus:ring-gray-500">
                            <span>Túi du lịch</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="form-checkbox rounded text-gray-600 focus:ring-gray-500">
                            <span>Túi đeo hông</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="form-checkbox rounded text-gray-600 focus:ring-gray-500">
                            <span>Túi đựng laptop</span>
                        </label>
                    </li>
                </ul>
            </div>
            <!-- Price Range -->
            <div class="mb-6">
                <h3 class="font-medium text-gray-800 mb-3">Khoảng giá</h3>
                <input type="range" id="priceRange" class="w-full focus:outline-none focus:ring-2 focus:ring-gray-500">
                <div class="flex justify-between text-sm mt-2">
                    <span id="priceMin" class="text-gray-700">0₫</span>
                    <span id="priceMax" class="text-gray-700">1000₫</span>
                </div>
            </div>
            <!-- Colors -->
            <div class="mb-6">
                <h3 class="font-medium text-gray-800 mb-3">Màu sắc</h3>
                <div class="grid grid-cols-2 gap-3">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" class="form-checkbox rounded text-gray-600 focus:ring-gray-500">
                        <span>Đỏ</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" class="form-checkbox rounded text-gray-600 focus:ring-gray-500">
                        <span>Xanh</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" class="form-checkbox rounded text-gray-600 focus:ring-gray-500">
                        <span>Vàng</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" class="form-checkbox rounded text-gray-600 focus:ring-gray-500">
                        <span>Tím</span>
                    </label>
                </div>
            </div>
            <!-- Size -->
            <div class="mb-6">
                <h3 class="font-medium text-gray-800 mb-3">Kích thước</h3>
                <ul class="space-y-3">
                    <li>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="form-checkbox rounded text-gray-600 focus:ring-gray-500">
                            <span>Nhỏ</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="form-checkbox rounded text-gray-600 focus:ring-gray-500">
                            <span>Vừa</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="form-checkbox rounded text-gray-600 focus:ring-gray-500">
                            <span>Lớn</span>
                        </label>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="w-full md:w-3/4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Sản phẩm mới</h2>
                <!-- Sort Dropdown -->
                <div class="relative inline-block">
                    <button id="sortButton" data-dropdown-toggle="sortDropdown" class="bg-gradient-to-br from-gray-200 to-gray-400 px-4 py-2 rounded-lg shadow hover:shadow-lg transition-shadow">
                        Sắp xếp
                    </button>
                    <div id="sortDropdown" class="hidden z-10 bg-white divide-y divide-gray-200 rounded shadow-lg w-44">
                        <ul class="py-2 text-sm text-gray-700">
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Giá: Thấp đến Cao</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Giá: Cao đến Thấp</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Tên: A-Z</a></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Tên: Z-A</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow">
                    <div class="h-40 bg-gray-300 rounded-lg"></div>
                    <h3 class="mt-4 text-gray-800 font-medium">Sản phẩm 1</h3>
                    <p class="text-gray-500 mt-1">500₫</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow">
                    <div class="h-40 bg-gray-300 rounded-lg"></div>
                    <h3 class="mt-4 text-gray-800 font-medium">Sản phẩm 2</h3>
                    <p class="text-gray-500 mt-1">750₫</p>
                </div>
                <!-- Add more product cards -->
            </div>
        </main>
    </div>
</div>
