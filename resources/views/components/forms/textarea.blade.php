@props(['disabled' => false])
<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['rows' => 4, 'class' => "block p-2.5 w-full text-sm text-black bg-gray-50 rounded-lg border border-gray-300 focus:outline focus:outline-1 focus:outline-primary-600 focus:border-primary-600"]) !!}>{{$slot}}</textarea>
