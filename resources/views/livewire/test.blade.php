<div>
    <div x-data="{ message: @entangle('message') }">
        <h1 x-text="message" class="text-xl font-bold mb-4"></h1>
        <button @click="message = 'Hello from Alpine.js!'" class="bg-blue-500 text-white px-4 py-2 rounded">
            Update via Alpine.js
        </button>
    </div>
</div>
