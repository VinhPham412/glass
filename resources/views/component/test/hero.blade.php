<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix Clone</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white">
<header class="py-4 px-6 lg:px-16 flex justify-between items-center">
    <img src="https://robohash.org/netflix_logo" alt="Netflix" class="w-24 lg:w-32">
    <div class="flex space-x-4">
        <select class="bg-black border border-white rounded px-2 py-1">
            <option>English</option>
            <option>Tiếng Việt</option>
        </select>
        <button class="bg-red-600 px-4 py-1 rounded">Sign In</button>
    </div>
</header>

<main class="px-6 lg:px-16">
    <section class="py-12 lg:py-24 text-center">
        <h1 class="text-4xl lg:text-5xl font-bold mb-4">Unlimited Movies, TV Shows and More.</h1>
        <p class="text-xl lg:text-2xl mb-6">Watch anywhere. Cancel anytime.</p>
        <p class="text-lg mb-4">Ready to watch? Enter your email to create or restart your membership.</p>
        <div class="flex flex-col lg:flex-row justify-center items-center space-y-4 lg:space-y-0 lg:space-x-2">
            <input type="email" placeholder="Email address" class="w-full lg:w-96 px-4 py-3 text-black">
            <button class="bg-red-600 px-6 py-3 text-xl">Get Started ></button>
        </div>
    </section>

    <section class="py-12 border-t border-gray-800">
        <div class="flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2 mb-8 lg:mb-0">
                <h2 class="text-3xl lg:text-5xl font-bold mb-4">Enjoy on your TV.</h2>
                <p class="text-xl">Watch on Smart TVs, Playstation, Xbox, Chromecast, Apple TV, Blu-ray players, and more.</p>
            </div>
            <div class="lg:w-1/2">
                <img src="https://robohash.org/tv_device" alt="TV Device" class="w-full">
            </div>
        </div>
    </section>

    <section class="py-12 border-t border-gray-800">
        <div class="flex flex-col lg:flex-row-reverse items-center">
            <div class="lg:w-1/2 mb-8 lg:mb-0">
                <h2 class="text-3xl lg:text-5xl font-bold mb-4">Download your shows to watch offline.</h2>
                <p class="text-xl">Save your favorites easily and always have something to watch.</p>
            </div>
            <div class="lg:w-1/2">
                <img src="https://robohash.org/mobile_device" alt="Mobile Device" class="w-full">
            </div>
        </div>
    </section>

    <section class="py-12 border-t border-gray-800">
        <div class="flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2 mb-8 lg:mb-0">
                <h2 class="text-3xl lg:text-5xl font-bold mb-4">Watch everywhere.</h2>
                <p class="text-xl">Stream unlimited movies and TV shows on your phone, tablet, laptop, and TV.</p>
            </div>
            <div class="lg:w-1/2">
                <img src="https://robohash.org/devices" alt="Multiple Devices" class="w-full">
            </div>
        </div>
    </section>

    <section class="py-12 border-t border-gray-800">
        <div class="flex flex-col lg:flex-row-reverse items-center">
            <div class="lg:w-1/2 mb-8 lg:mb-0">
                <h2 class="text-3xl lg:text-5xl font-bold mb-4">Create profiles for children.</h2>
                <p class="text-xl">Send children on adventures with their favorite characters in a space made just for them—free with your membership.</p>
            </div>
            <div class="lg:w-1/2">
                <img src="https://robohash.org/kids_profile" alt="Kids Profile" class="w-full">
            </div>
        </div>
    </section>

    <section class="py-12 border-t border-gray-800">
        <h2 class="text-3xl lg:text-5xl font-bold mb-8 text-center">Frequently Asked Questions</h2>
        <div class="space-y-4">
            <div class="border border-gray-700">
                <button class="w-full text-left p-4 flex justify-between items-center">
                    <span>What is Netflix?</span>
                    <span class="text-2xl">+</span>
                </button>
            </div>
            <div class="border border-gray-700">
                <button class="w-full text-left p-4 flex justify-between items-center">
                    <span>How much does Netflix cost?</span>
                    <span class="text-2xl">+</span>
                </button>
            </div>
            <div class="border border-gray-700">
                <button class="w-full text-left p-4 flex justify-between items-center">
                    <span>Where can I watch?</span>
                    <span class="text-2xl">+</span>
                </button>
            </div>
            <div class="border border-gray-700">
                <button class="w-full text-left p-4 flex justify-between items-center">
                    <span>How do I cancel?</span>
                    <span class="text-2xl">+</span>
                </button>
            </div>
        </div>
        <p class="text-center mt-8 mb-4">Ready to watch? Enter your email to create or restart your membership.</p>
        <div class="flex flex-col lg:flex-row justify-center items-center space-y-4 lg:space-y-0 lg:space-x-2">
            <input type="email" placeholder="Email address" class="w-full lg:w-96 px-4 py-3 text-black">
            <button class="bg-red-600 px-6 py-3 text-xl">Get Started ></button>
        </div>
    </section>
</main>

<footer class="py-8 px-6 lg:px-16 border-t border-gray-800 mt-12">
    <p class="mb-4">Questions? Call 1-800-123-4567</p>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <ul class="space-y-2">
            <li><a href="#" class="hover:underline">FAQ</a></li>
            <li><a href="#" class="hover:underline">Investor Relations</a></li>
            <li><a href="#" class="hover:underline">Privacy</a></li>
            <li><a href="#" class="hover:underline">Speed Test</a></li>
        </ul>
        <ul class="space-y-2">
            <li><a href="#" class="hover:underline">Help Center</a></li>
            <li><a href="#" class="hover:underline">Jobs</a></li>
            <li><a href="#" class="hover:underline">Cookie Preferences</a></li>
            <li><a href="#" class="hover:underline">Legal Notices</a></li>
        </ul>
        <ul class="space-y-2">
            <li><a href="#" class="hover:underline">Account</a></li>
            <li><a href="#" class="hover:underline">Ways to Watch</a></li>
            <li><a href="#" class="hover:underline">Corporate Information</a></li>
            <li><a href="#" class="hover:underline">Only on Netflix</a></li>
        </ul>
        <ul class="space-y-2">
            <li><a href="#" class="hover:underline">Media Center</a></li>
            <li><a href="#" class="hover:underline">Terms of Use</a></li>
            <li><a href="#" class="hover:underline">Contact Us</a></li>
        </ul>
    </div>
    <div class="mt-8">
        <select class="bg-black border border-white rounded px-2 py-1">
            <option>English</option>
            <option>Tiếng Việt</option>
        </select>
    </div>
    <p class="mt-4">Netflix Vietnam</p>
</footer>
</body>
</html>