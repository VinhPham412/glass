<div id="info-user-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 transform transition-all hover:scale-105">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 bg-gradient-to-r from-blue-500 to-purple-500">
                <h3 class="text-xl font-semibold text-white">
                    Thông Tin Người Dùng
                </h3>
                <button type="button"
                        class="text-white bg-transparent hover:bg-white hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center transition-colors duration-200"
                        data-modal-hide="info-user-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Đóng</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class="grid grid-cols-1 gap-4">
                    <div class="bg-gray-100 dark:bg-gray-600 p-3 rounded-lg transition-all duration-300 hover:shadow-md">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Họ Tên</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100 font-bold truncate">{{ $name_user }}</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-600 p-3 rounded-lg transition-all duration-300 hover:shadow-md">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100 font-bold break-words">{{ $email_user }}</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-600 p-3 rounded-lg transition-all duration-300 hover:shadow-md">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Số Điện Thoại</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100 font-bold">{{ $phone_user }}</p>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-600 p-3 rounded-lg transition-all duration-300 hover:shadow-md">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Địa Chỉ</label>
                        <p class="mt-1 text-sm text-gray-900 dark:text-gray-100 font-bold break-words">{{ $address_user }}</p>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="info-user-modal" type="button"
                        class="text-white bg-gradient-to-r from-blue-500 to-purple-500 hover:from-purple-500 hover:to-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-all duration-300 transform hover:scale-105">
                    Đóng
                </button>
            </div>
        </div>
    </div>
</div>