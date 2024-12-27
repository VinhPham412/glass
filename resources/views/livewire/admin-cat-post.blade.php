<div>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Bảng danh sách danh mục  dựa theo $listCatPost-->
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        STT 
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Tên danh mục
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
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
                        <td class="px-6 py-4 text-center">
                            <input type="text" class="w-full px-2 py-1 border border-gray-300 rounded-md" 
                                wire:key="catpost-{{ $catPost->id }}"
                                wire:model="listCatPost.{{ $catPost->id }}"
                                {{-- value="{{ $catPost->title }}" --}}
                                >
                        </td>
                        <td class="px-6 py-4 flex justify-center">
                            <!-- Nút sửa -->
                            <button wire:click="editCatPost({{ $catPost->id }})"
                                onclick="confirm('Bạn có chắc chắn muốn sửa danh mục bài viết này không (Nếu sửa sẽ sửa hết bài viết thuộc danh mục này)?') || event.stopImmediatePropagation()"
                                class="flex items-center bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-edit mr-2"></i> Sửa
                            </button>
                            <!-- Nút xóa -->
                            <button wire:click="deleteCatPost({{ $catPost->id }})"
                                onclick="confirm('Bạn có chắc chắn muốn xóa danh mục bài viết này không (Nếu xoá sẽ xoá hết bài viết thuộc danh mục này)?') || event.stopImmediatePropagation()"
                                class="flex items-center bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                <i class="fas fa-trash-alt mr-2"></i> Xoá
                            </button>
                        </td>
                    </tr>
                @endforeach

                <tr class="bg-gray-100 border-b dark:bg-gray-900 dark:border-gray-700">
                    <td class="px-6 py-4 text-center font-semibold text-gray-700 dark:text-gray-300">
                        Thêm mới danh mục 
                    </td>
                    <td class="px-6 py-4 text-center">
                        <input wire:model="newCatPost"
                         type="text" class="w-full px-2 py-1 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nhập tên danh mục mới">
                    </td>
                    <td class="px-6 py-4 flex justify-center">
                        <!-- Nút thêm -->
                        <button wire:click="addCatPost"
                            class="flex items-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded shadow-md">
                            <i class="fas fa-plus mr-2"></i> Thêm
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Phân trang -->
    <div class="mt-4">
        {{ $catposts->links() }}
    </div>

    
</div>
