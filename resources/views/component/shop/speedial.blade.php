<div data-dial-init class="fixed end-6 bottom-6 group z-40">
    <div id="speed-dial-menu-default" class="flex flex-col items-center hidden mb-4 space-y-2">
        <!-- Scroll to Top Button with Smooth Animation -->
        <button type="button" id="scrollToTopBtn" data-tooltip-target="tooltip-scroll-top" data-tooltip-placement="left" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400 transition-all duration-300 ease-in-out hover:scale-110">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Scroll to Top</span>
        </button>
        <div id="tooltip-scroll-top" role="tooltip" class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Cuộn lên đầu trang
            <div class="tooltip-arrow" data-popper-arrow></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var scrollToTopBtn = document.getElementById("scrollToTopBtn");

    scrollToTopBtn.addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });

    // Show/hide button based on scroll position
    window.addEventListener("scroll", function() {
        if (window.pageYOffset > 100) {
            scrollToTopBtn.style.opacity = "1";
            scrollToTopBtn.style.transform = "translateY(0)";
        } else {
            scrollToTopBtn.style.opacity = "0";
            scrollToTopBtn.style.transform = "translateY(20px)";
        }
    });
});
</script>

<style>
#scrollToTopBtn {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.3s, transform 0.3s;
}
</style>
        </div>

        <!-- Zalo Button -->
        <a href="https://zalo.me/your_zalo_id" target="_blank" data-tooltip-target="tooltip-zalo" data-tooltip-placement="left" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.49 10.272v1.745h-1.735v3.722h1.735v1.745h-1.735v3.722h-1.745V10.272h3.48zM12.49 5.087c3.862 0 7.088 2.86 7.088 6.453 0 3.593-3.226 6.454-7.088 6.454-3.862 0-7.088-2.86-7.088-6.454 0-3.592 3.226-6.453 7.088-6.453zm0-1.745C7.766 3.342 3.912 6.796 3.912 11.54c0 4.744 3.854 8.198 8.578 8.198 4.724 0 8.578-3.454 8.578-8.198 0-4.744-3.854-8.198-8.578-8.198z"/>
            </svg>
            <span class="sr-only">Zalo</span>
        </a>
        <div id="tooltip-zalo" role="tooltip" class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Zalo
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <!-- Messenger Button -->
        <a href="https://m.me/your_facebook_page_id" target="_blank" data-tooltip-target="tooltip-messenger" data-tooltip-placement="left" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.36 2 2 6.13 2 11.7c0 2.91 1.19 5.44 3.14 7.17.16.14.26.39.24.63l-.05 1.97c-.02.55.41 1.02.97.98l2.2-.17c.18-.01.36.04.52.13 1.08.57 2.3.89 3.58.89 5.64 0 10-4.13 10-9.7C22 6.13 17.64 2 12 2zm1.13 12.89l-2.47-2.64-4.32 2.64 4.75-5.05 2.53 2.64 4.26-2.64-4.75 5.05z"/>
            </svg>
            <span class="sr-only">Messenger</span>
        </a>
        <div id="tooltip-messenger" role="tooltip" class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Messenger
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>

        <!-- Phone Button -->
        <a href="tel:+1234567890" data-tooltip-target="tooltip-phone" data-tooltip-placement="left" class="flex justify-center items-center w-[52px] h-[52px] text-gray-500 hover:text-gray-900 bg-white rounded-full border border-gray-200 dark:border-gray-600 shadow-sm dark:hover:text-white dark:text-gray-400 hover:bg-gray-50 dark:bg-gray-700 dark:hover:bg-gray-600 focus:ring-4 focus:ring-gray-300 focus:outline-none dark:focus:ring-gray-400">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
            </svg>
            <span class="sr-only">Phone</span>
        </a>
        <div id="tooltip-phone" role="tooltip" class="absolute z-10 invisible inline-block w-auto px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Call Us
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </div>
    <button type="button" data-dial-toggle="speed-dial-menu-default" aria-controls="speed-dial-menu-default" aria-expanded="false" class="flex items-center justify-center text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
        <svg class="w-5 h-5 transition-transform group-hover:rotate-45" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
        </svg>
        <span class="sr-only">Open actions menu</span>
    </button>
</div>