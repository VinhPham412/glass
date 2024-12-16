<!-- Thêm thanh tìm kiếm -->
<div class="flex justify-end mb-4">
    <input type="text" id="search-input"
        class="form-input rounded-md shadow-sm mt-1 block w-full md:w-1/3 lg:w-1/4 p-2 border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
        placeholder="Tìm kiếm bài viết...">
</div>


<!-- // lọc theo tên bài viết trong ô input search -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search-input');
        const tableRows = document.querySelectorAll('tbody tr');

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();

            tableRows.forEach(row => {
                const title = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                if (title.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>


<div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white dark:bg-gray-900">
    <div class="relative inline-block text-left">
        <button type="button"
            class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            id="options-menu" aria-expanded="false" aria-haspopup="true" disabled>
            ( Đã chọn:&nbsp;<span id="selected-count">0</span> ) Hành động
            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
            </svg>
        </button>

        <div class="origin-top-left absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10 hidden"
            role="menu" aria-orientation="vertical" aria-labelledby="options-menu" id="dropdown-menu">
            <div class="py-1" role="none">
                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem"
                    id="delete-selected">Xóa</a>
                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem"
                    id="hide-selected">Ẩn</a>
                <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem"
                    id="show-selected">Hiện</a>
            </div>
        </div>
    </div>

    <!-- Ẩn/hiện checkbox hàng loạt -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const optionsMenuButton = document.getElementById('options-menu');
            const dropdownMenu = document.getElementById('dropdown-menu');
            const selectedCountSpan = document.getElementById('selected-count');
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:not(#select-all)');

            function updateActionButtonState() {
                const selectedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;
                selectedCountSpan.textContent = selectedCount;
                optionsMenuButton.disabled = selectedCount === 0;
            }

            optionsMenuButton.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });

            const menuItems = dropdownMenu.querySelectorAll('a');
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    dropdownMenu.classList.add('hidden');
                });
            });

            document.addEventListener('click', function(event) {
                if (!optionsMenuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateActionButtonState);
            });

            const selectAllCheckbox = document.getElementById('select-all');
            selectAllCheckbox.addEventListener('change', function() {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = selectAllCheckbox.checked;
                });
                updateActionButtonState();
            });

            updateActionButtonState();
        });

        document.addEventListener('DOMContentLoaded', function() {
            const deleteSelected = document.getElementById('delete-selected');
            const hideSelected = document.getElementById('hide-selected');
            const showSelected = document.getElementById('show-selected');
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:not(#select-all)');

            deleteSelected.addEventListener('click', function() {
                const selectedIds = Array.from(checkboxes).filter(checkbox => checkbox.checked).map(
                    checkbox => checkbox.value);
                // Add your delete logic here
                console.log('Delete selected:', selectedIds);
            });

            hideSelected.addEventListener('click', function() {
                const selectedIds = Array.from(checkboxes).filter(checkbox => checkbox.checked).map(
                    checkbox => checkbox.value);
                // Add your hide logic here
                console.log('Hide selected:', selectedIds);
            });

            showSelected.addEventListener('click', function() {
                const selectedIds = Array.from(checkboxes).filter(checkbox => checkbox.checked).map(
                    checkbox => checkbox.value);
                // Add your show logic here
                console.log('Show selected:', selectedIds);
            });
        });
    </script>

    <table class="w-full text-sm text-left rtl:text-right text-gray-600 dark:text-gray-400">
        <thead
            class="text-xs text-gray-700 uppercase bg-gradient-to-r from-blue-500 to-indigo-500 dark:bg-gray-800 dark:text-gray-300">
            <tr>
                <th scope="col" class="px-6 py-3 text-white">
                    <input type="checkbox" id="select-all"
                        class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out">
                </th>
                <th scope="col" class="px-6 py-3 text-white">STT</th>
                <th id="post_name" scope="col" class="px-1 py-3 text-white w-1/2 md:w-auto cursor-pointer">Tên bài
                    viết</th>
                <th scope="col" class="px-6 py-3 text-white">Ảnh bài viết</th>
                <th id="post_author" scope="col" class="px-6 py-3 text-white cursor-pointer">Tác giả</th>
                <th id="post_update" scope="col" class="px-6 py-3 text-white cursor-pointer">Ngày chỉnh sửa</th>
                <th scope="col" class="px-6 py-3 text-white">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $index => $post)
                <tr data-name = "{{ $post->title }}" data-index = "{{ $index + 1 }}"
                    data-author = "{{ $post->user->name }}" data-update = "{{ $post->updated_at->format('d/m/Y') }}"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        <input type="checkbox"
                            class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out">
                    </td>
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-1 py-4 font-semibold text-gray-800 dark:text-white w-1/2 md:w-auto">
                        {{ $post->title }}</td>
                    <td class="px-6 py-4">
                        <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}"
                            class="w-12 h-12 rounded-lg border-2 border-gray-200 dark:border-gray-600">
                    </td>
                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $post->user->name }}</td>
                    <td class="px-6 py-4 text-gray-600 dark:text-gray-300">{{ $post->updated_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 text-center space-x-4 flex justify-start items-center ">
                        <a href="{{ route('admin.show_post', $post->id) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:text-blue-700 dark:hover:text-blue-400">
                            <i class="fas fa-eye"></i> Xem
                        </a>
                        <a href="{{ route('admin.update_post', $post->id) }}"
                            class="font-medium text-yellow-600 dark:text-yellow-400 hover:text-yellow-700 dark:hover:text-yellow-300">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <form action="{{ route('admin.delete_post', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="font-medium text-red-600 dark:text-red-500 hover:text-red-700 dark:hover:text-red-400">
                                <i class="fas fa-trash"></i> Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>



    </table>
</div>


<!-- Pagination with page numbers -->
<div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
    <div class="flex flex-1 justify-between sm:hidden">
        <button id="prev-page"
            class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
            disabled>Previous</button>
        <button id="next-page"
            class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</button>
    </div>
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
        <div>
            <p class="text-sm text-gray-700">
                Showing
                <span id="start-index" class="font-medium">1</span>
                to
                <span id="end-index" class="font-medium">10</span>
                of
                <span id="total-results" class="font-medium">{{ count($posts) }}</span>
                results
            </p>
        </div>
        <div>
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                <button id="prev-page-nav"
                    class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                    disabled>
                    <span class="sr-only">Previous</span>
                    <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M11.78 5.22a.75.75 0 0 1 0 1.06L8.06 10l3.72 3.72a.75.75 0 1 1-1.06 1.06l-4.25-4.25a.75.75 0 0 1 0-1.06l4.25-4.25a.75.75 0 0 1 1.06 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div id="pagination-numbers" class="flex space-x-1"></div>
                <button id="next-page-nav"
                    class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                    <span class="sr-only">Next</span>
                    <svg class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M8.22 5.22a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.06-1.06L11.94 10 8.22 6.28a.75.75 0 0 1 0-1.06Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </nav>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search-input');
        const tableRows = document.querySelectorAll('tbody tr');
        const rowsPerPage = 10;
        let currentPage = 1;
        const paginationNumbers = document.getElementById('pagination-numbers');
        const maxPageButtons = 5;
        let totalResults = document.getElementById('total-results').textContent;

        // hàm filterRows sẽ trả về mảng các dòng trong bảng mà tiêu đề chứa từ khóa tìm kiếm và đã sort
        function filterRows() {
            const searchTerm = searchInput.value.toLowerCase();

            const filteredRows = Array.from(tableRows).filter(row => {
                const title = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                return title.includes(searchTerm);
            });

            document.getElementById('total-results').textContent = filteredRows.length;

            return filteredRowsandSort;
        }

        // hàm showPage sẽ hiển thị trang thứ page với dữ liệu là mảng filteredRows
        function showPage(page, filteredRows) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            tableRows.forEach(row => row.style.display = 'none');
            filteredRows.slice(start, end).forEach(row => row.style.display = '');

            document.getElementById('prev-page').disabled = page === 1;
            document.getElementById('next-page').disabled = end >= filteredRows.length;
            document.getElementById('prev-page-nav').disabled = page === 1;
            document.getElementById('next-page-nav').disabled = end >= filteredRows.length;

            document.getElementById('start-index').textContent = start + 1;
            document.getElementById('end-index').textContent = Math.min(end, filteredRows.length);

            updatePaginationNumbers(filteredRows.length);
        }

        // hàm updatePaginationNumbers sẽ cập nhật các nút phân trang
        function updatePaginationNumbers(totalResults) {
            paginationNumbers.innerHTML = '';
            const totalPages = Math.ceil(totalResults / rowsPerPage);
            let startPage = Math.max(1, currentPage - Math.floor(maxPageButtons / 2));
            let endPage = Math.min(totalPages, startPage + maxPageButtons - 1);

            if (endPage - startPage < maxPageButtons - 1) {
                startPage = Math.max(1, endPage - maxPageButtons + 1);
            }

            for (let i = startPage; i <= endPage; i++) {
                const pageNumber = document.createElement('button');
                pageNumber.textContent = i;
                pageNumber.classList.add('relative', 'inline-flex', 'items-center', 'px-4', 'py-2', 'text-sm',
                    'font-semibold', 'text-gray-900', 'ring-1', 'ring-inset', 'ring-gray-300',
                    'hover:bg-gray-50', 'focus:z-20', 'focus:outline-offset-0');
                if (i === currentPage) {
                    pageNumber.classList.add('z-10', 'bg-indigo-600', 'text-white', 'focus-visible:outline',
                        'focus-visible:outline-2', 'focus-visible:outline-offset-2',
                        'focus-visible:outline-indigo-600');
                }
                pageNumber.addEventListener('click', function() {
                    currentPage = i;
                    showPage(currentPage, filterRows());
                });
                paginationNumbers.appendChild(pageNumber);
            }
        }

        searchInput.addEventListener('input', function() {
            currentPage = 1;
            showPage(currentPage, filterRows());
        });

        document.getElementById('prev-page').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage, filterRows());
            }
        });

        document.getElementById('next-page').addEventListener('click', function() {
            if ((currentPage * rowsPerPage) < filterRows().length) {
                currentPage++;
                showPage(currentPage, filterRows());
            }
        });

        document.getElementById('prev-page-nav').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage, filterRows());
            }
        });

        document.getElementById('next-page-nav').addEventListener('click', function() {
            if ((currentPage * rowsPerPage) < filterRows().length) {
                currentPage++;
                showPage(currentPage, filterRows());
            }
        });

        showPage(currentPage, filterRows());


        post_name = document.getElementById('post_name');
        post_author = document.getElementById('post_author');
        post_update = document.getElementById('post_update');

        // viết 1 hàm duy nhất : tham số thứ nhất là cột , tham số thứ 2 là tăng/giảm 
        function sortTable(column, asc = true) {
            const rows = Array.from(document.querySelectorAll('tbody tr'));
            rows.sort((a, b) => {
                const valueA = a.getAttribute(`data-${column}`).toLowerCase();
                const valueB = b.getAttribute(`data-${column}`).toLowerCase();

                if (column === 'index') {
                    return valueA - valueB; // Always sort index in ascending order
                }

                if (column === 'update') {
                    const dateA = new Date(valueA.split('/').reverse().join('-'));
                    const dateB = new Date(valueB.split('/').reverse().join('-'));
                    return asc ? dateA - dateB : dateB - dateA;
                }

                // So sánh độ dài trước
                if (valueA.length !== valueB.length) {
                    return asc ? valueA.length - valueB.length : valueB.length - valueA.length;
                }

                return asc ? valueA.localeCompare(valueB) : valueB.localeCompare(valueA);
            });
            rows.forEach(row => row.remove());
            rows.forEach(row => document.querySelector('tbody').appendChild(row));
            showPage(currentPage, rows); // Update the pagination after sorting
        }

        const columns = [post_name, post_author, post_update];

        // Hàm toggleSortIcon sẽ thêm icon hướng lên hoặc hướng xuống vào tiêu đề được click
        function toggleSortIcon(column) {
            // Xóa icon hướng lên hoặc hướng xuống ở các tiêu đề khác   
            columns.forEach(col => {
                if (col !== column) {
                    col.classList.remove('text-gray-300');
                    col.classList.add('text-white');
                    col.innerHTML = col.getAttribute('data-original-text');
                }
            });

            // Thêm icon hướng lên hoặc hướng xuống vào tiêu đề được click
            if (column.classList.contains('text-white')) {
                column.classList.remove('text-white');
                column.classList.add('text-gray-300');
                column.innerHTML = column.getAttribute('data-original-text') + ' <i class="fas fa-sort-down"></i>';
                sortTable(column.id.split('_')[1], true);
            } else {
                column.classList.remove('text-gray-300');
                column.classList.add('text-white');
                column.innerHTML = column.getAttribute('data-original-text') + ' <i class="fas fa-sort-up"></i>';
                sortTable(column.id.split('_')[1], false);
            }
        }

        // Gán sự kiện click cho các tiêu đề
        columns.forEach(column => {
            column.setAttribute('data-original-text', column.textContent.trim());
            column.addEventListener('click', function() {
                toggleSortIcon(column);
            });
        })
    });
