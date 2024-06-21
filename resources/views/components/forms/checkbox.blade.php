@props(['disabled' => false, 'message' => null])
@if ($disabled)
    @php
        $checkboxClass = "before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-gray-500 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10";
        $labelClass = 'ms-1 text-sm font-medium text-gray-400 cursor-pointer';
    @endphp
@else
    @php
        $checkboxClass = "before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-gray-500 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-gray-500 before:opacity-0 before:transition-opacity checked:border-primary-600 checked:bg-primary-600 checked:before:bg-primary-600 hover:before:opacity-10";
        $labelClass = 'ms-1 text-sm font-medium text-black cursor-pointer';
    @endphp
@endif
<div class="flex items-center">
    @if (!empty($message))
        <div class="flex items-end h-5">
            <label class="relative flex items-center p-1 rounded-full cursor-pointer" htmlFor="check">
                <input type="checkbox" {!! $attributes->merge(['class' => $checkboxClass]) !!} {{ $disabled ? 'disabled' : '' }}>
                <span
                    class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
                        stroke="currentColor" stroke-width="1">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </span>
            </label>
        </div>
        <div class="text-sm">
            <label for="{{ $attributes->get('id') }}" class="{{ $labelClass }}">{{ $slot }}</label>
            <p id="helper-checkbox-text" class="ms-2 text-xs font-normal text-gray-500">{{ $message }}</p>
        </div>
    @else
        <label class="relative flex items-center p-1 rounded-full cursor-pointer" htmlFor="check">
            <input type="checkbox" {!! $attributes->merge(['class' => $checkboxClass]) !!}>
            <span
                class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
                    stroke="currentColor" stroke-width="1">
                    <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </span>
        </label>
        <label for="{{ $attributes->get('id') }}" class="{{ $labelClass }}">{{ $slot }}</label>
    @endif
</div>
