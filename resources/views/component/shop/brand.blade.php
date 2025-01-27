@php
    $brands =  \App\Models\Brand::all();
@endphp

<!-- Card Section -->
<div class="max-w-7xl  px-4 py-0 sm:px-6 lg:px-8 lg:py-1 mx-auto">
    <!-- Grid -->
    <!-- Tiêu đề -->
    <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Thương Hiệu</h2>
        <p class="mt-1 text-gray-600 dark:text-neutral-400">Chọn các thương hiệu phù hợp với mục tiêu của bạn.</p>
    </div>
    <!-- Kết thúc Tiêu đ�� -->
    <!-- Phần Thẻ -->
    <div class="max-w-[85rem] px-4 py-1 sm:px-6 lg:px-8 lg:py-2 mx-auto">
        <!-- Lưới -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6">
            @foreach($brands as $brand)
                <!-- Thẻ -->
                <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md focus:outline-none focus:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800"
                   href="{{route('shop.catfilter')}}?brand={{$brand->name}}">
                    <div class="p-4 md:p-5">
                        <div class="flex justify-between items-center gap-x-3">
                            <div class="grow">
                                <div class="flex items-center gap-x-3">
                                    <img class="size-[38px] rounded-full" src="{{env('ASSET_URL')}}/storage/{{ $brand->logo }}"
                                         alt="Logo Ray-Ban">
                                    <div class="grow">
                                        <h3 class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:text-neutral-200">
                                            {{ $brand->name }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <svg class="shrink-0 size-5 text-gray-800 dark:text-neutral-200"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- Kết thúc Thẻ -->
            @endforeach


            <!-- End Grid -->
        </div>
        <!-- End Card Section -->
    </div>
</div>