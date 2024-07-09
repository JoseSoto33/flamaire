<header class="sticky top-0 z-10" x-ref="header">
    <nav x-data="{ showMenu: false }"
        class="flex w-full mx-auto bg-white shadow-md backdrop-blur-2xl backdrop-saturate-200 z-10">
        <div
            class="flex flex-wrap w-full items-center justify-between mx-auto text-blue-gray-900 max-w-7xl px-4 py-2 lg:py-4">
            <a href="{{ route('home') }}/"
                class="mr-1 sm:mr-4 block cursor-pointer py-1.5 font-sans text-base font-medium leading-relaxed text-inherit antialiased">
                <img class="w-32 sm:w-40" src="{{ asset('img/flamaire-logo-2.png') }}" alt="" srcset="">
            </a>
            <div
                {{-- class="items-center justify-between w-full hidden max-md:order-1 md:flex md:w-auto" --}}
                :class="showMenu ? 'items-center justify-between w-full max-md:order-1 md:flex md:w-auto' : 'items-center justify-between hidden w-full max-md:order-1 md:flex md:w-auto'"
                id="navbar-sticky">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a href="#landing" id="link-landing"
                            @click.prevent="scrollToElement($refs.landing)"
                            class="block py-2 px-3 text-primary-700 font-semibold rounded hover:bg-primary-600 hover:text-white md:bg-transparent md:hover:text-primary-900 md:hover:bg-transparent md:p-0">
                            Inicio</a>
                    </li>
                    <li>
                        <a href="#categories" id="link-categories"
                            @click.prevent="scrollToElement($refs.categories)"
                            class="block py-2 px-3 text-primary-700 font-semibold rounded hover:bg-primary-600 hover:text-white md:bg-transparent md:hover:text-primary-900 md:hover:bg-transparent md:p-0">
                            Categorías</a>
                    </li>
                    <li>
                        <a href="#locations" id="link-locations"
                            @click.prevent="scrollToElement($refs.locations)"
                            class="block py-2 px-3 text-primary-700 font-semibold rounded hover:bg-primary-600 hover:text-white md:bg-transparent md:hover:text-primary-900 md:hover:bg-transparent md:p-0">
                            Regiones</a>
                    </li>
                    <li>
                        <a href="#faq" id="link-faq"
                            @click.prevent="scrollToElement($refs.faq)"
                            class="block py-2 px-3 text-primary-700 font-semibold rounded hover:bg-primary-600 hover:text-white md:bg-transparent md:hover:text-primary-900 md:hover:bg-transparent md:p-0">
                            FAQ's</a>
                    </li>
                </ul>
            </div>
            <div class="flex items-center gap-x-1">
                <button type="button"
                    class="relative rounded-full bg-white p-1 text-primary-600 hover:text-white hover:bg-primary-600 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-tertiary">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button>
                <x-link href="{{ route('home') }}/" link_type="primary">
                    + Publicar
                </x-link>
                @if (Auth::check())
                <x-link href="{{ route('user-logout') }}/" link_type="transparent">
                    Logout
                </x-link>
                @endif
                <button
                    class="inline-flex md:hidden items-center p-2.5 justify-center border-2 border-transparent text-sm text-primary-600 rounded-lg hover:border-primary-600 focus:border-primary-600"
                    type="button" x-on:click="showMenu = !showMenu" x-on:click.outside="showMenu = false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            {{-- <div class="flex flex-wrap w-full gap-1">
                <div class="flex w-full sm:flex-1 flex-wrap sm:flex-nowrap p-1 gap-1 items-end float-left">
                    <span class="text-black font-semibold text-lg">Categorías:</span>
                    <x-link href="{{ route('home') }}/" link_type="tag">
                        Escorts
                    </x-link>
                    <x-link href="{{ route('home') }}/" link_type="outline-tag">
                        Masajistas
                    </x-link>
                    <x-link href="{{ route('home') }}/" link_type="outline-tag">
                        Videollamadas
                    </x-link>
                </div>
                <div class="flex w-full sm:flex-1 flex-wrap sm:flex-nowrap p-1 gap-1 items-end float-left">
                    <span class="text-black font-semibold text-lg">Sexo:</span>
                    <x-link href="{{ route('home') }}/" link_type="tag">
                        Mujer
                    </x-link>
                    <x-link href="{{ route('home') }}/" link_type="outline-tag">
                        Hombre
                    </x-link>
                    <x-link href="{{ route('home') }}/" link_type="outline-tag">
                        Trans
                    </x-link>
                </div>
            </div> --}}
            <template x-teleport="body">
                <div x-show="open" x-modal x-transition
                    class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 min-h-screen max-h-full bg-black bg-opacity-80 transition-opacity"
                    aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow">
                            <!-- Modal header -->
                            <div
                                class="flex flex-col items-center justify-between p-4 md:p-5 rounded-t dark:border-gray-600">
                                <h3 class="w-full text-xl text-center font-semibold text-black">
                                    Filtro
                                </h3>
                                <p class="w-full text-sm text-center font-semibold text-gray-500">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem minus quis
                                    perspiciatis ipsam explicabo iusto suscipit eveniet voluptas illo consequuntur!
                                </p>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5 space-y-4">
                                <form class="w-full p-1">
                                    <h4 class="w-full text-left text-black">Input de texto</h4>
                                    <div class="mb-5">
                                        <label for="sm-input" class="block mb-2 text-sm font-medium text-black">Input
                                            small</label>
                                        <x-forms.input id="sm-input" type="text" size="sm" />
                                    </div>
                                    <div class="mb-5">
                                        <label for="base-input" class="block mb-2 text-sm font-medium text-black">Input
                                            base</label>
                                        <x-forms.input id="base-input" type="text" />
                                    </div>
                                    <div class="mb-5">
                                        <label for="lg-input" class="block mb-2 text-sm font-medium text-black">Input
                                            large</label>
                                        <x-forms.input id="lg-input" type="text" size="lg" />
                                    </div>
                                    <div class="mb-5">
                                        <label for="input-icon" class="block mb-2 text-sm font-medium text-black">Input
                                            icon</label>
                                        <x-forms.input-icon for="input-icon" type="text">
                                            <svg class="w-4 h-4 text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                            </svg>
                                        </x-forms.input-icon>
                                    </div>
                                    <div class="mb-5">
                                        <label for="textarea"
                                            class="block mb-2 text-sm font-medium text-black">Textarea</label>
                                        <x-forms.textarea id="textarea"
                                            placeholder="Escribir un comentario..."></x-forms.textarea>
                                    </div>
                                    <h4 class="mt-2 text-left text-lg">Checkboxes basicos</h4>
                                    <fieldset>
                                        <div class="mb-2">
                                            <x-forms.checkbox id="prueba1">
                                                Prueba 1
                                            </x-forms.checkbox>
                                        </div>
                                        <div class="mb-2">
                                            <x-forms.checkbox id="prueba2">
                                                Prueba 2
                                            </x-forms.checkbox>
                                        </div>
                                        <div class="mb-2">
                                            <x-forms.checkbox id="prueba3">
                                                Prueba 3
                                            </x-forms.checkbox>
                                        </div>
                                        <div class="mb-2">
                                            <x-forms.checkbox id="prueba4" message="Con texto adicional" checked>
                                                Prueba 4
                                            </x-forms.checkbox>
                                        </div>
                                        <div class="mb-2">
                                            <x-forms.checkbox id="prueba5" message="Con texto adicional">
                                                Prueba 5
                                            </x-forms.checkbox>
                                        </div>
                                        <div class="mb-2">
                                            <x-forms.checkbox id="prueba6" message="Con texto adicional" disabled>
                                                Prueba 6 Deshabilitado
                                            </x-forms.checkbox>
                                        </div>
                                    </fieldset>
                                    <h4 class="mt-2 text-left text-lg">Checkboxes botones</h4>
                                    <fieldset class="flex gap-1">
                                        <x-forms.checkbox-button id="checkButton1">
                                            Boton 1
                                        </x-forms.checkbox-button>
                                        <x-forms.checkbox-button id="checkButton2">
                                            Boton 2
                                        </x-forms.checkbox-button>
                                        <x-forms.checkbox-button id="checkButton3">
                                            Boton 3
                                        </x-forms.checkbox-button>
                                        <x-forms.checkbox-button id="checkButton4">
                                            Boton 4
                                        </x-forms.checkbox-button>
                                    </fieldset>
                                    <h4 class="mt-2 text-left text-lg">Radio buttons basicos</h4>
                                    <fieldset>
                                        <div class="mb-2">
                                            <x-forms.radio id="pruebaRadio1" name="pruebaRadio">
                                                Prueba 1
                                            </x-forms.radio>
                                        </div>
                                        <div class="mb-2">
                                            <x-forms.radio id="pruebaRadio2" name="pruebaRadio">
                                                Prueba 2
                                            </x-forms.radio>
                                        </div>
                                        <div class="mb-2">
                                            <x-forms.radio id="pruebaRadio3" name="pruebaRadio">
                                                Prueba 3
                                            </x-forms.radio>
                                        </div>
                                        <div class="mb-2">
                                            <x-forms.radio id="pruebaRadio4" name="pruebaRadio"
                                                message="Con texto adicional" checked>
                                                Prueba 4
                                            </x-forms.radio>
                                        </div>
                                        <div class="mb-2">
                                            <x-forms.radio id="pruebaRadio5" name="pruebaRadio"
                                                message="Con texto adicional">
                                                Prueba 5
                                            </x-forms.radio>
                                        </div>
                                        <div class="mb-2">
                                            <x-forms.radio id="pruebaRadio6" name="pruebaRadio"
                                                message="Con texto adicional" disabled>
                                                Prueba 6 Deshabilitado
                                            </x-forms.radio>
                                        </div>
                                    </fieldset>
                                    <h4 class="mt-2 text-left text-lg">Radio botones</h4>
                                    <fieldset class="flex gap-1">
                                        <x-forms.radio-button id="radioButton1" name="radioButton">
                                            Boton 1
                                        </x-forms.radio-button>
                                        <x-forms.radio-button id="radioButton2" name="radioButton">
                                            Boton 2
                                        </x-forms.radio-button>
                                        <x-forms.radio-button id="radioButton3" name="radioButton">
                                            Boton 3
                                        </x-forms.radio-button>
                                        <x-forms.radio-button id="radioButton4" name="radioButton">
                                            Boton 4
                                        </x-forms.radio-button>
                                    </fieldset>
                                    <h4 class="mt-2 text-left text-lg">Selects</h4>
                                    <div class="mb-2">
                                        <label for="lg-input" class="block mb-2 text-sm font-medium text-black">Select
                                            small</label>
                                        <x-forms.select id="sm-select" type="text" size="sm">
                                            <option value="1">Opcion 1</option>
                                            <option value="2">Opcion 2</option>
                                            <option value="3">Opcion 3</option>
                                        </x-forms.select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="lg-input" class="block mb-2 text-sm font-medium text-black">Select
                                            regular</label>
                                        <x-forms.select id="md-select" type="text" size="md">
                                            <option value="1">Opcion 1</option>
                                            <option value="2">Opcion 2</option>
                                            <option value="3">Opcion 3</option>
                                        </x-forms.select>
                                    </div>
                                    <div class="mb-2">
                                        <label for="lg-input" class="block mb-2 text-sm font-medium text-black">Select
                                            large</label>
                                        <x-forms.select id="lg-select" type="text" size="lg">
                                            <option value="1">Opcion 1</option>
                                            <option value="2">Opcion 2</option>
                                            <option value="3">Opcion 3</option>
                                        </x-forms.select>
                                    </div>
                                    <h4 class="mt-6 text-left text-lg">Rango</h4>
                                    <div class="mb-2">
                                        <x-forms.range-double min="1" max="1000" minValue="150"
                                            maxValue="800" nombre1="minPrecio"
                                            nombre2="maxPrecio"></x-forms.range-double>
                                    </div>
                                </form>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b gap-1">
                                <x-button btn_type="primary" type="button">
                                    Acepto
                                </x-button>
                                <x-button btn_type="outline" type="button" x-on:click="open = false">
                                    Cancelar
                                </x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </nav>
</header>
@push('js')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.directive('modal', el => {
                console.log(1);
            })

        })
        function scrollToElement (el) {
            let header = document.querySelector('header');
            window.scrollTo({ top: el.offsetTop - header.offsetHeight, behavior: 'smooth' });
        }
    </script>
@endpush
