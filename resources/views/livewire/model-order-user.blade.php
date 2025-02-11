<div>
    <div id="order-modal" tabindex="-1" aria-hidden="true"
         class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Danh sách đơn hàng của bạn
                    </h3>
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="order-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Đóng</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 max-h-[60vh] overflow-y-auto">
                    @if(count($list_order) > 0)
                        @foreach($list_order->sortByDesc('created_at') as $order)
                            <div class="bg-gray-100 p-4 rounded-lg dark:bg-gray-600 mb-4">
                                <h4 class="text-lg font-semibold mb-2">Đơn hàng #{{ $order->id }}</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Ngày đặt: {{ $order->created_at->format('d/m/Y H:i') }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Trạng thái: {{ $order->status }}</p>
                                <p class="text-sm font-semibold mt-2">Tổng tiền: {{ number_format($order->total_price_order(), 0, ',', '.') }} VNĐ</p>
                                <div class="mt-2">
                                    <button class="text-blue-600 hover:underline text-sm" onclick="toggleOrderDetails({{ $order->id }})">
                                        Xem chi tiết
                                    </button>
                                </div>
                                <div id="orderDetails{{ $order->id }}" class="hidden mt-3">
                                    @foreach($order->orderItems as $item)
                                        <div class="flex items-center justify-between py-2 border-t border-gray-200 dark:border-gray-500">
                                            <div class="flex items-center">
                                                <img src="{{Storage::url( $item->version->images->first()->link) }}" alt="{{ $item->version->product->name }}" class="w-12 h-12 object-cover rounded mr-3">
                                                <div>
                                                    <p class="font-medium">{{ $item->version->product->name }}</p>
                                                    <p class="text-sm text-gray-500 dark:text-gray-400">Số lượng: {{ $item->quantity }}</p>
                                                </div>
                                            </div>
                                            <p class="font-medium">{{ number_format($item->price * $item->quantity, 0, ',', '.') }} VNĐ</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center text-gray-500 dark:text-gray-400">Bạn chưa có đơn hàng nào.</p>
                    @endif
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="order-modal" type="button"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Đóng
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleOrderDetails(orderId) {
            const detailsElement = document.getElementById(`orderDetails${orderId}`);
            if (detailsElement.classList.contains('hidden')) {
                detailsElement.classList.remove('hidden');
            } else {
                detailsElement.classList.add('hidden');
            }
        }
    </script>
</div>