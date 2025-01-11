<div class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white min-h-screen p-6">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Product Images -->
        <div class="space-y-4 col-span-1">
            <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-4 flex justify-center items-center">
                <img src="https://img.game8.co/4072976/7b55a4cd3491e4230ee7ee13b1a1aa81.png/show" alt="Sản phẩm"
                     class="rounded-lg">
            </div>
            <div class="flex space-x-4">
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-2 hover:shadow-md transition">
                    <img src="https://img.game8.co/4072976/7b55a4cd3491e4230ee7ee13b1a1aa81.png/show" alt="Thumbnail 1"
                         class="rounded-lg">
                </div>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-2 hover:shadow-md transition">
                    <img src="https://img.game8.co/4072976/7b55a4cd3491e4230ee7ee13b1a1aa81.png/show" alt="Thumbnail 2"
                         class="rounded-lg">
                </div>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-2 hover:shadow-md transition">
                    <img src="https://img.game8.co/4072976/7b55a4cd3491e4230ee7ee13b1a1aa81.png/show" alt="Thumbnail 3"
                         class="rounded-lg">
                </div>
                <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-2 hover:shadow-md transition">
                    <img src="https://img.game8.co/4072976/7b55a4cd3491e4230ee7ee13b1a1aa81.png/show" alt="Thumbnail 4"
                         class="rounded-lg">
                </div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="space-y-4 col-span-1">
            <div class="mb-4">
                <span class="bg-green-500 text-white text-sm px-3 py-1 rounded-full">Còn hàng</span>
            </div>
            <h1 class="text-2xl lg:text-3xl font-bold mb-4">Máy tính iMac 24", Apple M1, RAM 8GB, SSD 256GB, Mac OS</h1>
            <div class="flex items-center space-x-2 mb-4">
                <div class="flex items-center space-x-1 text-yellow-400">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="text-sm">(5.0) | <a href="#" class="underline hover:text-blue-400">345 đánh giá</a></p>
            </div>
            <p class="text-lg lg:text-xl font-bold mb-4">29.990.000₫</p>

            <div class="flex flex-wrap gap-4 mb-6">
                <button class="bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-900 dark:text-white px-4 py-2 rounded-lg flex items-center space-x-2">
                    <i class="fas fa-heart"></i>
                    <span>Thêm vào yêu thích</span>
                </button>
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
                <div class="flex space-x-4">
                    <button class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-500 text-white">Đỏ</button>
                    <button class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-500 text-white">Xanh</button>
                    <button class="px-4 py-2 rounded-lg bg-yellow-500 hover:bg-yellow-400 text-white">Vàng</button>
                    <button class="px-4 py-2 rounded-lg bg-purple-600 hover:bg-purple-500 text-white">Tím</button>
                </div>
            </div>

            <!-- Size Options -->
            <div>
                <h3 class="text-lg font-medium mb-2">Kích thước</h3>
                <div class="flex space-x-4">
                    <button class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-900 dark:text-white">
                        Nhỏ
                    </button>
                    <button class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-900 dark:text-white">
                        Vừa
                    </button>
                    <button class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-900 dark:text-white">
                        Lớn
                    </button>
                </div>
            </div>

            <!-- Pickup Options -->
            <div>
                <h3 class="text-lg font-medium mb-2">Nhận hàng</h3>
                <div class="space-y-2">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="pickup" class="form-radio text-gray-600 focus:ring-gray-500">
                        <span>Giao hàng - 50.000₫ (Nhận vào ngày 17/01)</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="pickup" class="form-radio text-gray-600 focus:ring-gray-500">
                        <span>Nhận tại cửa hàng - Miễn phí</span>
                    </label>
                </div>
            </div>

            <!-- Warranty Options -->
            <div>
                <h3 class="text-lg font-medium mb-2">Bảo hành</h3>
                <div class="space-y-2">
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="warranty" class="form-radio text-gray-600 focus:ring-gray-500">
                        <span>1 năm - 500.000₫</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="warranty" class="form-radio text-gray-600 focus:ring-gray-500">
                        <span>2 năm - 900.000₫</span>
                    </label>
                    <label class="flex items-center space-x-2">
                        <input type="radio" name="warranty" class="form-radio text-gray-600 focus:ring-gray-500">
                        <span>3 năm - 1.200.000₫</span>
                    </label>
                </div>
            </div>
        </div>

        <!-- Viết mô tả cho sản pham -->
        <div class="col-span-2">
            <h2 class="text-2xl font-bold mb-4">Mô tả sản phẩm</h2>
            <p class="text-gray-600 dark:text-gray-300">
            Nội dung mô tả 2000 chữMô tả sản phẩm
                Mô tả sản phẩm
                Mô tả sản phẩm
                Mô tả sản phẩmMô tả sản phẩm
                Mô tả sản phẩm
                Mô tả sản phẩm
                Mô tả sản phẩmMô tả sản phẩm
                Mô tả sản phẩm
                Mô tả sản phẩm
                Mô tả sản phẩmMô tả sản phẩm
                Mô tả sản phẩm
                Mô tả sản phẩm
                Mô tả sản phẩmMô tả sản phẩm
                Mô tả sản phẩm
                Mô tả sản phẩm
                Mô tả sản phẩm
            Mô tả sản phẩm
            Mô tả sản phẩm
            Mô tả sản phẩm
            Mô tả sản phẩm
            </p>
        </div>


    </div>
</div>