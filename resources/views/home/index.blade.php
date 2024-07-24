<x-layouts.layout :defaults="$defaults">
    @if (isset($title) && !empty($title))
        @section('title', $title)
    @elseif (isset($defaults['page_defaults']) &&
            isset($defaults['defaultText'][$defaults['page_defaults'] . '_titulo_pestania']) &&
            !empty($defaults['defaultText'][$defaults['page_defaults'] . '_titulo_pestania']))
        @section('title', $defaults['defaultText'][$defaults['page_defaults'] . '_titulo_pestania'])
    @else
        @section('title', 'Inicio')
    @endif
    
    <section id="landing" x-ref="landing" class="w-full bg-gradient-to-b from-tertiary from-40% via-primary-600 via-60% to-primary-500 to-90% py-16 flex items-center justify-center md:py-36">
        <div class="container max-w-7xl mx-auto p-4">
            <h2 class="w-full max-w-4xl text-5xl text-white text-center font-bold mb-4 mx-auto max-sm:text-3xl max-md:text-4xl">                
                @if (!empty($titulo))
                    {!! $titulo !!}
                @elseif (isset($defaults['page_defaults']) &&
                        isset($defaults['defaultText'][$defaults['page_defaults'] . '_titulo']) &&
                        !empty($defaults['defaultText'][$defaults['page_defaults'] . '_titulo']))
                    {!! $defaults['defaultText'][$defaults['page_defaults'] . '_titulo'] !!}
                @else
                Descubre Tu Próxima Aventura Íntima
                @endif
            </h2>
            <p class="w-full max-w-xl text-lg text-white text-center font-normal m-auto">
                @if (!empty($descripcion))
                    {!! $descripcion !!}
                @elseif (isset($defaults['page_defaults']) &&
                        isset($defaults['defaultText'][$defaults['page_defaults'] . '_descripcion']) &&
                        !empty($defaults['defaultText'][$defaults['page_defaults'] . '_descripcion']))
                    {!! $defaults['defaultText'][$defaults['page_defaults'] . '_descripcion'] !!}
                @else
                Únete a nuestra comunidad y comienza a disfrutar de citas inolvidables hoy mismo.
                @endif
            </p>
            @if (!Auth::check())
            <div class="flex flex-wrap items-center justify-center gap-4 mt-4">
                <a href="{{ route('login') }}/" class="leading-normal px-5 py-3 border-collapse rounded-lg bg-white text-center text-lg font-semibold hover:bg-gray-200 text-tertiary">
                    Iniciar Sesión
                </a>
                <a href="#" class="leading-6 flex items-end justify-center gap-1 px-5 py-3 border-collapse rounded-xl text-white text-center text-lg font-semibold hover:text-gray-200">
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
                @if (isset($titulo_area_categorias) && !empty($titulo_area_categorias))
                    {!! $titulo_area_categorias !!}
                @elseif (isset($defaults['page_defaults']) && isset($defaults['defaultText'][$defaults['page_defaults'].'_titulo_area_categorias']) && !empty($defaults['defaultText'][$defaults['page_defaults'].'_titulo_area_categorias']))
                    {!! $defaults['defaultText'][$defaults['page_defaults'] . '_titulo_area_categorias'] !!}
                @else
                Explora nuestras categorías
                @endif
            </h2>
            <p class="w-full max-w-4xl text-lg text-black text-left font-normal m-auto">
                @if (isset($descripcion_area_categorias) && !empty($descripcion_area_categorias))
                    {!! $descripcion_area_categorias !!}
                @elseif (isset($defaults['page_defaults']) && isset($defaults['defaultText'][$defaults['page_defaults'].'_descripcion_area_categorias']) && !empty($defaults['defaultText'][$defaults['page_defaults'].'_descripcion_area_categorias']))
                    {!! $defaults['defaultText'][$defaults['page_defaults'] . '_descripcion_area_categorias'] !!}
                @else
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum praesentium soluta esse optio, ullam
                commodi culpa minima sit tempora aliquid, ut molestias quibusdam. Commodi dignissimos molestiae ipsa
                magni impedit provident.
                @endif
            </p>
            @livewire('CategoriasHome')
        </div>
    </section>

    <section id="locations" x-ref="locations" class="w-full bg-primary-600 py-16">
        <div class="container max-w-7xl mx-auto p-4">
            <div class="w-full p-4 bg-white rounded-3xl shadow-primary-400 shadow-2xl">
                <h3 class="w-full text-4xl text-black text-center font-bold mb-4">
                    @if (isset($titulo_regiones) && !empty($titulo_regiones))
                        {!! nl2br($titulo_regiones) !!}
                    @elseif (isset($defaults['page_defaults']) &&
                            isset($defaults['defaultText'][$defaults['page_defaults'] . '_titulo_regiones']) &&
                            !empty($defaults['defaultText'][$defaults['page_defaults'] . '_titulo_regiones']))
                        {!! nl2br($defaults['defaultText'][$defaults['page_defaults'] . '_titulo_regiones']) !!}
                    @else
                        Busca anuncios cerca de ti
                    @endif
                </h3>
                <p class="w-full max-w-4xl text-lg text-gray-600 text-left font-normal m-auto">
                    @if (isset($descripcion_regiones) && !empty($descripcion_regiones))
                        {!! nl2br($descripcion_regiones) !!}
                    @elseif (isset($defaults['page_defaults']) &&
                            isset($defaults['defaultText'][$defaults['page_defaults'] . '_descripcion_regiones']) &&
                            !empty($defaults['defaultText'][$defaults['page_defaults'] . '_descripcion_regiones']))
                        {!! nl2br($defaults['defaultText'][$defaults['page_defaults'] . '_descripcion_regiones']) !!}
                    @else
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum praesentium soluta esse optio,
                    ullam
                    commodi culpa minima sit tempora aliquid, ut molestias quibusdam. Commodi dignissimos molestiae ipsa
                    magni impedit provident.
                    @endif
                </p>
                @livewire('PaisesHome')
            </div>
        </div>
    </section>

    <section id="faq" x-ref="faq" class="w-full bg-white py-16">
        @if (isset($descripcion_extendida) && !empty($descripcion_extendida))
        @php $var_descripcion = $descripcion_extendida @endphp
        @elseif (isset($defaults['page_defaults']) && isset($defaults['defaultText'][$defaults['page_defaults'].'_descripcion_detallada']) && !empty($defaults['defaultText'][$defaults['page_defaults'].'_descripcion_detallada']))
        @php $var_descripcion = $defaults['defaultText'][$defaults['page_defaults'].'_descripcion_detallada'] @endphp
        @else
        @php $var_descripcion = null; @endphp
        @endif
        @livewire('PreguntasFrecuentes', ['var_descripcion'  => $var_descripcion])
    </section>
</x-layouts.layout>
