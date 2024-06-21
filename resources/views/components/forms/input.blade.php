@props(['disabled' => false, 'size' => 'md'])

@switch($size)
    @case('sm')
        @php $class = "block w-full p-2 text-black border border-gray-500 rounded-lg bg-gray-50 text-xs focus:outline focus:outline-1 focus:outline-primary-600 focus:border-primary-600"; @endphp
        @break

    @case('md')
        @php $class = "bg-gray-50 border border-gray-500 text-black text-sm rounded-lg focus:outline focus:outline-1 focus:outline-primary-600 focus:border-primary-600 block w-full p-2.5"; @endphp
        @break

    @case('lg')
        @php $class = "block w-full p-4 text-black border border-gray-500 rounded-lg bg-gray-50 text-base focus:outline focus:outline-1 focus:outline-primary-600 focus:border-primary-600"; @endphp
        @break

    @default
        @php $class = ""; @endphp
        @break
@endswitch
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $class]) !!}>
