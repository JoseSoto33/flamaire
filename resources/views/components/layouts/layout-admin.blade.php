<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- <title>{{ config('app.name', 'Laravel') . ' | ' . $title ?? config('app.name', 'Laravel') }}</title> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ sidebar: window.visualViewport.width >= 680, modalShow: false, modalAdd: false, modalEdit: false, modalDelete: false }" 
    {{-- class="bg-primary-600" --}}
    :class="modalShow || modalAdd || modalEdit || modalDelete? 'overflow-hidden bg-primary-600' : 'bg-primary-600'"
    >    
    <x-admin.sidebar></x-admin.sidebar>
    <div class="my-4 rounded-s-lg bg-white min-h-screen ml-16 sm:ml-64">
        {{ $slot }}
    </div>
    <x-admin.footer></x-admin.footer>
    @livewireScripts
    @stack('js')
</body>

</html>
