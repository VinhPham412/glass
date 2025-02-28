<!DOCTYPE html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @filamentStyles
    @vite('resources/css/app.css')
</head>


<body class="antialiased">
<livewire:navbar>


    <main class="px-4">
        @yield('content')
    </main>


@include('component.shop.footer')
@include('component.shop.speedial')


@livewire('notifications')
@vite('resources/js/app.js')
@filamentScripts

</body>
</html>