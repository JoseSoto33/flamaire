<x-layouts.layout>
    <section id="landing" x-ref="landing" class="w-full bg-gradient-to-b from-tertiary from-40% via-primary-600 via-60% to-primary-500 to-90% py-16 flex items-center justify-center md:py-36">
        <div class="container max-w-7xl mx-auto p-4">
            <h2 class="w-full max-w-4xl text-5xl text-white text-center font-bold mb-4 mx-auto max-sm:text-3xl max-md:text-4xl">
                Descubre Tu Próxima Aventura Íntima
            </h2>
            <p class="w-full max-w-xl text-lg text-white text-center font-normal m-auto">
                Únete a nuestra comunidad y comienza a disfrutar de citas inolvidables hoy mismo.
            </p>
            @if (!Auth::check())
            <div class="flex flex-wrap items-center justify-center gap-4 mt-4">
                <a href="{{ route('login') }}/" wire:navigate.hover class="leading-normal px-5 py-3 border-collapse rounded-lg bg-white text-center text-lg font-semibold hover:bg-gray-200 text-tertiary">
                    Iniciar Sesión
                </a>
                <a href="#" wire:navigate.hover class="leading-6 flex items-end justify-center gap-1 px-5 py-3 border-collapse rounded-xl text-white text-center text-lg font-semibold hover:text-gray-200">
                    Registrarse
                    <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                    </svg>
                </a>
            </div>
            @endif
            <h3 class="w-full max-w-4xl text-2xl text-white mt-14 mx-auto">Encuentra el anuncio que deseas</h3>
            <div class="w-full max-w-4xl p-2 rounded-lg bg-white mt-2 mx-auto">
                <form class="w-full flex items-center justify-between max-sm:flex-wrap" action="#" method="post">
                    <div class="flex gap-2 border-r border-r-primary-600 pr-6 max-sm:w-full max-sm:border-none max-sm:px-0 max-sm:mb-1">
                        <x-forms.checkbox name="genero" id="hombre" valor="hombre">Hombre</x-forms.checkbox>
                        <x-forms.checkbox name="genero" id="mujer" valor="mujer">Mujer</x-forms.checkbox>
                        <x-forms.checkbox name="genero" id="trans" valor="trans">Trans</x-forms.checkbox>
                    </div>
                    <div class="flex flex-1 pl-6 pr-2 max-sm:pr-1 max-sm:pl-0">
                        <x-forms.input name="buscar" placeholder="¿Qué buscas?" class="w-full"></x-forms.input>
                    </div>
                    <x-button type="submit" btn_type="secondary" class="h-full">Buscar</x-button>
                    <button
                        class="inline-flex items-center p-2.5 ml-1 justify-center text-sm text-primary-600 border-2 border-transparent rounded-lg hover:border-primary-600 focus:border-primary-600"
                        type="button" x-on:click="open = !open">
                        <span class="sr-only">Open main menu</span>
                        <img class="w-5 h-5" src="{{ asset('img/filter.png') }}" alt="" srcset="">
                    </button>
                </form>
            </div>
        </div>
    </section>

    <section id="categories" x-ref="categories" class="w-full bg-white py-16">
        <div class="container max-w-7xl mx-auto p-4">
            <h2 class="w-full text-4xl text-black text-center font-bold mb-4">
                Explora nuestras categorías
            </h2>
            <p class="w-full max-w-4xl text-lg text-black text-left font-normal m-auto">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum praesentium soluta esse optio, ullam
                commodi culpa minima sit tempora aliquid, ut molestias quibusdam. Commodi dignissimos molestiae ipsa
                magni impedit provident.
            </p>
            <div class="w-full mt-8 grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-4 gap-2">
                <a href="#"
                    class="group max-w-md p-6 rounded-2xl shadow-lg bg-white border border-collapse border-gray-300 text-black hover:border-none hover:bg-gradient-to-b hover:from-tertiary hover:via-primary-600 hover:to-primary-500 hover:text-white hover:shadow-primary-600 focus:border-none focus:bg-gradient-to-b focus:from-tertiary focus:via-primary-600 focus:to-primary-500 focus:text-white focus:shadow-primary-600">
                    <div class="flex flex-col items-center justify-center gap-1">
                        <div
                            class="w-full flex items-end justify-start max-sm:flex-col max-sm:justify-end max-sm:items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" preserveAspectRatio="none" fill="currentColor"
                                class="w-12 mr-2 fill-tertiary stroke-tertiary group-hover:stroke-white group-hover:fill-white group-focus:stroke-white group-focus:fill-white">
                                <path fill-rule="evenodd"
                                    d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                                    clip-rule="evenodd"></path>
                                <path
                                    d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                                </path>
                            </svg>
                            <h4
                                class="font-bold text-left text-3xl max-sm:text-3xl max-sm:text-center max-md:text-2xl  text-tertiary group-hover:text-white group-focus:text-white">
                                Categoría</h4>
                        </div>
                        <div class="w-full flex">
                            <p
                                class="font-semibold text-left text-sm max-sm:text-center text-gray-600 group-hover:text-white group-focus:text-white mt-1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </a>
                <a href="#"
                    class="group max-w-md p-6 rounded-2xl shadow-lg bg-white border border-collapse border-gray-300 text-black hover:border-none hover:bg-gradient-to-b hover:from-tertiary hover:via-primary-600 hover:to-primary-500 hover:text-white hover:shadow-primary-600 focus:border-none focus:bg-gradient-to-b focus:from-tertiary focus:via-primary-600 focus:to-primary-500 focus:text-white focus:shadow-primary-600">
                    <div class="flex flex-col items-center justify-center gap-1">
                        <div
                            class="w-full flex items-end justify-start max-sm:flex-col max-sm:justify-end max-sm:items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-12 mr-2 fill-tertiary stroke-tertiary group-hover:stroke-white group-hover:fill-white group-focus:stroke-white group-focus:fill-white">
                                <path fill-rule="evenodd"
                                    d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                                    clip-rule="evenodd"></path>
                                <path
                                    d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                                </path>
                            </svg>
                            <h4
                                class="font-bold text-left text-3xl max-sm:text-3xl max-sm:text-center max-md:text-2xl  text-tertiary group-hover:text-white group-focus:text-white">
                                Categoría</h4>
                        </div>
                        <div class="w-full flex">
                            <p
                                class="font-semibold text-left text-sm max-sm:text-center text-gray-600 group-hover:text-white group-focus:text-white mt-1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </a>
                <a href="#"
                    class="group max-w-md p-6 rounded-2xl shadow-lg bg-white border border-collapse border-gray-300 text-black hover:border-none hover:bg-gradient-to-b hover:from-tertiary hover:via-primary-600 hover:to-primary-500 hover:text-white hover:shadow-primary-600 focus:border-none focus:bg-gradient-to-b focus:from-tertiary focus:via-primary-600 focus:to-primary-500 focus:text-white focus:shadow-primary-600">
                    <div class="flex flex-col items-center justify-center gap-1">
                        <div
                            class="w-full flex items-end justify-start max-sm:flex-col max-sm:justify-end max-sm:items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-12 mr-2 fill-tertiary stroke-tertiary group-hover:stroke-white group-hover:fill-white group-focus:stroke-white group-focus:fill-white">
                                <path fill-rule="evenodd"
                                    d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                                    clip-rule="evenodd"></path>
                                <path
                                    d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                                </path>
                            </svg>
                            <h4
                                class="font-bold text-left text-3xl max-sm:text-3xl max-sm:text-center max-md:text-2xl  text-tertiary group-hover:text-white group-focus:text-white">
                                Categoría</h4>
                        </div>
                        <div class="w-full flex">
                            <p
                                class="font-semibold text-left text-sm max-sm:text-center text-gray-600 group-hover:text-white group-focus:text-white mt-1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </a>
                <a href="#"
                    class="group max-w-md p-6 rounded-2xl shadow-lg bg-white border border-collapse border-gray-300 text-black hover:border-none hover:bg-gradient-to-b hover:from-tertiary hover:via-primary-600 hover:to-primary-500 hover:text-white hover:shadow-primary-600 focus:border-none focus:bg-gradient-to-b focus:from-tertiary focus:via-primary-600 focus:to-primary-500 focus:text-white focus:shadow-primary-600">
                    <div class="flex flex-col items-center justify-center gap-1">
                        <div
                            class="w-full flex items-end justify-start max-sm:flex-col max-sm:justify-end max-sm:items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-12 mr-2 fill-tertiary stroke-tertiary group-hover:stroke-white group-hover:fill-white group-focus:stroke-white group-focus:fill-white">
                                <path fill-rule="evenodd"
                                    d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                                    clip-rule="evenodd"></path>
                                <path
                                    d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                                </path>
                            </svg>
                            <h4
                                class="font-bold text-left text-3xl max-sm:text-3xl max-sm:text-center max-md:text-2xl  text-tertiary group-hover:text-white group-focus:text-white">
                                Categoría</h4>
                        </div>
                        <div class="w-full flex">
                            <p
                                class="font-semibold text-left text-sm max-sm:text-center text-gray-600 group-hover:text-white group-focus:text-white mt-1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </a>
                <a href="#"
                    class="group max-w-md p-6 rounded-2xl shadow-lg bg-white border border-collapse border-gray-300 text-black hover:border-none hover:bg-gradient-to-b hover:from-tertiary hover:via-primary-600 hover:to-primary-500 hover:text-white hover:shadow-primary-600 focus:border-none focus:bg-gradient-to-b focus:from-tertiary focus:via-primary-600 focus:to-primary-500 focus:text-white focus:shadow-primary-600">
                    <div class="flex flex-col items-center justify-center gap-1">
                        <div
                            class="w-full flex items-end justify-start max-sm:flex-col max-sm:justify-end max-sm:items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-12 mr-2 fill-tertiary stroke-tertiary group-hover:stroke-white group-hover:fill-white group-focus:stroke-white group-focus:fill-white">
                                <path fill-rule="evenodd"
                                    d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                                    clip-rule="evenodd"></path>
                                <path
                                    d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                                </path>
                            </svg>
                            <h4
                                class="font-bold text-left text-3xl max-sm:text-3xl max-sm:text-center max-md:text-2xl  text-tertiary group-hover:text-white group-focus:text-white">
                                Categoría</h4>
                        </div>
                        <div class="w-full flex">
                            <p
                                class="font-semibold text-left text-sm max-sm:text-center text-gray-600 group-hover:text-white group-focus:text-white mt-1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </a>
                <a href="#"
                    class="group max-w-md p-6 rounded-2xl shadow-lg bg-white border border-collapse border-gray-300 text-black hover:border-none hover:bg-gradient-to-b hover:from-tertiary hover:via-primary-600 hover:to-primary-500 hover:text-white hover:shadow-primary-600 focus:border-none focus:bg-gradient-to-b focus:from-tertiary focus:via-primary-600 focus:to-primary-500 focus:text-white focus:shadow-primary-600">
                    <div class="flex flex-col items-center justify-center gap-1">
                        <div
                            class="w-full flex items-end justify-start max-sm:flex-col max-sm:justify-end max-sm:items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-12 mr-2 fill-tertiary stroke-tertiary group-hover:stroke-white group-hover:fill-white group-focus:stroke-white group-focus:fill-white">
                                <path fill-rule="evenodd"
                                    d="M9.315 7.584C12.195 3.883 16.695 1.5 21.75 1.5a.75.75 0 01.75.75c0 5.056-2.383 9.555-6.084 12.436A6.75 6.75 0 019.75 22.5a.75.75 0 01-.75-.75v-4.131A15.838 15.838 0 016.382 15H2.25a.75.75 0 01-.75-.75 6.75 6.75 0 017.815-6.666zM15 6.75a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"
                                    clip-rule="evenodd"></path>
                                <path
                                    d="M5.26 17.242a.75.75 0 10-.897-1.203 5.243 5.243 0 00-2.05 5.022.75.75 0 00.625.627 5.243 5.243 0 005.022-2.051.75.75 0 10-1.202-.897 3.744 3.744 0 01-3.008 1.51c0-1.23.592-2.323 1.51-3.008z">
                                </path>
                            </svg>
                            <h4
                                class="font-bold text-left text-3xl max-sm:text-3xl max-sm:text-center max-md:text-2xl  text-tertiary group-hover:text-white group-focus:text-white">
                                Categoría</h4>
                        </div>
                        <div class="w-full flex">
                            <p
                                class="font-semibold text-left text-sm max-sm:text-center text-gray-600 group-hover:text-white group-focus:text-white mt-1">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section id="locations" x-ref="locations" class="w-full bg-gray-200 py-16">
        <div class="container max-w-7xl mx-auto p-4">
            <div class="w-full p-4 bg-white border border-gray-100 rounded-3xl shadow-lg shadow-gray-400">
                <h2 class="w-full text-4xl text-black text-center font-bold mb-4">
                    Busca anuncios cerca de ti
                </h2>
                <p class="w-full max-w-4xl text-lg text-gray-600 text-left font-normal m-auto">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum praesentium soluta esse optio,
                    ullam
                    commodi culpa minima sit tempora aliquid, ut molestias quibusdam. Commodi dignissimos molestiae ipsa
                    magni impedit provident.
                </p>
                <div class="w-full max-w-xl flex flex-wrap items-center justify-center gap-2 mt-4 mx-auto">
                    <x-link href="#" link_type="outline">Ciudad 1</x-link>
                    <x-link href="#" link_type="outline">Ciudad 2</x-link>
                    <x-link href="#" link_type="outline">Ciudad 3</x-link>
                    <x-link href="#" link_type="outline">Ciudad 4</x-link>
                    <x-link href="#" link_type="outline">Ciudad 5</x-link>
                    <x-link href="#" link_type="outline">Ciudad 6</x-link>
                    <x-link href="#" link_type="outline">Ciudad 7</x-link>
                    <x-link href="#" link_type="outline">Ciudad 8</x-link>
                    <x-link href="#" link_type="outline">Ver Más +</x-link>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" x-ref="faq" class="w-full bg-white py-16">
        <div class="container max-w-7xl mx-auto p-4">
            <h2 class="w-full text-4xl text-black text-center font-bold mb-4">
                Preguntas Frecuentes
            </h2>
            <p class="w-full max-w-4xl text-lg text-gray-600 text-left font-normal m-auto">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum praesentium soluta esse optio, ullam
                commodi culpa minima sit tempora aliquid, ut molestias quibusdam. Commodi dignissimos molestiae ipsa
                magni impedit provident.
            </p>

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

        </div>
    </section>
</x-layouts.layout>