</script>



<!-- Chức năng sort dựa theo data-name, data-author, data-update -->
{{-- <script>
    post_name = document.getElementById('post_name');
    post_author = document.getElementById('post_author');
    post_update = document.getElementById('post_update');

    // viết 1 hàm duy nhất : tham số thứ nhất là cột , tham số thứ 2 là tăng/giảm 
    function sortTable(column, asc = true) {
        const rows = Array.from(document.querySelectorAll('tbody tr'));
        rows.sort((a, b) => {
            const valueA = a.getAttribute(`data-${column}`).toLowerCase();
            const valueB = b.getAttribute(`data-${column}`).toLowerCase();

            if (column === 'index') {
                return valueA - valueB; // Always sort index in ascending order
            }

            if (column === 'update') {
                const dateA = new Date(valueA.split('/').reverse().join('-'));
                const dateB = new Date(valueB.split('/').reverse().join('-'));
                return asc ? dateA - dateB : dateB - dateA;
            }

            // So sánh độ dài trước
            if (valueA.length !== valueB.length) {
                return asc ? valueA.length - valueB.length : valueB.length - valueA.length;
            }

            return asc ? valueA.localeCompare(valueB) : valueB.localeCompare(valueA);
        });
        rows.forEach(row => row.remove());
        rows.forEach(row => document.querySelector('tbody').appendChild(row));
        showPage(currentPage, rows); // Update the pagination after sorting
    }


    // sortTable('name', false);
    // áp dụng sortable 
    post_name.addEventListener('click', function() {
        // toggleSortIcon(post_name);
        sortTable('name', false);
    });


    // const columns = [post_name, post_author, post_update];

    // // Hàm toggleSortIcon sẽ thêm icon hướng lên hoặc hướng xuống vào tiêu đề được click
    // function toggleSortIcon(column) {
    //     // Xóa icon hướng lên hoặc hướng xuống ở các tiêu đề khác   
    //     columns.forEach(col => {
    //         if (col !== column) {
    //             col.classList.remove('text-gray-300');
    //             col.classList.add('text-white');
    //             col.innerHTML = col.getAttribute('data-original-text');
    //         }
    //     });

    //     // Thêm icon hướng lên hoặc hướng xuống vào tiêu đề được click
    //     if (column.classList.contains('text-white')) {
    //         column.classList.remove('text-white');
    //         column.classList.add('text-gray-300');
    //         column.innerHTML = column.getAttribute('data-original-text') + ' <i class="fas fa-sort-down"></i>';
    //         // sortTable(column.id.split('_')[1], true);
    //     } else {
    //         column.classList.remove('text-gray-300');
    //         column.classList.add('text-white');
    //         column.innerHTML = column.getAttribute('data-original-text') + ' <i class="fas fa-sort-up"></i>';
    //         // sortTable(column.id.split('_')[1], false);
    //     }
    // }

    // // Gán sự kiện click cho các tiêu đề
    // columns.forEach(column => {
    //     column.setAttribute('data-original-text', column.textContent.trim());
    //     column.addEventListener('click', function() {
    //         toggleSortIcon(column);
    //     });
    // });
</script> --}}
