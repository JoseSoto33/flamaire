@props(['disabled' => false, 'type' => 'button', 'btn_type' => 'primary', 'size' => 'md', 'full' => false])
@php $class = ""; @endphp
@switch($size)
    @case('xs')
        @php $class .= "px-1 py-1.5 text-xs "; @endphp
        @break

    @case('sm')
        @php $class .= "px-2.5 py-2 text-sm "; @endphp
        @break

    @case('md')
        @php $class .= "px-4 py-2.5 "; @endphp
        @break

    @case('lg')
        @php $class .= "px-5.5 py-3 text-lg "; @endphp
        @break

    @case('xl')
        @php $class .= "px-7 py-3.5 text-xl "; @endphp
        @break

    @default
        @php $class .= ""; @endphp
        @break
@endswitch

@if ($full)
    @php $class .= "w-full "; @endphp
@endif

@switch($btn_type)
    @case('primary')
        @php $class .= "select-none rounded-lg bg-gradient-to-r from-primary-400 to-primary-800 text-center align-middle font-sans font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 hover:bg-gradient-to-r hover:from-primary-800 hover:to-primary-800 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"; @endphp
        @break

    @case('secondary')
        @php $class .= "select-none rounded-lg bg-primary-600 border-2 border-primary-600 box-border text-center align-middle font-sans font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:border-primary-800 hover:shadow-gray-900/20 hover:bg-primary-800 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"; @endphp
        @break

    @case('outline')
        @php $class .= "select-none rounded-lg bg-white border-2 box-border border-primary-600 text-center align-middle font-sans font-bold uppercase text-primary-600 shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:text-white hover:shadow-gray-900/20 hover:bg-primary-600 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"; @endphp
        @break

    @case('transparent')
        @php $class .= "font-sans font-bold bg-white text-center text-primary-600 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"; @endphp
        @break

    @default
        @php $class .= ""; @endphp
        @break
@endswitch

<button  {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['type' => $type, 'class' => $class]) }}>
    <span>{{ $slot }}</span>
</button>
