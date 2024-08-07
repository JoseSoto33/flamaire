<div class="w-full relative p-4" 
    x-data="{ 
        loading: true,
        titulo: '',
        parrafo: '',
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
    
    <div id="generalContent" class="w-full p-4 shadow-lg rounded-lg">
        <h1 class="w-full p-4 mb-2 text-4xl text-center font-semibold">
            {{ $title }}
        </h1>
        <p class="w-full text-left mb-2 font-normal text-gray-700">
            Para colocar una palabra <span class="font-bold text-primary-600 inline">resaltada</span> en los textos que se muestran en la página, coloque dicha palabra entre corchetes dobles de la siguiente manera: [[palabra]]. De esta manera la <span class="font-bold text-primary-600 inline">palabra</span> quedará resaltada.
        </p>

        <p class="w-full text-left mb-2 font-normal text-gray-700">
            Esta función no se aplica en los textos de meta-title, meta-description ni el título de pestaña.
        </p>

        <form id="generalForm" class="w-full flex flex-col relative mt-8 gap-y-5" wire:submit.prevent="save" x-on:submit="scrollToTop('generalContent')">
            <div wire:loading class="absolute w-full h-full top-0 left-0 overflow-hidden bg-black bg-opacity-30 p-1 flex items-center justify-center z-10">
                <x-loading size="md"></x-loading>
            </div>
            <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                    <label for="cant-anuncios" class="form-label">Anuncios en pantalla:</label>
                    <x-forms.input type="number" wire:model="ajustesData.fields.num_cards" id="cant-anuncios" min="5" step="1" />
                    @error('ajustesData.fields.num_cards') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                    <label for="pasarela" class="form-label">Pasarela de pagos:</label>
                    <x-forms.select type="text" wire:model="ajustesData.fields.payment" id="pasarela">
                        <option value="" disabled>Seleccionar</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </x-forms.select>
                    @error('ajustesData.fields.payment') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                    <label for="tarifas" class="form-label">Tarifas:</label>
                    <x-forms.select type="text" wire:model="ajustesData.fields.pricing" id="tarifas">
                        <option value="" disabled>Seleccionar</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </x-forms.select>
                    @error('ajustesData.fields.pricing') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                    <label for="divisa" class="form-label">Divisa:</label>
                    <x-forms.select type="text" wire:model="ajustesData.fields.divisa" id="divisa">
                        <option value="" disabled>Seleccionar</option>
                        @foreach ($divisas as $divisa)
                        <option value="{{$divisa->id}}">{{$divisa->divisaISO . ' - ' . $divisa->divisa_nombre}}</option>
                        @endforeach
                    </x-forms.select>
                    @error('ajustesData.fields.divisa') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                    <label for="monto-minimo" class="form-label">Monto mínimo:</label>
                    <x-forms.input type="number" wire:model="ajustesData.fields.min" id="monto-minimo" min="1" step="1" />
                    @error('ajustesData.fields.min') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                    <label for="monto-maximo" class="form-label">Monto máximo:</label>
                    <x-forms.input type="number" wire:model="ajustesData.fields.max" id="monto-maximo" min="2" step="1" />
                    @error('ajustesData.fields.max') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                    <label for="meta-title" class="form-label">meta-title:</label>
                    <x-forms.textarea wire:model="ajustesData.fields.meta_title" id="meta-title"></x-forms.textarea>
                    @error('ajustesData.fields.meta_title') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                    <label for="meta-description" class="form-label">meta-description:</label>
                    <x-forms.textarea wire:model="ajustesData.fields.meta_description" id="meta-description"></x-forms.textarea>
                    @error('ajustesData.meta_description') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                    <label for="titulo-pestania" class="form-label">Título pestaña:</label>
                    <x-forms.input type="text" wire:model="ajustesData.fields.titulo_pestania" id="titulo-pestania" />
                    @error('ajustesData.fields.titulo_pestania') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                    <label for="titulo" class="form-label">Título H1:</label>
                    <x-forms.input type="text" wire:model="ajustesData.fields.titulo_header" id="titulo" />
                    @error('ajustesData.fields.titulo_header') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                    <label for="titulo-h2" class="form-label">Título H2:</label>
                    <x-forms.input type="text" wire:model="ajustesData.fields.titulo" id="titulo-h2" />
                    @error('ajustesData.fields.titulo') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                    <label for="titulo-h3" class="form-label">Título Regiones H3:</label>
                    <x-forms.input type="text" wire:model="ajustesData.fields.titulo_regiones" id="titulo-h3" />
                    @error('ajustesData.fields.titulo_regiones') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg">
                    <label for="titulo-cat-h3" class="form-label">Título Categorías H3:</label>
                    <x-forms.input type="text" wire:model="ajustesData.fields.titulo_area_categorias" id="titulo-cat-h3" />
                    @error('ajustesData.fields.titulo_area_categorias') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/2">
                    <label for="descripcion-p" class="form-label">Descripción P:</label>
                    <x-forms.textarea wire:model="ajustesData.fields.descripcion" id="descripcion-p"></x-forms.textarea>
                    @error('ajustesData.fields.descripcion') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/2">
                    <label for="descripcion-cat-p" class="form-label">Descripción Categorías P:</label>
                    <x-forms.textarea wire:model="ajustesData.fields.descripcion_area_categorias" id="descripcion-cat-p"></x-forms.textarea>
                    @error('ajustesData.fields.descripcion_area_categorias') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/2">
                    <label for="descripcion-regiones" class="form-label">Descripción Regiones:</label>
                    <x-forms.textarea wire:model="ajustesData.fields.descripcion_regiones" id="descripcion-regiones"></x-forms.textarea>
                    @error('ajustesData.fields.descripcion_regiones') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/2">
                    <label for="descripcion-h4" class="form-label">Descripción Detallada H4:</label>
                    <x-forms.textarea wire:model="ajustesData.fields.descripcion_detallada" id="descripcion-h4"></x-forms.textarea>
                    @error('ajustesData.fields.descripcion_detallada') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
            </div>
            <div class="w-full flex items-center justify-end">
                <x-button type="submit" btn_type="secondary">Guardar</x-button>
            </div>
        </form>
    </div>

    <div class="w-full p-4 shadow-lg rounded-lg mt-8 flex flex-col items-center justify-center">
        <h1 class="w-full p-4 mb-2 text-4xl text-center font-semibold">
            Ajustes de páginas
        </h1>
        <div class="w-full py-4 flex flex-wrap max-w-3xl items-stretch justify-center gap-8">
            <button type="button" wire:click="edit('pg_login')"
                @click="modalEdit = true; loading = false; titulo = 'Login'; parrafo = '' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Login</span>
            </button>
            <button type="button" wire:click="edit('pg_registro')"
                @click="modalEdit = true; loading = false; titulo = 'Registro'; parrafo = '' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Registro</span>
            </button>
            <button type="button" wire:click="edit('pg_detalles_anuncio')"
                @click="modalEdit = true; loading = false; titulo = 'Detalles de Anuncio'; parrafo = 'Puede agregar etiquetas de <categoria>, <ciudad>, <zona> y <titulo>, y serán reemplazados por los valores respectivos pertenecientes al anuncio que se esté consultando.' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Detalles de Anuncio</span>
            </button>
            <button type="button" wire:click="edit('pg_categorias')"
                @click="modalEdit = true; loading = false; titulo = 'Categorías'; parrafo = 'Para imprimir la categoría en los textos, agrege la etiqueta <categoria> y esta será reemplazada por el nombre de la categoría seleccionada.' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Categorías</span>
            </button>
            <button type="button" wire:click="edit('pg_paises')"
                @click="modalEdit = true; loading = false; titulo = 'Países'; parrafo = 'Para imprimir el país, agrege la etiqueta <pais> y esta será reemplazada por el nombre del país seleccionado.' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Países</span>
            </button>
            <button type="button" wire:click="edit('pg_regiones_estados_departamentos')"
                @click="modalEdit = true; loading = false; titulo = 'Ciudades'; parrafo = 'Para imprimir la ciudad, agrege la etiqueta <ciudad> y esta será reemplazada por el nombre de la ciudad seleccionada.' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Ciudades</span>
            </button>
            <button type="button" wire:click="edit('pg_cat_regiones_estados_departamentos')"
                @click="modalEdit = true; loading = false; titulo = 'Categorías/Ciudades'; parrafo = 'Para imprimir la categoría en los textos, agrege la etiqueta <categoria> y esta será reemplazada por el nombre de la categoría, y para la ciudad en los textos, agrege la etiqueta <ciudad> y esta será reemplazada por el nombre de la ciudad seleccionada.' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Categorías/Ciudades</span>
            </button>
            <button type="button" wire:click="edit('pg_ciudades_zonas')"
                @click="modalEdit = true; loading = false; titulo = 'Zonas'; parrafo = 'Para imprimir la zona en los textos, agrege la etiqueta <zona> y esta será reemplazada por el nombre de la zona seleccionada. También puede agregar la etiqueta <ciudad> y será reemplazada por el nombre de la ciudad a la que pertenece la ciudad seleccionada.' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Zonas</span>
            </button>
            <button type="button" wire:click="edit('pg_cat_ciudades_zonas')"
                @click="modalEdit = true; loading = false; titulo = 'Categorías/Ciudades/Zonas'; parrafo = 'Para imprimir la categoría en los textos, agrege la etiqueta <categoria> y esta será reemplazada por el nombre de la categoría; para la ciudad, puede agregar la etiqueta <ciudad>, y para la zona, agrege la etiqueta <zona>.' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Categorías/Ciudades/Zonas</span>
            </button>
            <button type="button" wire:click="edit('pg_servicios')"
                @click="modalEdit = true; loading = false; titulo = 'Servicios'; parrafo = 'Para imprimir el servicio en los textos, agrege la etiqueta <servicio> y esta será reemplazada por el nombre del servicio seleccionada.' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Servicios</span>
            </button>
            <button type="button" wire:click="edit('pg_serv_especiales')"
                @click="modalEdit = true; loading = false; titulo = 'Servicios Especiales'; parrafo = 'Para imprimir el servicio especial en los textos, agrege la etiqueta <servicio> y esta será reemplazada por el nombre del servicio especial seleccionada.' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Servicios Especiales</span>
            </button>
            <button type="button" wire:click="edit('pg_desc_fisica')"
                @click="modalEdit = true; loading = false; titulo = 'Descripción Física'; parrafo = 'Para imprimir la descripción física en los textos, agrege la etiqueta <apariencia> y esta será reemplazada por el nombre de la descripción física.' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Descripción Física</span>
            </button>
            <button type="button" wire:click="edit('pg_horarios')"
                @click="modalEdit = true; loading = false; titulo = 'Horarios'; parrafo = 'Para imprimir el horario en los textos, agrege la etiqueta <horario> y esta será reemplazada por el horario seleccionado.' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Horarios</span>
            </button>
            <button type="button" wire:click="edit('pg_medios_pago')"
                @click="modalEdit = true; loading = false; titulo = 'Medios de pago'; parrafo = 'Para imprimir el método de pago en los textos, agrege la etiqueta <forma-pago> y esta será reemplazada por el método de pago seleccionado.' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Medios de pago</span>
            </button>
            <button type="button" wire:click="edit('pg_disposiciones')"
                @click="modalEdit = true; loading = false; titulo = 'Disposiciones'; parrafo = 'Para imprimir la disposición en los textos, agrege la etiqueta <disposicion> y esta será reemplazada por la disposición seleccionada.' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Disposiciones</span>
            </button>
            <button type="button" wire:click="edit('pg_panel_perfil')"
                @click="modalEdit = true; loading = false; titulo = 'Panel Perfil'; parrafo = '' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Panel Perfil</span>
            </button>
            <button type="button" wire:click="edit('pg_perfiles')"
                @click="modalEdit = true; loading = false; titulo = 'Perfiles'; parrafo = '' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Perfiles</span>
            </button>
            <button type="button" wire:click="edit('pg_favoritas')"
                @click="modalEdit = true; loading = false; titulo = 'Favoritas'; parrafo = '' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Favoritas</span>
            </button>
            <button type="button" wire:click="edit('pg_regiones')"
                @click="modalEdit = true; loading = false; titulo = 'Regiones'; parrafo = '' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Regiones</span>
            </button>
            <button type="button" wire:click="edit('pg_contacto')"
                @click="modalEdit = true; loading = false; titulo = 'Contáctenos'; parrafo = '' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Contáctenos</span>
            </button>
            <button type="button" wire:click="edit('pg_denuncia')"
                @click="modalEdit = true; loading = false; titulo = 'Denuncias'; parrafo = '' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Denuncias</span>
            </button>
            <button type="button" wire:click="edit('pg_terminos_legales')"
                @click="modalEdit = true; loading = false; titulo = 'Texto - Términos Legales'; parrafo = '' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Texto - Términos Legales</span>
            </button>
            <button type="button" wire:click="edit('pg_politicas_privacidad')"
                @click="modalEdit = true; loading = false; titulo = 'Políticas de privacidad'; parrafo = '' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Políticas de privacidad</span>
            </button>
            <button type="button" wire:click="edit('pg_politicas_pagos')"
                @click="modalEdit = true; loading = false; titulo = 'Políticas de pagos'; parrafo = '' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Políticas de pagos</span>
            </button>
            <button type="button" wire:click="edit('pg_ubicacion')"
                @click="modalEdit = true; loading = false; titulo = 'Ubicación Restringida'; parrafo = '' " 
                class="w-40 flex flex-col items-center justify-center p-4 rounded-lg bg-white border border-white hover:border-gray-500 hover:shadow-xl">
                <svg class="w-10 h-10 fill-tertiary stroke-tertiary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z"/>
                </svg>
                <span class="w-full mt-2 text-lg text-black font-semibold text-center text-wrap">Ubicación Restringida</span>
            </button>
        </div>
    </div>

    {{-- Modal editar --}}
    <div x-show='modalEdit' id="modalEdit" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 min-h-screen max-h-full bg-black bg-opacity-80 transition-opacity"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="relative p-4 w-full max-w-[95%] max-h-full mx-auto sm:max-w-[90%]">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex flex-col items-center justify-between px-4 py-2 md:p-5 rounded-t dark:border-gray-600">
                    <h3 class="w-full text-2xl text-center font-semibold text-black">
                        Editar títulos de "<span x-text="titulo"></span>"
                    </h3>
                    <p class="w-full text-md text-left mt-2 font-medium text-black">
                        Para agregar palabras resaltadas, utilice "[[" y "]]" para encerrar la palabra que quiere resaltar. Por ejemplo: [[detallado]]; esto hará que la palabra aparezca <span class="font-bold text-primary-600 inline">resaltada</span>.
                    </p>
                    <p class="w-full text-md text-left mt-2 font-medium text-black" x-text="parrafo" x-show="parrafo != ''">
                    </p>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 relative">
                    <form wire:submit.prevent="update" class="w-full flex flex-col relative gap-y-5" x-on:submit="scrollToTop('modalEdit')">
                        <div wire:loading class="absolute w-full h-full top-0 left-0 overflow-hidden bg-black bg-opacity-30 p-1 flex items-center justify-center z-10" x-show="loading">
                            <x-loading size="md"></x-loading>
                        </div>
                        <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                            <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                                <label for="meta-title" class="form-label">meta-title:</label>
                                <x-forms.textarea wire:model="ajustesSiteData.fields.meta_title" id="meta-title"></x-forms.textarea>
                                @error('ajustesSiteData.fields.meta_title') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                                <label for="meta-description" class="form-label">meta-description:</label>
                                <x-forms.textarea wire:model="ajustesSiteData.fields.meta_description" id="meta-description"></x-forms.textarea>
                                @error('ajustesSiteData.meta_description') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                        </div>
                        <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                            <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                                <label for="titulo-pestania" class="form-label">Título pestaña:</label>
                                <x-forms.input type="text" wire:model="ajustesSiteData.fields.titulo_pestania" id="titulo-pestania" />
                                @error('ajustesSiteData.fields.titulo_pestania') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                                <label for="titulo" class="form-label">Título H1:</label>
                                <x-forms.input type="text" wire:model="ajustesSiteData.fields.titulo_header" id="titulo" />
                                @error('ajustesSiteData.fields.titulo_header') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                        </div>
                        <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                            <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                                <label for="titulo-h2" class="form-label">Título H2:</label>
                                <x-forms.input type="text" wire:model="ajustesSiteData.fields.titulo" id="titulo-h2" />
                                @error('ajustesSiteData.fields.titulo') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/3">
                                <label for="titulo-h3" class="form-label">Título Regiones H3:</label>
                                <x-forms.input type="text" wire:model="ajustesSiteData.fields.titulo_regiones" id="titulo-h3" />
                                @error('ajustesSiteData.fields.titulo_regiones') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                        </div>
                        <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                            <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg">
                                <label for="titulo-cat-h3" class="form-label">Título Categorías H3:</label>
                                <x-forms.input type="text" wire:model="ajustesSiteData.fields.titulo_area_categorias" id="titulo-cat-h3" />
                                @error('ajustesSiteData.fields.titulo_area_categorias') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/2">
                                <label for="descripcion-p" class="form-label">Descripción P:</label>
                                <x-forms.textarea wire:model="ajustesSiteData.fields.descripcion" id="descripcion-p"></x-forms.textarea>
                                @error('ajustesSiteData.fields.descripcion') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/2">
                                <label for="descripcion-cat-p" class="form-label">Descripción Categorías P:</label>
                                <x-forms.textarea wire:model="ajustesSiteData.fields.descripcion_area_categorias" id="descripcion-cat-p"></x-forms.textarea>
                                @error('ajustesSiteData.fields.descripcion_area_categorias') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                        </div>
                        <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                            <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/2">
                                <label for="descripcion-descripcion_regiones" class="form-label">Descripción Regiones:</label>
                                <x-forms.textarea wire:model="ajustesSiteData.fields.descripcion_regiones" id="descripcion-descripcion_regiones"></x-forms.textarea>
                                @error('ajustesSiteData.fields.descripcion_regiones') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                            <div class="w-full flex p-2 pt-4 border border-gray-500 relative rounded-md shadow-lg md:flex-1 md:max-w-1/2">
                                <label for="descripcion-h4" class="form-label">Descripción Detallada H4:</label>
                                <x-forms.textarea wire:model="ajustesSiteData.fields.descripcion_detallada" id="descripcion-h4"></x-forms.textarea>
                                @error('ajustesSiteData.fields.descripcion_detallada') 
                                <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                                @enderror 
                            </div>
                        </div>
                        <div class="w-full mt-8 flex items-center justify-end gap-x-2">
                            <x-button type="submit" btn_type="secondary">guardar</x-button>
                            <x-button btn_type="outline" type="button" x-on:click="modalEdit = false; titulo = ''; parrafo = ''">
                                Cancelar
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal editar --}}
</div>
