@props(['disabled' => false, 'size' => 'md'])

@switch($size)
    @case('sm')
        @php $class = "rounded-none rounded-e-lg bg-gray-50 text-xs border border-gray-500 focus:outline focus:outline-1 focus:outline-primary-600 focus:border-primary-600 block w-full p-2"; @endphp
        @break

    @case('md')
        @php $class = "rounded-none rounded-e-lg border border-gray-500 focus:outline focus:outline-1 focus:outline-primary-600 focus:border-primary-600 block w-full p-2.5"; @endphp
        @break

    @case('lg')
        @php $class = "rounded-none rounded-e-lg bg-gray-50 text-base border border-gray-500 focus:outline focus:outline-1 focus:outline-primary-600 focus:border-primary-600 block w-full p-4"; @endphp
        @break

    @default
        @php $class = ""; @endphp
        @break
@endswitch

<div class="flex">
    <span class="inline-flex items-center px-3 text-sm text-white bg-primary-600 border border-e-0 border-primary-600 rounded-s-md">
      {{ $slot }}
    </span>
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $class]) !!}>
</div>
