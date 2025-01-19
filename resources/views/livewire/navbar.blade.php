<div class="sticky top-0 z-40">
    <div>
        <!-- ========== HEADER ========== -->
        <header class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white border-b text-sm py-0  dark:bg-neutral-800 dark:border-neutral-700">
            <nav class="max-w-7xl mx-auto w-full px-4 sm:px-6 lg:px-8 flex basis-full items-center w-full mx-auto">
                <div class="me-5">
                    <!-- Logo -->
                    <a class="flex-none rounded-md text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
                       href="{{ route('shop.index') }}" aria-label="Preline">
                        <img class="w-20 h-auto" src="{{ asset('images/logo.webp') }}" alt="logo">
                    </a>
                    <!-- End Logo -->
                </div>

                <div class="w-full flex items-center justify-end ms-auto md:justify-between gap-x-1 md:gap-x-3">
                    <!-- Collapse -->
                    <div class="md:hidden">
                        <button type="button"
                                class="hs-collapse-toggle size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                id="hs-secondaru-navbar-collapse" aria-expanded="false"
                                aria-controls="hs-secondaru-navbar" aria-label="Toggle navigation"
                                data-hs-collapse="#hs-secondaru-navbar">
                            <svg class="hs-collapse-open:hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                 height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <line x1="3" x2="21" y1="6" y2="6"/>
                                <line x1="3" x2="21" y1="12" y2="12"/>
                                <line x1="3" x2="21" y1="18" y2="18"/>
                            </svg>
                            <svg class="hs-collapse-open:block shrink-0 hidden size-4"
                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M18 6 6 18"/>
                                <path d="m6 6 12 12"/>
                            </svg>
                            <span class="sr-only">Toggle navigation</span>
                        </button>
                    </div>
                    <!-- End Collapse -->

                    <div class="hidden md:block">
                        <!-- Search Input -->
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                                <svg class="shrink-0 size-4 text-gray-400 dark:text-white/60"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"/>
                                    <path d="m21 21-4.3-4.3"/>
                                </svg>
                            </div>
                            <input type="text"
                                   class="py-1 ps-10 pe-16 block w-full bg-white border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder:text-neutral-400 dark:focus:ring-neutral-600"
                                   placeholder="Search">
                            <div class="hidden absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-1">
                                <button type="button"
                                        class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
                                        aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                         height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"/>
                                        <path d="m15 9-6 6"/>
                                        <path d="m9 9 6 6"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <!-- End Search Input -->
                    </div>

                    <div class="flex flex-row items-center justify-end gap-1">
                        <button
                                data-modal-target="search-modal" data-modal-toggle="search-modal"
                                data-modal-body-scrolling="true"
                                class="md:hidden size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"/>
                                <path d="m21 21-4.3-4.3"/>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>

                        <!-- Light dark mode toggle -->
                        <div class="hs-dropdown">
                            <button id="hs-dropdown-dark-mode" type="button"
                                    class="hs-dropdown-toggle hs-dark-mode group flex items-center text-gray-600 hover:text-blue-600 focus:outline-none focus:text-blue-600 font-medium dark:text-neutral-400 dark:hover:text-neutral-500 dark:focus:text-neutral-500"
                                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                <svg class="hs-dark-mode-active:hidden block size-4" xmlns="http://www.w3.org/2000/svg"
                                     width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
                                </svg>
                                <svg class="hs-dark-mode-active:block hidden size-4" xmlns="http://www.w3.org/2000/svg"
                                     width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="4"></circle>
                                    <path d="M12 2v2"></path>
                                    <path d="M12 20v2"></path>
                                    <path d="m4.93 4.93 1.41 1.41"></path>
                                    <path d="m17.66 17.66 1.41 1.41"></path>
                                    <path d="M2 12h2"></path>
                                    <path d="M20 12h2"></path>
                                    <path d="m6.34 17.66-1.41 1.41"></path>
                                    <path d="m19.07 4.93-1.41 1.41"></path>
                                </svg>
                            </button>

                            <div id="selectThemeDropdown"
                                 class="hs-dropdown-menu hs-dropdown-open:opacity-100 mt-2 hidden z-10 transition-[margin,opacity] opacity-0 duration-300 mb-2 origin-bottom-left bg-white shadow-md rounded-lg p-1 space-y-0.5 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700"
                                 role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-dark-mode">
                                <button type="button"
                                        class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                        data-hs-theme-click-value="default">
                                    Default (Light)
                                </button>
                                <button type="button"
                                        class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                        data-hs-theme-click-value="dark">
                                    Dark
                                </button>
                                <button type="button"
                                        class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                        data-hs-theme-click-value="auto">
                                    Auto (System)
                                </button>
                            </div>
                        </div>

                        <!-- Giỏ hàng -->
                        <button type="button"
                                data-drawer-target="drawer-cart" data-drawer-show="drawer-cart"
                                aria-controls="drawer-cart"
                                data-drawer-placement="right" data-drawer-backdrop="false"
                                data-drawer-body-scrolling="true"
                                class="size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <span class="sr-only">Giỏ hàng</span>
                        </button>

                        <!-- Dropdown của user -->
                        <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                            <button id="hs-dropdown-account" type="button"
                                    class="size-[38px] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 focus:outline-none disabled:opacity-50 disabled:pointer-events-none dark:text-white"
                                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                                <i class="fas fa-user-circle text-2xl"></i>
                            </button>
                            @if(!empty($user))
                                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                                     role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-account">
                                    <div class="py-3 px-5 bg-gray-100 rounded-t-lg dark:bg-neutral-700">
                                        <p class="text-sm text-gray-500 dark:text-neutral-500">Đăng nhập với</p>
                                        <p class="text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            {{$user['email']}}
                                        </p>
                                    </div>
                                    <div class="p-1.5 space-y-0.5">
                                        <a  data-modal-target="order-modal" data-modal-toggle="order-modal"
                                                class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                           href="#">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                                 height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/>
                                                <path d="M3 6h18"/>
                                                <path d="M16 10a4 4 0 0 1-8 0"/>
                                            </svg>
                                            Đơn đặt hàng
                                        </a>
                                        <a data-modal-target="info-user-modal" data-modal-toggle="info-user-modal"
                                                class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                           href="#">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                                 height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                                <circle cx="9" cy="7" r="4"/>
                                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                            </svg>
                                            Thông tin khách hàng
                                        </a>

                                    </div>
                                </div>
                            @else

                                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                                     role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-account">
                                    <div class="py-3 px-5 bg-gray-100 rounded-t-lg dark:bg-neutral-700">
                                        <p class="text-sm text-gray-500 dark:text-neutral-500">Thông báo</p>
                                    </div>
                                    <div class="p-4">
                                        <p class="text-sm text-gray-800 dark:text-neutral-200">
                                            Mua hàng sẽ tự đăng nhập
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <!-- End Dropdown -->
                    </div>
                </div>
            </nav>
        </header>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        @include('partials.navbar.main_content')
        <!-- ========== END MAIN CONTENT ========== -->
    </div>

    @include('partials.navbar.drawer_cart')

</div>
