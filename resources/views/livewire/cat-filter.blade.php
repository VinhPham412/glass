<div class="container mx-auto  py-2">
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Sidebar Filters -->
        @include('partials.cat-filter.sidebar_filter')

        <!-- Main Content -->
        <main class="w-full md:w-3/4">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Sản phẩm mới</h2>
                <!-- Sort Dropdown -->
                <div class="relative inline-block">
                    <button id="sortButton" data-dropdown-toggle="sortDropdown"
                            class="bg-gradient-to-br from-gray-200 to-gray-400 px-4 py-2 rounded-lg shadow hover:shadow-lg transition-shadow">
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
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
                @foreach($products as $product)
                    @include('partials.cat-filter.list_product',$product)
                @endforeach
            </div>
        </main>
    </div>
</div>
