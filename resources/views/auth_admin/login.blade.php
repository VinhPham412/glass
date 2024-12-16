@extends('layouts.auth_admin')

@section('content')
    {{-- form đăng nhập --}}
    {{-- tạo quick session trong ->with('error') --}}
    @if (session('error'))
        <div class="bg-red-500 p-4 text-white text-center mb-6">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-500 p-4 text-white text-center mb-6">
            {{ session('success') }}
        </div>
    @endif


    <div class="bg-gradient-to-r from-teal-400 to-purple-500 h-screen font-sans">
        <div class="container mx-auto h-full flex justify-center items-center">
            <div class="bg-white p-8 rounded-xl shadow-lg w-100 space-y-4">
                <h1 class="text-3xl font-bold text-center text-gray-600 mb-5">Welcome to Glass Store!</h1>
                <form action="{{route('admin.process_login')}}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-500 mb-2">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 p-2 w-full border rounded-md focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                    </div>
    
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-500 mb-2">Password</label>
                        <input type="password" name="password" id="password" class="mt-1 p-2 w-full border rounded-md focus:border-blue-500 focus:ring-1 focus:ring-blue-500" required>
                    </div>
    
                    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring-2 focus:ring-blue-200 active:bg-blue-700 transition duration-150 ease-in-out">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
