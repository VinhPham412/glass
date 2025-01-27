@php
    use Illuminate\Support\Facades\Storage;
	$tmp_price = 0;
@endphp

<div id="drawer-cart"
     class="fixed top-0 right-0 z-50 h-screen p-4 overflow-y-auto transition-transform  bg-white w-[90%] md:w-96 dark:bg-gray-800
     @if(!$expand_drawer) translate-x-full @endif
     "
     tabindex="-1" aria-labelledby="drawer-right-label">
    <h5 id="drawer-right-label"
        class="inline-flex items-center mb-4 text-lg font-semibold text-gray-700 dark:text-gray-300">
        <i class="fas fa-shopping-cart mr-2"></i>
        Có {{ count($cart) }} sp khác nhau
    </h5>
    <button type="button" data-drawer-hide="drawer-cart" aria-controls="drawer-cart"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-2 absolute top-2.5 right-2.5 dark:hover:bg-gray-600 dark:hover:text-white">
        <i class="fas fa-times"></i>
        <span class="sr-only">Đóng giỏ hàng</span>
    </button>
    <div class="py-2 max-h-[calc(100vh-500px)] overflow-y-auto">
        <ul class="space-y-2">
            @forelse($cart as $version_id => $cart_item_quantity)
                @php
                    $version = \App\Models\Version::find($version_id);
					$tmp_price += $version->price * $cart_item_quantity;
                @endphp
                <li class="flex flex-col space-y-2 border-b pb-1">
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
                        <button type="button" wire:click="removeCartItem('{{$version_id}}')"
                                class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-500">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <button wire:click="decreaseCartItem('{{$version_id}}')"
                                    class="px-2 py-1 text-sm font-medium text-gray-900 bg-gray-200 rounded dark:bg-gray-700 dark:text-white">
                                <i class="fas fa-minus"></i>
                            </button>
                            <span class="text-sm font-medium text-gray-900 dark:text-white">
                                {{ $cart_item_quantity }}
                            </span>
                            <button wire:click="increaseCartItem('{{$version_id}}')"
                                    class="px-2 py-1 text-sm font-medium text-gray-900 bg-gray-200 rounded dark:bg-gray-700 dark:text-white">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <p class="text-sm font-bold text-gray-900 dark:text-white">
                            Tổng: {{ number_format($version->price*$cart_item_quantity, 0, ',', '.') }} vnd
                        </p>
                    </div>
                </li>

            @empty
                <p class="text-center text-gray-500 dark:text-gray-400">Không có sản phẩm nào</p>
            @endforelse
        </ul>
    </div>

    <!-- Thông tin khách hàng: Tên, email, số điện thoại, địa chỉ -->
    <div class="mb-4 grid grid-cols-2 gap-2">
        <input type="text" id="name" placeholder="Tên" wire:model="name_user"
               class="col-span-1 px-3 py-2 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <input type="tel" id="phone" placeholder="Số điện thoại" wire:model="phone_user"
               class="col-span-1 px-3 py-2 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <input type="email" id="email" placeholder="Email" wire:model="email_user"
               class="col-span-1 px-3 py-2 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <input type="text" id="address" placeholder="Địa chỉ"  wire:model="address_user"
               class="col-span-1 px-3 py-2 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <!-- QR code -->
    <div class="mb-4 grid grid-cols-3 gap-4">
        <!-- QR code -->
        <img class="w-[7rem] mx-auto" alt="QR code"
             src="https://img.vietqr.io/image/vietinbank-104868956934-qr_only.jpg?amount={{$amount_cart}}&addInfo=chuyển khoản số tiền {{$amount_cart}}&accountName=VinhPham">

        <!-- Thông tin ngân hàng -->
        <div class="flex flex-col justify-center col-span-2">
            <p class="text-sm font-medium text-gray-900 dark:text-white">Ngân hàng: VietinBank</p>
            <p class="text-sm font-medium text-gray-900 dark:text-white">Chủ tk: VinhPham</p>
            <p class="text-sm font-medium text-gray-900 dark:text-white">Số tk: 104868956934</p>
            <p class="text-sm font-medium text-gray-900 dark:text-white">Ghi chú: gửi số tiền {{ number_format($amount_cart, 0, ',', '.') }} vnd</p>
        </div>
    </div>

    <!-- Thanh toán -->
    <div class="absolute bottom-0 left-0 right-0 p-3 bg-gray-50 dark:bg-gray-800">
        <div class="space-y-1 mb-3 text-sm">
            <div class="flex justify-between">
                <span class="text-gray-600 dark:text-gray-400">Tạm tính:</span>
                <span class="font-medium text-gray-900 dark:text-white">
                    {{ number_format($tmp_price, 0, ',', '.') }} vnd
                </span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-600 dark:text-gray-400">Phí vận chuyển:</span>
                <span class="font-medium text-gray-900 dark:text-white">
                    {{ number_format(10000,0,',','.') }} vnd
                </span>
            </div>
            <div class="flex justify-between font-bold text-base pt-1">
                <span class="text-gray-900 dark:text-white">Tổng cộng:</span>
                <span class="text-gray-900 dark:text-white">
                    {{ number_format($tmp_price + 10000, 0, ',', '.') }} vnd
                </span>
            </div>
        </div>

        <div class="mb-3">
            <select wire:model="payment"
                    id="payment-method" class="w-full p-2 text-sm bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                <option value="momo">MOMO</option>
            </select>
        </div>

        <button wire:click="dat_hang()"
                class="w-full py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-700 dark:hover:bg-blue-800">
            <i class="fas fa-credit-card mr-2"></i>Đặt hàng
        </button>
    </div>
</div>