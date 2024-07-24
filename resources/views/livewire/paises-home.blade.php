<div class="w-full max-w-xl flex flex-wrap items-center justify-center gap-2 mt-4 mx-auto">
    @if (count($paises))
        @foreach ($paises as $pais)
        <x-link href="{{$pais->url_subdomain}}" target="_blank" link_type="outline">{{$pais->nombre}}</x-link>
        @endforeach
    @else
        <p class="w-full p-2 text-lg text-center text-black font-semibold">Aún no hay subdominios disponibles...</p>
    @endif
</div>
