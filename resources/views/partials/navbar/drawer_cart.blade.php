@php
    use Illuminate\Support\Facades\Storage;
@endphp

<div id="drawer-cart"
     class="fixed top-0 right-0 z-50 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 md:w-96 dark:bg-gray-800"
     tabindex="-1" aria-labelledby="drawer-right-label">
    <h5 id="drawer-right-label"
        class="inline-flex items-center mb-4 text-lg font-semibold text-gray-700 dark:text-gray-300">
        <i class="fas fa-shopping-cart mr-2"></i>
        Giỏ hàng
    </h5>
    <button type="button" data-drawer-hide="drawer-cart" aria-controls="drawer-cart"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-2 absolute top-2.5 right-2.5 dark:hover:bg-gray-600 dark:hover:text-white">
        <i class="fas fa-times"></i>
        <span class="sr-only">Đóng giỏ hàng</span>
    </button>
    <div class="py-4 max-h-[calc(100vh-450px)] overflow-y-auto">
        <ul class="space-y-4">
            @foreach($cart as $version_id => $cart_item_quantity)
                @php
                    $version = \App\Models\Version::find($version_id);
                @endphp
                <li class="flex flex-col space-y-2 border-b pb-4">
                    <div class="flex justify-between items-start">
                        <div class="flex items-center space-x-4">
                            <img class="w-16 h-16 rounded-md object-cover"
                                 src="{{Storage::url($version->images->first()->link)}}"
                                 alt="Product image">
                            <div>
                                <p class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $version->product->name }}
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    Màu:
                                    {{ $version->color}}
                                    | Size:
                                    {{ $version->size}}
                                </p>
                                <p class="text-sm font-bold text-gray-900 dark:text-white">
                                    {{ number_format($version->price, 0, ',', '.') }} vnd
                                </p>
                            </div>
                        </div>
                        <button type="button"
                                class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-500">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <button class="px-2 py-1 text-sm font-medium text-gray-900 bg-gray-200 rounded dark:bg-gray-700 dark:text-white">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">
                                {{ $cart_item_quantity }}
                            </span>
                            <button class="px-2 py-1 text-sm font-medium text-gray-900 bg-gray-200 rounded dark:bg-gray-700 dark:text-white">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <p class="text-sm font-bold text-gray-900 dark:text-white">
                            Tổng: {{ number_format($version->price*$cart_item_quantity, 0, ',', '.') }} vnd
                        </p>
                    </div>
                </li>
            @endforeach

            <!-- Thêm các sản phẩm khác tương tự -->
        </ul>
    </div>
    <!-- Thanh toán -->
    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gray-50 dark:bg-gray-800">
        <div class="space-y-2 mb-4">
            <div class="flex justify-between items-center">
                <span class="text-sm text-gray-600 dark:text-gray-400">Tạm tính:</span>
                <span class="text-sm font-medium text-gray-900 dark:text-white">$149.99</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-sm text-gray-600 dark:text-gray-400">Phí vận chuyển:</span>
                <span class="text-sm font-medium text-gray-900 dark:text-white">$5.00</span>
            </div>
            <div class="flex justify-between items-center font-bold">
                <span class="text-base text-gray-900 dark:text-white">Tổng cộng:</span>
                <span class="text-base text-gray-900 dark:text-white">$154.99</span>
            </div>
        </div>
        <div class="mb-4">
            <label for="payment-method" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phương thức
                thanh toán</label>
            <select id="payment-method"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                <option value="momo">MOMO</option>
            </select>
        </div>
        <button class="w-full px-5 py-3 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:ring-blue-900">
            <i class="fas fa-credit-card mr-2"></i>Thanh toán
        </button>
    </div>
</div>