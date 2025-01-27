<main id="content">
    <!-- Secondary Navbar -->
    <div class="md:py-4 bg-white md:border-b border-gray-200 dark:bg-neutral-800 dark:border-neutral-700">
        <nav class="relative max-w-[85rem] w-full mx-auto md:flex md:items-center md:gap-3 px-4 sm:px-6 lg:px-8">
            <!-- Collapse -->
            <div id="hs-secondaru-navbar"
                 class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block"
                 aria-labelledby="hs-secondaru-navbar-collapse">
                <div class="overflow-hidden overflow-y-auto max-h-[75vh] [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
                    <div class="py-2 md:py-0 flex flex-col md:flex-row md:items-center gap-y-0.5 md:gap-y-0 md:gap-x-6">
                        <a class="py-2 md:py-0 flex items-center font-medium text-sm text-blue-600 focus:outline-none focus:text-blue-600 dark:text-blue-500 dark:focus:text-blue-500"
                           href="#" aria-current="page">
                            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden"
                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/>
                                <path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            </svg>
                            Trang chủ
                        </a>

                        <!-- Dropdown Danh mục -->
                        <div class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] [--is-collapse:true] md:[--is-collapse:false] ">
                            <button id="hs-secondaru-navbar-dropdown" type="button"
                                    class="hs-dropdown-toggle w-full py-2 md:py-0 flex items-center font-medium text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m3 10 2.5-2.5L3 5"/>
                                    <path d="m3 19 2.5-2.5L3 14"/>
                                    <path d="M10 6h11"/>
                                    <path d="M10 12h11"/>
                                    <path d="M10 18h11"/>
                                </svg>
                                Danh mục
                                <svg class="hs-dropdown-open:-rotate-180 md:hs-dropdown-open:rotate-0 duration-300 shrink-0 size-4 ms-auto md:ms-1"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6"/>
                                </svg>
                            </button>

                            <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 relative w-full md:w-52 hidden z-10 top-full ps-7 md:ps-0 md:bg-white md:rounded-lg md:shadow-md before:absolute before:-top-4 before:start-0 before:w-full before:h-5 md:after:hidden after:absolute after:top-1 after:start-2 after:w-0.5 after:h-[calc(100%-0.25rem)] after:bg-gray-100 dark:md:bg-neutral-800 dark:after:bg-neutral-700"
                                 role="menu" aria-orientation="vertical"
                                 aria-labelledby="hs-secondaru-navbar-dropdown">
                                <div class="py-1 md:px-1 space-y-0.5">
                                    @forelse($cats as $cat)
                                        <a class="py-1.5 md:px-2 flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                                           href="{{route('shop.catfilter')}}?cat={{$cat->name}}">
                                            {{ $cat->name  }}
                                        </a>
                                    @empty
                                        <a class="py-1.5 md:px-2 flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                                        >
                                            Không có danh mục nào
                                        </a>
                                    @endforelse


                                </div>
                            </div>
                        </div>
                        <!-- End Dropdown -->

                        <!-- Dropdown Thương hiệu-->
                        <div class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] [--is-collapse:true] md:[--is-collapse:false] ">
                            <button id="hs-secondaru-navbar-dropdown" type="button"
                                    class="hs-dropdown-toggle w-full py-2 md:py-0 flex items-center font-medium text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m3 10 2.5-2.5L3 5"/>
                                    <path d="m3 19 2.5-2.5L3 14"/>
                                    <path d="M10 6h11"/>
                                    <path d="M10 12h11"/>
                                    <path d="M10 18h11"/>
                                </svg>
                                Thương Hiệu
                                <svg class="hs-dropdown-open:-rotate-180 md:hs-dropdown-open:rotate-0 duration-300 shrink-0 size-4 ms-auto md:ms-1"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6"/>
                                </svg>
                            </button>

                            <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 relative w-full md:w-52 hidden z-10 top-full ps-7 md:ps-0 md:bg-white md:rounded-lg md:shadow-md before:absolute before:-top-4 before:start-0 before:w-full before:h-5 md:after:hidden after:absolute after:top-1 after:start-2 after:w-0.5 after:h-[calc(100%-0.25rem)] after:bg-gray-100 dark:md:bg-neutral-800 dark:after:bg-neutral-700"
                                 role="menu" aria-orientation="vertical"
                                 aria-labelledby="hs-secondaru-navbar-dropdown">
                                <div class="py-1 md:px-1 space-y-0.5">
                                    @forelse($brands as $brand)
                                        <a class="py-1.5 md:px-2 flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                                           href="{{route('shop.catfilter')}}?brand={{$brand->name}}">
                                            {{ $brand->name  }}
                                        </a>
                                    @empty
                                        <a class="py-1.5 md:px-2 flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                                        >
                                            Không có thương hiệu nào
                                        </a>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <!-- End Dropdown -->

                        <!-- Contact us -->
                        <a class="py-2 md:py-0 flex items-center font-medium text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 dark:text-neutral-200 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                           href="#">
                            <svg class="shrink-0 size-4 me-3 md:me-2 block md:hidden"
                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            Liên hệ
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Collapse -->
        </nav>
    </div>
    <!-- End Secondary Navbar -->

</main>