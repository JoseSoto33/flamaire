<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    @if (isset($meta_title) && !empty($meta_title))
        <meta name="title" content="{{ $meta_title }}">
    @elseif (isset($defaults) &&
            isset($defaults['defaultText'][$defaults['page_defaults'] . '_meta_title']) &&
            !empty($defaults['defaultText'][$defaults['page_defaults'] . '_meta_title']))
        <meta name="title" content="{{ $defaults['defaultText'][$defaults['page_defaults'] . '_meta_title'] }}">
    @endif

    @if (isset($meta_description) && !empty($meta_description))
        <meta name="description" content="{{ $meta_description }}">
    @elseif (isset($defaults) &&
            isset($defaults['defaultText'][$defaults['page_defaults'] . '_meta_description']) &&
            !empty($defaults['defaultText'][$defaults['page_defaults'] . '_meta_description']))
        <meta name="description" content="{{ $defaults['defaultText'][$defaults['page_defaults'] . '_meta_description'] }}">
    @endif
    
    <title>@yield('title')@if (
        (!isset($defaults['defaultText']) ||
            (isset($defaults['defaultText']) &&
                isset($defaults['page_defaults']) &&
                (!isset($defaults['defaultText'][$defaults['page_defaults'] . '_titulo_pestania']) ||
                    empty($defaults['defaultText'][$defaults['page_defaults'] . '_titulo_pestania'])))) &&
            (!isset($title) && empty($title)))
            - {{ config('app.name') }}
        @endif
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ open: false }" :class="open? 'overflow-hidden' : ''">
    <x-template.header :defaults="$defaults"></x-template.header>
    {{ $slot }}
    <x-template.footer></x-template.footer>
    @livewireScripts
    @stack('js')
</body>

</html>
