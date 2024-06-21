@props(['disabled' => false, 'message' => null])
<div>
    <input type="radio" {!! $attributes->merge(['class' => "hidden peer"]) !!} {{ $disabled ? 'disabled' : '' }}>
    <label for="{{ $attributes->get('id') }}" class="inline-flex items-center justify-between w-full font-semibold text-sm py-1 px-2 text-primary-600 bg-white border-2 border-primary-600 rounded-lg cursor-pointer peer-checked:bg-primary-600 hover:text-white peer-checked:text-white hover:bg-primary-600">
        {{ $slot }}
    </label>
</div>
