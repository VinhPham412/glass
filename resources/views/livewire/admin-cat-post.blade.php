<div>
    <!-- Bảng danh sách danh mục  dựa theo $listCatPost-->
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        STT
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tên danh mục
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Chức năng
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($catposts as $index => $catPost)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td scope="row"
                            class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $catPost->title }}
                        </td>
                        <td class="px-6 py-4 flex justify-around">
                            <!-- Nút sửa -->
                            <button
                                class="flex items-center bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-edit mr-2"></i> Sửa
                            </button>
                            <!-- Nút xóa -->
                            <button
                                class="flex items-center bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-trash-alt mr-2"></i> Xoá
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Phân trang -->
    <div class="mt-4">
        {{ $catposts->links() }}
    </div>


</div>
