@props(['disabled' => false, 'message' => null])
@if ($disabled)
    @php
        $radioClass =
            "before:content[''] peer relative h-5 w-5 cursor-pointer rounded-full appearance-none border border-gray-500 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10";
        $labelClass = 'ms-2 text-sm font-medium text-gray-400 cursor-pointer';
    @endphp
@else
    @php
        $radioClass =
            "before:content[''] peer relative h-5 w-5 cursor-pointer rounded-full appearance-none border border-gray-500 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-gray-500 before:opacity-0 before:transition-opacity checked:border-primary-600 checked:bg-gray-100 checked:before:bg-gray-100 hover:before:opacity-10";
        $labelClass = 'ms-2 text-sm font-medium text-primary-600 cursor-pointer';
    @endphp
@endif
<div class="flex items-center">
    @if (!empty($message))
        <div class="flex items-end h-5">
            <label class="relative flex items-center p-1 rounded-full cursor-pointer" htmlFor="check">
                <input type="radio" {!! $attributes->merge(['class' => $radioClass]) !!} {{ $disabled ? 'disabled' : '' }}>
                <span
                    class="absolute text-primary-600 transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 16 16" fill="currentColor">
                        <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>
                    </svg>
                </span>
            </label>
        </div>
        <div class="text-sm">
            <label for="{{ $attributes->get('id') }}" class="{{ $labelClass }}">{{ $slot }}</label>
            <p id="helper-radio-text" class="ms-2 text-xs font-normal text-gray-500">{{ $message }}</p>
        </div>
    @else
        <label class="relative flex items-center p-1 rounded-full cursor-pointer" htmlFor="check">
            <input type="radio" {!! $attributes->merge(['class' => $radioClass]) !!}>
            <span
                class="absolute text-primary-600 transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 16 16" fill="currentColor">
                    <circle data-name="ellipse" cx="8" cy="8" r="8"></circle>
                </svg>
            </span>
        </label>
        <label for="{{ $attributes->get('id') }}" class="{{ $labelClass }}">{{ $slot }}</label>
    @endif
</div>
