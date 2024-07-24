<div class="w-full relative p-4" 
    x-data="{ 
        loading: true,
        scrollToTop (id) {
            const modal = document.querySelector(`#${id}`);
            if (modal)
                modal.scrollTo({ top: 0, behavior: 'smooth' });
        }, 
        scrollToFirstError () {
            const firstError = document.querySelector('.form-error-msg');
            if (firstError)
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }" 
    x-on:data-laoded="loading = false" 
    x-on:data-saved="loading = false; modalAdd = false;" 
    x-on:data-updated="loading = false; modalEdit = false;" 
    x-on:data-deleted="loading = false; modalDelete = false;">
    <div class="w-full p-4 shadow-lg rounded-lg">
        <h1 class="w-full p-4 mb-2 text-4xl text-center font-semibold">
            {{ $title }}
        </h1>
    
        {{-- Datos de categoría  --}}
        @if (!empty($currentCategory))
        <div class="w-full flex flex-wrap items-start justify-center max-md:mb-3">
            <div class="w-full md:w-1/3 flex items-center justify-center md:justify-start">
                <div class="w-full max-w-sm rounded-lg overflow-hidden mb-2 border border-gray-500">
                    <img class="w-full" src="{{Storage::url($currentCategory->url_img)}}" alt="Preview" >
                </div>
            </div>
            
            <div class="w-full flex flex-col md:w-2/3">
                <div class="w-full flex flex-wrap items-center justify-between max-md:mb-3">
                    <div class="w-full md:w-1/3 px-2 flex items-center justify-start md:justify-end">
                        <h3 class="w-full leading-normal text-xl font-bold md:text-right">Categoría:</h3>
                    </div>
                    <div class="w-full leading-normal md:w-2/3 px-2 flex items-center justify-start">
                        <span class="leading-normal">{{$currentCategory->nombre}}</span>
                    </div>
                </div>
                <div class="w-full flex flex-wrap items-center justify-between max-md:mb-3">
                    <div class="w-full md:w-1/3 px-2 flex items-center justify-start md:justify-end">
                        <h3 class="w-full leading-normal text-xl font-bold md:text-right">Status:</h3>
                    </div>
                    <div class="w-full leading-normal md:w-2/3 px-2 flex items-center justify-start">
                        <span class="leading-normal">{{$currentCategory->status? 'Activo' : 'Inactivo'}}</span>
                    </div>
                </div>
                    
                @if (!empty($currentMetaData))
                <div class="w-full flex flex-wrap items-center justify-between max-md:mb-3">
                    <div class="w-full md:w-1/3 px-2 flex items-center justify-start md:justify-end">
                        <h3 class="w-full leading-normal text-xl font-bold md:text-right">Slug:</h3>
                    </div>
                    <div class="w-full leading-normal md:w-2/3 px-2 flex items-center justify-start">
                        <span class="leading-normal">{{!empty($currentMetaData->slug)? $currentMetaData->slug : 'Sin Slug'}}</span>
                    </div>
                </div>
                @endif
            </div>
        </div>
    
        {{-- Metadatos --}}
        @if (!empty($currentMetaData))
    
        {{-- Acordeón --}}
        <div id="accordion-open" class="my-8 w-full max-w-4xl mx-auto shadow-md" x-data="{ open1: false }">
            <h2 id="accordion-open-heading-1">
                <button type="button"
                    :class="open1 ? 'flex items-center justify-between w-full p-5 font-medium rtl:text-right text-white bg-primary-600 border border-primary-600 hover:bg-primary-700 hover:border-primary-700 gap-3' : 'flex items-center justify-between w-full p-5 font-medium rtl:text-right text-primary-600 border border-primary-600 hover:bg-primary-600 hover:text-white gap-3'"
                    x-on:click="open1 = !open1">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 me-2 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2" d="M3 11h18M3 15h18m-9-4v8m-8 0h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/>
                        </svg> Meta datos de la categoría:
                    </span>
                    <svg data-accordion-icon :class="!open1 ? 'w-3 h-3 rotate-180 shrink-0' : 'w-3 h-3 shrink-0'" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-open-body-1" x-transition x-ref="body1" x-show="open1" x-collapse>
                <div class="p-0 border border-primary-600">
                    {{-- Tabla --}}
                    <div class="relative overflow-x-auto shadow-md">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-secondary-300 uppercase bg-tertiary">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Campo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Valor
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        meta-title
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $currentMetaData->meta_title ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($currentMetaData->status_meta_title)
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        meta-description
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $currentMetaData->meta_description ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($currentMetaData->status_meta_description)
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        Título de Pestaña
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $currentMetaData->titulo_pestania ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($currentMetaData->status_titulo_pestania)
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        Título Header
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $currentMetaData->titulo_header ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($currentMetaData->status_titulo_header)
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        Título
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $currentMetaData->titulo ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($currentMetaData->status_titulo)
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        Título Área Categorías
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $currentMetaData->titulo_area_categorias ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($currentMetaData->status_titulo_area_categorias)
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        Descripción Área Categorías
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $currentMetaData->descripcion_area_categorias ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($currentMetaData->status_descripcion_area_categorias)
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        Descripción
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $currentMetaData->descripcion ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($currentMetaData->status_descripcion)
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        Descripción Detallada
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $currentMetaData->descripcion_detallada ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($currentMetaData->status_descripcion_detallada)
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                    {{-- Tabla --}}
                </div>
            </div>
        </div>
        {{-- Acordeón --}}
        @endif
        {{-- Metadatos --}}
        @endif
        {{-- Datos de categoría  --}}
       
        <div class="w-full relative">
            <div class="w-full py-2 flex items-center justify-between">
                <x-button btn_type="primary" type="button" x-on:click="modalAdd = true; loading = false;">
                    Nueva Categoría
                </x-button>
                @if (!empty($currentCategory))
                <x-link link_type="outline" href="{{ route('admin-categorias') }}/" >
                    Volver
                </x-link>
                @endif
            </div>
    
            <div class="w-full mt-4 mb-2 max-w-sm">
                <x-forms.input class="w-full" placeholder="Buscar..." wire:model.live="search" />
            </div>
    
            {{-- Listado de categorías --}}
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-secondary-300 uppercase bg-tertiary">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Categoría
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Opciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categorias->count())
                        @foreach ($categorias as $categoria)
                            <tr wire:key='cat-{{$categoria->id}}' class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                <td scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                    {{ $categoria->id }}
                                </td>
                                <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                    {{ $categoria->nombre }}
                                </td>
                                <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                    @if ($categoria->status)
                                    <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    @else
                                    <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>  
                                    @endif        
                                </td>
                                <td class="px-6 py-4 text-right gap-2 flex items-center justify-end">
                                    @if (empty($categoria->id_categoria_padre))
                                    <a href="{{ route('admin-categorias', ['id' => $categoria->id]) }}/" wire:navigate.hover class="inline-block bg-blue-600 p-2 rounded-md hover:bg-blue-900" alt="Ver Categoría">
                                        <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        </svg>                                  
                                    </a>                                    
                                    @else
                                    <button type="button" wire:click="show({{$categoria->id}})" @click="modalShow = true; loading = true;" class="inline-block bg-blue-600 p-2 rounded-md hover:bg-blue-900" alt="Ver Categoría">
                                        <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        </svg>                                  
                                    </button>
                                    @endif
                                    <button type="button" wire:click="edit({{$categoria->id}})" @click="modalEdit = true; loading = true;" class="inline-block bg-green-600 p-2 rounded-md hover:bg-green-900" alt="Editar Categoría">
                                        <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                        </svg>                                                                   
                                    </button>
                                    <button type="button" wire:click="delete({{$categoria->id}})" @click="modalDelete = true; loading = true;" class="inline-block bg-red-600 p-2 rounded-md hover:bg-red-900" alt="Eliminar Categoría">
                                        <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                        </svg>                                                                  
                                    </button>
                                </td>
                            </tr> 
                        @endforeach
                        @else
                        <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                            <td colspan="4" class="px-6 py-4 font-medium text-center text-black whitespace-nowrap">
                                No se encontraron registros...
                            </td>
                        </tr> 
                        @endif
                    </tbody>
                </table>
            </div>
            {{-- Listado de categorías --}}
            <div class="mt-4">
                {{ $categorias->links() }}
            </div>
        
        </div>

    </div>
    {{-- Modal detalles --}}
    <div x-show='modalShow' class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 min-h-screen max-h-full bg-black bg-opacity-80 transition-opacity"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex flex-col items-center justify-between px-4 py-2 md:p-5 rounded-t dark:border-gray-600">
                    <h3 class="w-full text-2xl text-center font-semibold text-black">
                        Detalles de la Categoría
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 relative">
                    <div class="absolute w-full h-full top-0 left-0 overflow-hidden bg-black bg-opacity-30 p-1 flex items-center justify-center z-10" x-show="loading">
                        <x-loading size="md"></x-loading>
                    </div>
                    @if (!empty($showCategory->url_img))
                    <div class="w-full flex items-center justify-center -mx-2 mb-3">
                        <div class="w-full max-w-sm rounded-lg overflow-hidden mb-2 border border-gray-500">
                            <img class="w-full" src="{{Storage::url($showCategory->url_img)}}" alt="Preview" >
                        </div>
                    </div>
                    @endif
                    <div class="w-full flex items-start justify-between -mx-2 mb-3">
                        <div class="w-full mb-1 sm:w-1/3 sm:mb-0 px-2 font-bold text-right">
                            Categoría:
                        </div>
                        <div class="w-full mb-1 sm:w-2/3 sm:mb-0 px-2">
                            {{ !empty($showCategory)? $showCategory->nombre : '' }}
                        </div>
                    </div>
                    <div class="w-full flex items-start justify-between -mx-2 mb-3">
                        <div class="w-full mb-1 sm:w-1/3 sm:mb-0 px-2 font-bold text-right">
                            Status:
                        </div>
                        <div class="w-full mb-1 sm:w-2/3 sm:mb-0 px-2">
                            @if (!empty($showCategory) && $showCategory->status)
                            Activo
                            @else
                            inactivo
                            @endif
                        </div>
                    </div>
                    <div class="w-full flex items-start justify-between -mx-2 mb-3">
                        <div class="w-full mb-1 sm:w-1/3 sm:mb-0 px-2 font-bold text-right">
                            Slug:
                        </div>
                        <div class="w-full mb-1 sm:w-2/3 sm:mb-0 px-2">
                            {{ $showMetaData['slug'] ?? 'Sin Slug' }}
                        </div>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-secondary-300 uppercase bg-tertiary">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Campo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Valor
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        meta-title
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $showMetaData['meta_title'] ?? 'Sin meta_title' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($showMetaData['status_meta_title'])
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        meta-description
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $showMetaData['meta_description'] ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($showMetaData['status_meta_description'])
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        Título de Pestaña
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $showMetaData['titulo_pestania'] ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($showMetaData['status_titulo_pestania'])
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        Título Header
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $showMetaData['titulo_header'] ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($showMetaData['status_titulo_header'])
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        Título
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $showMetaData['titulo'] ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($showMetaData['status_titulo'])
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        Título Área Categorías
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $showMetaData['titulo_area_categorias'] ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($showMetaData['status_titulo_area_categorias'])
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        Descripción Área Categorías
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $showMetaData['descripcion_area_categorias'] ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($showMetaData['status_descripcion_area_categorias'])
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        Descripción
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $showMetaData['descripcion'] ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($showMetaData['status_descripcion'])
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                                <tr class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        Descripción Detallada
                                    </th>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        {{ $showMetaData['descripcion_detallada'] ?? '' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                                        @if ($showMetaData['status_descripcion_detallada'])
                                        <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        @else
                                        <svg class="w-6 h-6 text-red-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>  
                                        @endif        
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="w-full mt-8 flex items-center justify-end">
                        <x-button btn_type="outline" type="button" x-on:click="modalShow = false">
                            Cerrar
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal detalles --}}

    {{-- Modal agregar --}}
    <div x-show='modalAdd' id="modalAdd"
        class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 min-h-screen max-h-full bg-black bg-opacity-80 transition-opacity"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex flex-col items-center justify-between px-4 py-2 md:p-5 rounded-t dark:border-gray-600">
                    <h3 class="w-full text-2xl text-center font-semibold text-black">
                        Nueva Categoría
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 relative">
                    <form wire:submit.prevent="save" x-on:submit="scrollToTop('modalAdd')">
                        <div wire:loading class="absolute w-full h-full top-0 left-0 overflow-hidden bg-black bg-opacity-30 p-1 flex items-center justify-center z-10">
                            <x-loading size="md"></x-loading>
                        </div>
                        @if (!empty($currentCategory))
                        <input type="hidden" wire:model="id_categoria_padre">
                        @endif
                        <div class="w-full mb-2 mt-4 relative">
                            <label for="nombre" class="form-label">Nombre de la categoría:</label>
                            <x-forms.input type="text" wire:model="categoryAdd.nombre" id="nombre" />
                            @error('categoryAdd.nombre') 
                            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                            @enderror 
                        </div>
                        <div class="w-full mb-4 mt-6 relative flex gap-1 flex-wrap">
                            <label for="nombre" class="form-label-line">Status:</label>
                            <x-forms.radio-button wire:model='categoryAdd.status' id="activo" value="1">Activo</x-forms.radio-button>
                            <x-forms.radio-button wire:model='categoryAdd.status' id="inactivo" value="0">Inactivo</x-forms.radio-button>
                            @error('categoryAdd.status') 
                            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                            @enderror 
                            @if($errors->has('error'))
                            <x-forms.msg-error>{{ $errors->first('error') }}</x-forms.msg-error>
                            @endif
                        </div>
                        <div class="w-full mb-2 mt-8 relative">
                            <label for="slug" class="form-label">Slug:</label>
                            <x-forms.input type="text" wire:model="categoryAdd.slug" id="slug" />
                            @error('categoryAdd.slug') 
                            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                            @enderror 
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between max-sm:flex-wrap">
                            <div class="flex-1 max-sm:w-full">
                                <label for="meta_title" class="form-label">meta-title:</label>
                                <x-forms.textarea wire:model="categoryAdd.meta_title" id="meta_title"></x-forms.textarea>
                                @error('categoryAdd.meta_title') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-full mt-2 sm:mt-0 sm:w-24 sm:ml-2">
                                <x-forms.checkbox-button wire:model='categoryAdd.status_meta_title' id="status_meta_title" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between max-sm:flex-wrap">
                            <div class="flex-1 max-sm:w-full">
                                <label for="meta_description" class="form-label">meta-description:</label>
                                <x-forms.textarea wire:model="categoryAdd.meta_description" id="meta_description"></x-forms.textarea>
                                @error('categoryAdd.meta_description') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-full mt-2 sm:mt-0 sm:w-24 sm:ml-2">
                                <x-forms.checkbox-button wire:model='categoryAdd.status_meta_description' id="status_meta_description" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between max-sm:flex-wrap">
                            <div class="flex-1 max-sm:w-full">
                                <label for="titulo_pestania" class="form-label">Título Pestaña:</label>
                                <x-forms.textarea wire:model="categoryAdd.titulo_pestania" id="titulo_pestania"></x-forms.textarea>
                                @error('categoryAdd.titulo_pestania') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-full mt-2 sm:mt-0 sm:w-24 sm:ml-2">
                                <x-forms.checkbox-button wire:model='categoryAdd.status_titulo_pestania' id="status_titulo_pestania" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between max-sm:flex-wrap">
                            <div class="flex-1 max-sm:w-full">
                                <label for="titulo_header" class="form-label">Título Header:</label>
                                <x-forms.textarea wire:model="categoryAdd.titulo_header" id="titulo_header"></x-forms.textarea>
                                @error('categoryAdd.titulo_header') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-full mt-2 sm:mt-0 sm:w-24 sm:ml-2">
                                <x-forms.checkbox-button wire:model='categoryAdd.status_titulo_header' id="status_titulo_header" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between max-sm:flex-wrap">
                            <div class="flex-1 max-sm:w-full">
                                <label for="titulo" class="form-label">Título:</label>
                                <x-forms.textarea wire:model="categoryAdd.titulo" id="titulo"></x-forms.textarea>
                                @error('categoryAdd.titulo') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-full mt-2 sm:mt-0 sm:w-24 sm:ml-2">
                                <x-forms.checkbox-button wire:model='categoryAdd.status_titulo' id="status_titulo" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between max-sm:flex-wrap">
                            <div class="flex-1 max-sm:w-full">
                                <label for="titulo_area_categorias" class="form-label">Título Área Categorías:</label>
                                <x-forms.textarea wire:model="categoryAdd.titulo_area_categorias" id="titulo_area_categorias"></x-forms.textarea>
                                @error('categoryAdd.titulo_area_categorias') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-full mt-2 sm:mt-0 sm:w-24 sm:ml-2">
                                <x-forms.checkbox-button wire:model='categoryAdd.status_titulo_area_categorias' id="status_titulo_area_categorias" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between max-sm:flex-wrap">
                            <div class="flex-1 max-sm:w-full">
                                <label for="descripcion_area_categorias" class="form-label">Descripción Área Categorías:</label>
                                <x-forms.textarea wire:model="categoryAdd.descripcion_area_categorias" id="descripcion_area_categorias"></x-forms.textarea>
                                @error('categoryAdd.descripcion_area_categorias') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-full mt-2 sm:mt-0 sm:w-24 sm:ml-2">
                                <x-forms.checkbox-button wire:model='categoryAdd.status_descripcion_area_categorias' id="status_descripcion_area_categorias" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between max-sm:flex-wrap">
                            <div class="flex-1 max-sm:w-full">
                                <label for="descripcion" class="form-label">Descripción:</label>
                                <x-forms.textarea wire:model="categoryAdd.descripcion" id="descripcion"></x-forms.textarea>
                                @error('categoryAdd.descripcion') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-full mt-2 sm:mt-0 sm:w-24 sm:ml-2">
                                <x-forms.checkbox-button wire:model='categoryAdd.status_descripcion' id="status_descripcion" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between max-sm:flex-wrap">
                            <div class="flex-1 max-sm:w-full">
                                <label for="descripcion_detallada" class="form-label">Descripción Detallada:</label>
                                <x-forms.textarea wire:model="categoryAdd.descripcion_detallada" id="descripcion_detallada"></x-forms.textarea>
                                @error('categoryAdd.descripcion_detallada') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-full mt-2 sm:mt-0 sm:w-24 sm:ml-2">
                                <x-forms.checkbox-button wire:model='categoryAdd.status_descripcion_detallada' id="status_descripcion_detallada" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative">
                            @if (!empty($categoryAdd->urlImage))
                            <div class="w-full max-w-md rounded-lg overflow-hidden mb-2 border border-gray-500">
                                <img class="w-full" src="{{$categoryAdd->urlImage->temporaryUrl()}}" alt="Preview" >
                            </div>                                    
                            @endif
                            <x-forms.input-file wire:model="categoryAdd.urlImage" id="url_img" wire:key="{{$categoryAdd->urlImageKey}}">Seleccionar imagen...</x-forms.input-file>
                            @error('categoryAdd.urlImage') 
                            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                            @enderror 
                        </div>
                        <div class="w-full mt-8 flex items-center justify-end gap-x-2">
                            <x-button type="submit" btn_type="secondary">guardar</x-button>
                            <x-button btn_type="outline" type="button" x-on:click="modalAdd = false">
                                Cancelar
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal agregar --}}

    {{-- Modal editar --}}
    <div x-show='modalEdit' id="modalEdit"
        class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 min-h-screen max-h-full bg-black bg-opacity-80 transition-opacity"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex flex-col items-center justify-between px-4 py-2 md:p-5 rounded-t dark:border-gray-600">
                    <h3 class="w-full text-2xl text-center font-semibold text-black">
                        Editar Categoría
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 relative">
                    <form wire:submit.prevent="update" x-on:submit="scrollToTop('modalEdit')">
                        <div wire:loading class="absolute w-full h-full top-0 left-0 overflow-hidden bg-black bg-opacity-30 p-1 flex items-center justify-center z-10">
                            <x-loading size="md"></x-loading>
                        </div>
                        <div class="w-full mb-2 mt-4 relative">
                            <label for="edit-nombre" class="form-label">Categoría:</label>
                            <x-forms.input type="text" wire:model="categoryEdit.nombre" id="edit-nombre" />
                            @error('categoryEdit.nombre') 
                            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                            @enderror 
                        </div>
                        <div class="w-full mb-4 mt-6 relative flex gap-1">
                            <label for="edit-status" class="form-label-line">Status:</label>
                            <x-forms.radio-button wire:model='categoryEdit.status' id="edit-activo" value="1">Activo</x-forms.radio-button>
                            <x-forms.radio-button wire:model='categoryEdit.status' id="edit-inactivo" value="0">Inactivo</x-forms.radio-button>
                            @error('categoryEdit.status') 
                            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                            @enderror 
                            @if($errors->has('error'))
                            <x-forms.msg-error>{{ $errors->first('error') }}</x-forms.msg-error>
                            @endif
                        </div>
                        <div class="w-full mb-2 mt-8 relative">
                            <label for="edit-slug" class="form-label">Slug:</label>
                            <x-forms.input type="text" wire:model="categoryEdit.slug" id="edit-slug" />
                            @error('categoryEdit.slug') 
                            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                            @enderror 
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between">
                            <div class="flex-1">
                                <label for="edit-meta_title" class="form-label">meta-title:</label>
                                <x-forms.textarea wire:model="categoryEdit.meta_title" id="edit-meta_title"></x-forms.textarea>
                                @error('categoryEdit.meta_title') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-24 ml-2">
                                <x-forms.checkbox-button wire:model='categoryEdit.status_meta_title' id="edit-status_meta_title">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between">
                            <div class="flex-1">
                                <label for="edit-meta_description" class="form-label">meta-description:</label>
                                <x-forms.textarea wire:model="categoryEdit.meta_description" id="edit-meta_description"></x-forms.textarea>
                                @error('categoryEdit.meta_description') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-24 ml-2">
                                <x-forms.checkbox-button wire:model='categoryEdit.status_meta_description' id="edit-status_meta_description" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between">
                            <div class="flex-1">
                                <label for="edit-titulo_pestania" class="form-label">Título Pestaña:</label>
                                <x-forms.textarea wire:model="categoryEdit.titulo_pestania" id="edit-titulo_pestania"></x-forms.textarea>
                                @error('categoryEdit.titulo_pestania') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-24 ml-2">
                                <x-forms.checkbox-button wire:model='categoryEdit.status_titulo_pestania' id="edit-status_titulo_pestania" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between">
                            <div class="flex-1">
                                <label for="edit-titulo_header" class="form-label">Título Header:</label>
                                <x-forms.textarea wire:model="categoryEdit.titulo_header" id="edit-titulo_header"></x-forms.textarea>
                                @error('categoryEdit.titulo_header') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-24 ml-2">
                                <x-forms.checkbox-button wire:model='categoryEdit.status_titulo_header' id="edit-status_titulo_header" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between">
                            <div class="flex-1">
                                <label for="edit-titulo" class="form-label">Título:</label>
                                <x-forms.textarea wire:model="categoryEdit.titulo" id="edit-titulo"></x-forms.textarea>
                                @error('categoryEdit.titulo') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-24 ml-2">
                                <x-forms.checkbox-button wire:model='categoryEdit.status_titulo' id="edit-status_titulo" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between">
                            <div class="flex-1">
                                <label for="edit-titulo_area_categorias" class="form-label">Título Área Categorías:</label>
                                <x-forms.textarea wire:model="categoryEdit.titulo_area_categorias" id="edit-titulo_area_categorias"></x-forms.textarea>
                                @error('categoryEdit.titulo_area_categorias') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-24 ml-2">
                                <x-forms.checkbox-button wire:model='categoryEdit.status_titulo_area_categorias' id="edit-status_titulo_area_categorias" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between">
                            <div class="flex-1">
                                <label for="edit-descripcion_area_categorias" class="form-label">Descripción Área Categorías:</label>
                                <x-forms.textarea wire:model="categoryEdit.descripcion_area_categorias" id="edit-descripcion_area_categorias"></x-forms.textarea>
                                @error('categoryEdit.descripcion_area_categorias') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-24 ml-2">
                                <x-forms.checkbox-button wire:model='categoryEdit.status_descripcion_area_categorias' id="edit-status_descripcion_area_categorias" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between">
                            <div class="flex-1">
                                <label for="edit-descripcion" class="form-label">Descripción:</label>
                                <x-forms.textarea wire:model="categoryEdit.descripcion" id="edit-descripcion"></x-forms.textarea>
                                @error('categoryEdit.descripcion') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-24 ml-2">
                                <x-forms.checkbox-button wire:model='categoryEdit.status_descripcion' id="edit-status_descripcion" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative flex items-start justify-between">
                            <div class="flex-1">
                                <label for="edit-descripcion_detallada" class="form-label">Descripción Detallada:</label>
                                <x-forms.textarea wire:model="categoryEdit.descripcion_detallada" id="edit-descripcion_detallada"></x-forms.textarea>
                                @error('categoryEdit.descripcion_detallada') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-24 ml-2">
                                <x-forms.checkbox-button wire:model='categoryEdit.status_descripcion_detallada' id="edit-status_descripcion_detallada" value="1">Activo</x-forms.checkbox-button>
                            </div>
                        </div>
                        <div class="w-full mb-2 mt-8 relative">
                            @if ($categoryEdit->urlImage)
                            <div class="w-full max-w-md rounded-lg overflow-hidden mb-2 border border-gray-500">
                                <img class="w-full" src="{{$categoryEdit->urlImage->temporaryUrl()}}" alt="Preview" >
                            </div> 
                            @elseif (!empty($categoryEdit->url_img))
                            <div class="w-full max-w-md rounded-lg overflow-hidden mb-2 border border-gray-500">
                                <img class="w-full" src="{{Storage::url($categoryEdit->url_img)}}" alt="Preview" >
                            </div>
                            @endif
                            <x-forms.input-file wire:model="categoryEdit.urlImage" id="edit-url_img" wire:key="{{$categoryEdit->urlImageKey}}">Seleccionar imagen...</x-forms.input-file>
                            @error('categoryEdit.url_img') 
                            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                            @enderror 
                        </div>
                        <div class="w-full mt-8 flex items-center justify-end gap-x-2">
                            <x-button type="submit" btn_type="secondary">guardar</x-button>
                            <x-button btn_type="outline" type="button" x-on:click="modalEdit = false">
                                Cancelar
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal editar --}}

    {{-- Modal eliminar --}}
    <div x-show='modalDelete' class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 min-h-screen max-h-full bg-black bg-opacity-80 transition-opacity"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex flex-col items-center justify-between px-4 py-2 md:p-5 rounded-t dark:border-gray-600">
                    <h3 class="w-full text-2xl text-center font-semibold text-black">
                        Eliminar Categoría
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 relative">
                    <form wire:submit.prevent="destroy">
                        <div wire:loading class="absolute w-full h-full top-0 left-0 overflow-hidden bg-black bg-opacity-30 p-1 flex items-center justify-center z-10" x-show="loading">
                            <x-loading size="md"></x-loading>
                        </div>
                        <div class="w-full mb-2 mt-4 relative">
                            <p class="w-full text-left">¿Está seguro de eliminar la categoría <span class="font-bold">"{{ $categoryDelete['nombre'] }}"</span>? Todos los datos sobre esta categoría serán borrados permanetemente de la base de datos.</p>
                        </div>
                        <div class="w-full mt-8 flex items-center justify-end gap-x-2">
                            <x-button type="submit" btn_type="secondary">Eliminar</x-button>
                            <x-button btn_type="outline" type="button" x-on:click="modalDelete = false">
                                Cancelar
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal eliminar --}}
</div>
