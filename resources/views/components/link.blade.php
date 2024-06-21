@props(['disabled' => false, 'link_type' => 'primary'])
@switch($link_type)
    @case('primary')
        @php $class = "select-none rounded-lg bg-gradient-to-r from-primary-400 to-primary-800 py-2 px-4 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 hover:bg-gradient-to-r hover:from-primary-800 hover:to-primary-800 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"; @endphp
        @break

    @case('secondary')
        @php $class = ""; @endphp
        @break

    @case('outline')
        @php $class = "select-none rounded-lg bg-white border-2 border-primary-600 py-2 px-4 text-center align-middle font-sans text-sm font-bold uppercase text-primary-600 shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:text-white hover:shadow-gray-900/20 hover:bg-primary-600 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"; @endphp
        @break

    @case('tag')
        @php $class = "select-none rounded-lg bg-primary-600 border-2 border-primary-600 py-1 px-1 text-center align-middle font-sans text-sm font-bold text-white shadow-md shadow-gray-900/10 transition-all active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"; @endphp
        @break

    @case('outline-tag')
        @php $class = "select-none rounded-lg bg-white border-2 border-primary-600 py-1 px-1 text-center align-middle font-sans text-sm font-bold text-primary-600 shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:text-white hover:shadow-gray-900/20 hover:bg-primary-600 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"; @endphp
        @break

    @case('transparent')
        @php $class = "px-4 py-2 font-sans text-md font-bold text-center text-primary-600 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 hover:bg-secondary-100 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"; @endphp
        @break

    @default
        @php $class = ""; @endphp
        @break

@endswitch
<a  {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => $class]) }}>
    <span>{{ $slot }}</span>
</a>
