@props([
    'disabled' => false,
    'min' => 1,
    'max' => 1000,
    'minValue' => 0,
    'maxValue' => 1000,
    'nombre1' => 'nombre1',
    'nombre2' => 'nombre2',
    'currency' => "$"
])

<div class="relative flex justify-center items-center">
    <div x-data="range()" x-init="mintrigger();
    maxtrigger()" class="relative max-w-xl w-full">
        <div class="w-full relative flex justify-between items-center">
            <div class="text-black flex flex-col font-sans text-sm">
                <span class="text-center font-semibold">Min</span>
                <span class="text-center">
                    {{ $currency }}<span id="display-{{$nombre1}}" class="text-center" x-text="minprice">{{$minValue }}</span>
                </span>
            </div>
            <div class="text-black flex flex-col font-sans text-sm">
                <span class="text-center font-semibold">Max</span>
                <span class="text-center">
                    {{ $currency }}<span id="display-{{$nombre2}}" class="text-center" x-text="maxprice">{{$maxValue }}</span>
                </span>
            </div>
        </div>
        <div class="relative w-full h-4 mt-2 flex items-center justify-center">
            <div class="slider-track"
            x-bind:style="'background: linear-gradient(to right, rgb(225, 229, 238) ' + minthumb + '%, rgb(153, 21, 124) ' + minthumb + '%, rgb(153, 21, 124) ' + (100 - maxthumb) + '%, rgb(225, 229, 238) ' + (100 - maxthumb) + '%)'"></div>

            <input class="input_range" type="range" name="{{$nombre1}}" step="1" x-bind:min="{{$min}}" x-bind:max="{{$max}}"
                x-on:input="mintrigger" x-model="minprice" value="{{$minValue}}">

            <input class="input_range" type="range" name="{{$nombre2}}" step="1" x-bind:min="{{$min}}" x-bind:max="{{$max}}"
                x-on:input="maxtrigger" x-model="maxprice" value="{{$maxValue}}">
        </div>
    </div>

    @push('js')
        <script>
            function range() {
                return {
                    minprice: {{$minValue}},
                    maxprice: {{$maxValue}},
                    min: {{$min}},
                    max: {{$max}},
                    minthumb: 0,
                    maxthumb: 0,

                    mintrigger() {
                        this.minprice = Math.min(this.minprice, this.maxprice);
                        this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
                    },

                    maxtrigger() {
                        this.maxprice = Math.max(this.maxprice, this.minprice);
                        this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);
                    },
                }
            }
        </script>
    @endpush
</div>
