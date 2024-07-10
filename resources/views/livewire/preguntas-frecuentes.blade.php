<div class="container max-w-7xl mx-auto p-4">
    <h2 class="w-full text-4xl text-black text-center font-bold mb-4">
        Preguntas Frecuentes
    </h2>
    <p class="w-full max-w-4xl text-lg text-gray-600 text-left font-normal m-auto">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum praesentium soluta esse optio, ullam
        commodi culpa minima sit tempora aliquid, ut molestias quibusdam. Commodi dignissimos molestiae ipsa
        magni impedit provident.
    </p>
    @if ($preguntas->count())
    <div id="accordion-open" class="mt-8 w-full max-w-4xl mx-auto" x-data="{ openPanel: null }">
        @foreach ($preguntas as $index => $pregunta)
        @php
            $class = $index == $preguntas->count() - 1? 'flex items-center justify-between w-full p-5 font-medium rtl:text-right text-primary-600 border border-primary-600 hover:bg-primary-600 hover:text-white gap-3' : 'flex items-center justify-between w-full p-5 font-medium rtl:text-right text-primary-600 border border-b-0 border-primary-600 hover:bg-primary-600 hover:text-white gap-3'
        @endphp
        <h2 id="accordion-open-heading-{{$pregunta->id}}" wire:key='faq-heading-{{$pregunta->id}}'>
            <button type="button"
                :class="openPanel === {{ $index }} ? 'flex items-center justify-between w-full p-5 font-medium rtl:text-right text-white bg-primary-600 border border-b-0 border-primary-600 hover:bg-primary-700 hover:border-primary-700 gap-3' : '{{ $class }}'"
                x-on:click="openPanel === {{ $index }} ? openPanel = null : openPanel = {{ $index }}">
                <span class="flex items-center">
                    <svg class="w-5 h-5 me-2 shrink-0" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"></path>
                    </svg> {{$pregunta->pregunta}}
                </span>
                <svg data-accordion-icon :class="openPanel !== {{ $index }} ? 'w-3 h-3 rotate-180 shrink-0' : 'w-3 h-3 shrink-0'" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-open-body-{{$pregunta->id}}" wire:key='faq-body-{{$pregunta->id}}' x-transition x-show="openPanel === {{ $index }}" x-collapse>
            <div class="p-5 border border-primary-600 mb-4">
                <p class="mb-2 text-gray-600">{{$pregunta->respuesta}}</p>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div id="accordion-open" class="mt-8 w-full max-w-4xl mx-auto" x-data="{ open1: false, open2: false, open3: false }">
        <h2 id="accordion-open-heading-1">
            <button type="button"
                :class="open1 ? 'flex items-center justify-between w-full p-5 font-medium rtl:text-right text-white bg-primary-600 border border-b-0 border-primary-600 hover:bg-primary-700 hover:border-primary-700 gap-3' : 'flex items-center justify-between w-full p-5 font-medium rtl:text-right text-primary-600 border border-b-0 border-primary-600 hover:bg-primary-600 hover:text-white gap-3'"
                x-on:click="open1 = !open1; open2 = false; open3 = false">
                <span class="flex items-center">
                    <svg class="w-5 h-5 me-2 shrink-0" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"></path>
                    </svg> ¿Pregunta 1?
                </span>
                <svg data-accordion-icon :class="!open1 ? 'w-3 h-3 rotate-180 shrink-0' : 'w-3 h-3 shrink-0'" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-open-body-1" x-transition x-ref="body1" x-show="open1" x-collapse>
            <div class="p-5 border border-primary-600 mb-4">
                <p class="mb-2 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, optio eaque placeat quasi sunt soluta unde. Maxime itaque qui architecto in asperiores possimus repellendus explicabo, recusandae dolore, consequatur iusto officiis.</p>
            </div>
        </div>
        <h2 id="accordion-open-heading-2">
            <button type="button"
                :class="open2 ? 'flex items-center justify-between w-full p-5 font-medium rtl:text-right text-white bg-primary-600 border border-b-0 border-primary-600 hover:bg-primary-700 hover:border-primary-700 gap-3' : 'flex items-center justify-between w-full p-5 font-medium rtl:text-right text-primary-600 border border-b-0 border-primary-600 hover:bg-primary-600 hover:text-white gap-3'"
                x-on:click="open2 = !open2; open1 = false; open3 = false">
                <span class="flex items-center">
                    <svg class="w-5 h-5 me-2 shrink-0" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"></path>
                    </svg>
                    ¿Pregunta 2?
                </span>
                <svg data-accordion-icon :class="!open2 ? 'w-3 h-3 rotate-180 shrink-0' : 'w-3 h-3 shrink-0'" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-open-body-2" x-transition x-ref="body2" x-show="open2" x-collapse>
            <div class="p-5 border border-primary-600 mb-4">
                <p class="mb-2 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab in fugit sed quis accusantium veniam tempore? Inventore ipsum beatae iste iusto incidunt ut, facilis, placeat nobis in natus error eius.</p>
            </div>
        </div>
        <h2 id="accordion-open-heading-3">
            <button type="button"
                :class="open3 ? 'flex items-center justify-between w-full p-5 font-medium rtl:text-right text-white bg-primary-600 border border-b-0 border-primary-600 hover:bg-primary-700 hover:border-primary-700 gap-3' : 'flex items-center justify-between w-full p-5 font-medium rtl:text-right text-primary-600 border border-primary-600 hover:bg-primary-600 hover:text-white gap-3'"
                x-on:click="open3 = !open3; open2 = false; open1 = false">
                <span class="flex items-center">
                    <svg class="w-5 h-5 me-2 shrink-0" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                            clip-rule="evenodd"></path>
                    </svg>
                    ¿Pregunta 3?
                </span>
                <svg data-accordion-icon :class="!open3 ? 'w-3 h-3 rotate-180 shrink-0' : 'w-3 h-3 shrink-0'" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-open-body-3" x-transition x-ref="body3" x-show="open3" x-collapse>
            <div class="p-5 border border-primary-600 mb-4">
                <p class="mb-2 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis quaerat facilis eius explicabo earum illum molestiae officiis vero ipsam a molestias architecto nemo voluptates expedita beatae, harum dolorem commodi tempora.</p>
            </div>
        </div>
    </div>
    @endif
</div>
