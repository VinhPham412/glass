<div>
    <!-- Thêm thanh tìm kiếm -->
    <div class="flex justify-end mb-0">
        <input type="text" id="search-input" wire:model.live.debounce.300ms="search"
            class="form-input rounded-md shadow-sm mt-1 block w-full md:w-1/3 lg:w-1/4 p-2 border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
            placeholder="Tìm kiếm bài viết...">
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white dark:bg-gray-900">
        <div class="relative inline-block text-left">
            <button type="button" data-dropdown-toggle="dropdown"
                class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-1 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                id="options-menu" aria-expanded="false" aria-haspopup="true">
                ( Đã chọn:&nbsp;<span id="selected-count">{{ $count_checkbox }}</span> ) Hành động
                <i class="fas fa-chevron-down ml-2"></i>
            </button>

            <!-- Dropdown Menu -->
            <div id="dropdown"
                class="hidden absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10">
                <div class="py-1">
                    <a wire:click='processSelected("delete")' href="#"
                        class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Xoá</a>
                    <a wire:click='processSelected("hidden")' href="#"
                        class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Ẩn</a>
                    <a wire:click='processSelected("show")' href="#"
                        class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Hiện</a>
                </div>
            </div>

        </div>

        <table class="w-full text-sm text-left rtl:text-right text-gray-600 dark:text-gray-400">
            <thead
                class="text-xs text-gray-700 uppercase bg-gradient-to-r from-blue-500 to-indigo-500 dark:bg-gray-800 dark:text-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3 text-white">
                        <input type="checkbox" id="select-all" wire:click="toggleSelectAll"
                            class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out">
                    </th>
                    <th id="post_index" scope="col" class="px-6 py-3 text-white ">STT</th>
                    <th wire:click="sortBy('title')" id="post_name" scope="col"
                        class="px-1 py-3 text-white w-1/2 md:w-auto cursor-pointer">
                        Tên bài viết
                        @if ($sortField === 'title')
                            @if ($sortAsc === 'asc')
                                <i class="fas fa-sort-down"></i>
                            @else
                                <i class="fas fa-sort-up"></i>
                            @endif
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3 text-white">Ảnh bài viết</th>
                    <th id="post_author" scope="col" class="px-6 py-3 text-white ">Tác giả</th>
                    <th wire:click="sortBy('created_at')" id="post_update" scope="col"
                        class="px-6 py-3 text-white cursor-pointer">
                        Ngày tạo
                        @if ($sortField === 'created_at')
                            @if ($sortAsc === 'asc')
                                <i class="fas fa-sort-down"></i>
                            @else
                                <i class="fas fa-sort-up"></i>
                            @endif
                        @endif
                    </th>
                    <th scope="col" class="px-6 py-3 text-white">Chức năng</th>
                </tr>
            </thead>
            <tbody wire:poll.4s>
                @foreach ($posts as $index => $post)
                    <tr data-name = "{{ $post->title }}" data-index = "{{ $index + 1 }}"
                        data-author = "{{ $post->user->name }}" data-update = "{{ $post->created_at->format('d/m/Y') }}"
                        class="
                        @if ($post->status == 'hide') bg-gray-300 dark:bg-red-700
                        @else 
                            bg-white dark:bg-gray-800 @endif
                        
                        border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            <input type="checkbox" wire:model.live="selected" value="{{ $post->id }}"
                                class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out">
                        </td>
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-1 py-4 font-semibold text-gray-800 dark:text-white w-1/2 md:w-auto">
                            {{ $post->title }}</td>
                        <td class="px-6 py-4">
                            <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}"
                                class="w-10 h-10 rounded-lg border-2 border-gray-200 dark:border-gray-600">
                        </td>
                        <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $post->user->name }}</td>
                        <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $post->created_at->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 text-center space-x-4 flex justify-start items-center ">
                            <a href="{{ route('admin.show_post', $post->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400">
                                <i class="fas fa-eye"></i> Xem
                            </a>
                            <a href="{{ route('admin.update_post', $post->id) }}"
                                class="font-medium text-yellow-600 dark:text-yellow-400 hover:text-yellow-700 dark:hover:text-yellow-300">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a href="#"
                                onclick="confirm('Bạn có chắc chắn muốn xóa bài viết {{ $post->name }}?') || event.stopImmediatePropagation()"
                                wire:click="deletePost({{ $post->id }})"
                                class="inline font-medium text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4" id="phan_trang_duoi">
        {{ $posts->links(data: ['scrollTo' => false]) }}
    </div>


    <script>
        document.addEventListener('noselected', event => {
            alert('Bạn chưa chọn bài viết nào để thực hiện hành động');
        });

        document.addEventListener('cormfirmdelete', event => {
            let confirmDelete = confirm('Bạn có chắc chắn muốn xoá các bài viết đã chọn ?');
            if (confirmDelete) {
                @this.call('deleteSelected');
            }
        });

        document.addEventListener('confirmhidden', event => {
            let confirmHidden = confirm('Bạn có chắc chắn muốn ẩn các bài viết đã chọn ?');
            if (confirmHidden) {
                @this.call('hiddenSelected');
            }
        });


        document.addEventListener('confirmshow', (data) => {
            let confirmShow = confirm('Bạn có chắc chắn muốn hiện các bài viết đã chọn ?');
            if (confirmShow) {
                @this.call('showSelected');
            }
        });
    </script>
</div>
