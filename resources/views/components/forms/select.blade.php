@props(['disabled' => false, 'size' => 'md'])

@switch($size)
    @case('sm')
        @php $class = "block w-full p-2 text-base text-black border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-600 focus:border-primary-600"; @endphp
        @break

    @case('md')
        @php $class = "block w-full p-2.5 text-base text-black border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-600 focus:border-primary-600"; @endphp
        @break

    @case('lg')
        @php $class = "block w-full px-4 py-3 text-base text-black border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-600 focus:border-primary-600"; @endphp
        @break

    @default
        @php $class = ""; @endphp
        @break
@endswitch
<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $class]) !!}>
    {{ $slot }}
</select>
