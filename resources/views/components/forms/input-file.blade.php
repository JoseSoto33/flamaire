@props(['disabled' => false, 'size' => 'md'])

@switch($size)
    @case('sm')
        @php 
            $class = "w-full flex flex-wrap items-center justified-center text-black border-0 rounded-lg bg-gray-50 text-xs focus:outline focus:outline-1 focus:outline-primary-600 focus:border-primary-600"; 
            $p_button = "py-2 px-6 text-xs";
            $p_text = "p-2 text-xs";
        @endphp
        @break

    @case('md')
        @php 
            $class = "w-full flex flex-wrap items-center justified-center text-black border-0 rounded-lg bg-gray-50 text-sm focus:outline focus:outline-1 focus:outline-primary-600 focus:border-primary-600 "; 
            $p_button = "py-2.5 px-6 text-sm";
            $p_text = "p-2.5 text-sm";
        @endphp
        @break

    @case('lg')
        @php 
            $class = "w-full flex flex-wrap items-center justified-center text-black border-0 rounded-lg bg-gray-50 text-base focus:outline focus:outline-1 focus:outline-primary-600 focus:border-primary-600"; 
            $p_button = "py-4 px-6 text-base";
            $p_text = "p-4 text-base";
        @endphp
        @break

    @default
        @php 
            $class = ""; 
            $p_button = "";
            $p_text = "";
        @endphp
        @break
@endswitch
<label for="{{ $attributes->get('id') }}" class="{{$class}}"
    x-data="{ uploading: false, progress: 0 }"
    x-on:livewire-upload-start="uploading = true"
    x-on:livewire-upload-finish="uploading = false"
    x-on:livewire-upload-cancel="uploading = false"
    x-on:livewire-upload-error="uploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
    >
    <div class="w-full flex items-center justified-center">
        <span class="bg-primary-600 rounded-s-lg text-white border border-primary-600 cursor-pointer {{$p_button}} hover:bg-primary-800" type="button">Examinar</span>
        <span class="flex flex-1 flex-nowrap text-nowrap rounded-e-lg border border-gray-500 border-l-0 cursor-pointer truncate text-ellipsis overflow-hidden {{$p_text}}">{{$slot}}</span>
    </div>
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'hidden']) !!} type="file" accept="image/*">
    <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2" x-show="uploading">
        <div class="bg-primary-600 h-2.5 rounded-full" x-bind:style="'width: ' + progress + '%'"></div>
    </div>
</label>