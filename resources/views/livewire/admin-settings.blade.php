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
    
    <div id="generalContent" class="w-full p-4 shadow-md rounded-lg">
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
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md md:flex-1 md:max-w-1/3">
                    <label for="cant-anuncios" class="form-label">Anuncios en pantalla:</label>
                    <x-forms.input type="number" wire:model="ajustesData.fields.pg_general_num_cards" id="cant-anuncios" min="5" step="1" />
                    @error('ajustesData.fields.pg_general_num_cards') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md md:flex-1 md:max-w-1/3">
                    <label for="pasarela" class="form-label">Pasarela de pagos:</label>
                    <x-forms.select type="text" wire:model="ajustesData.fields.pg_general_payment" id="pasarela">
                        <option value="" disabled>Seleccionar</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </x-forms.select>
                    @error('ajustesData.fields.pg_general_payment') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md md:flex-1 md:max-w-1/3">
                    <label for="tarifas" class="form-label">Tarifas:</label>
                    <x-forms.select type="text" wire:model="ajustesData.fields.pg_general_pricing" id="tarifas">
                        <option value="" disabled>Seleccionar</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </x-forms.select>
                    @error('ajustesData.fields.pg_general_pricing') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md md:flex-1 md:max-w-1/3">
                    <label for="divisa" class="form-label">Divisa:</label>
                    <x-forms.select type="text" wire:model="ajustesData.fields.pg_general_divisa" id="divisa">
                        <option value="" disabled>Seleccionar</option>
                        @foreach ($divisas as $divisa)
                        <option value="{{$divisa->id}}">{{$divisa->divisaISO . ' - ' . $divisa->divisa_nombre}}</option>
                        @endforeach
                    </x-forms.select>
                    @error('ajustesData.fields.pg_general_divisa') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md md:flex-1 md:max-w-1/3">
                    <label for="monto-minimo" class="form-label">Monto mínimo:</label>
                    <x-forms.input type="number" wire:model="ajustesData.fields.pg_general_min" id="monto-minimo" min="1" step="1" />
                    @error('ajustesData.fields.pg_general_min') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md md:flex-1 md:max-w-1/3">
                    <label for="monto-maximo" class="form-label">Monto máximo:</label>
                    <x-forms.input type="number" wire:model="ajustesData.fields.pg_general_max" id="monto-maximo" min="2" step="1" />
                    @error('ajustesData.fields.pg_general_max') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md md:flex-1 md:max-w-1/3">
                    <label for="meta-title" class="form-label">meta-title:</label>
                    <x-forms.textarea wire:model="ajustesData.fields.pg_general_meta_title" id="meta-title"></x-forms.textarea>
                    @error('ajustesData.fields.pg_general_meta_title') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md md:flex-1 md:max-w-1/3">
                    <label for="meta-description" class="form-label">meta-description:</label>
                    <x-forms.textarea wire:model="ajustesData.fields.pg_general_meta_description" id="meta-description"></x-forms.textarea>
                    @error('ajustesData.pg_general_meta_description') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md md:flex-1 md:max-w-1/3">
                    <label for="titulo-pestania" class="form-label">Título pestaña:</label>
                    <x-forms.input type="text" wire:model="ajustesData.fields.pg_general_titulo_pestania" id="titulo-pestania" />
                    @error('ajustesData.fields.pg_general_titulo_pestania') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md md:flex-1 md:max-w-1/3">
                    <label for="titulo" class="form-label">Título H1:</label>
                    <x-forms.input type="text" wire:model="ajustesData.fields.pg_general_titulo_header" id="titulo" />
                    @error('ajustesData.fields.pg_general_titulo_header') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md md:flex-1 md:max-w-1/3">
                    <label for="titulo-h2" class="form-label">Título H2:</label>
                    <x-forms.input type="text" wire:model="ajustesData.fields.pg_general_titulo" id="titulo-h2" />
                    @error('ajustesData.fields.pg_general_titulo') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md md:flex-1 md:max-w-1/3">
                    <label for="titulo-h3" class="form-label">Título Regiones H3:</label>
                    <x-forms.input type="text" wire:model="ajustesData.fields.pg_general_titulo_regiones" id="titulo-h3" />
                    @error('ajustesData.fields.pg_general_titulo_regiones') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md">
                    <label for="titulo-cat-h3" class="form-label">Título Categorías H3:</label>
                    <x-forms.input type="text" wire:model="ajustesData.fields.pg_general_titulo_area_categorias" id="titulo-cat-h3" />
                    @error('ajustesData.fields.pg_general_titulo_area_categorias') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md">
                    <label for="descripcion-cat-p" class="form-label">Descripción Categorías P:</label>
                    <x-forms.textarea wire:model="ajustesData.fields.pg_general_descripcion_area_categorias" id="descripcion-cat-p"></x-forms.textarea>
                    @error('ajustesData.fields.pg_general_descripcion_area_categorias') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
            </div>
            <div class="w-full flex flex-wrap justify-center items-start gap-x-4 gap-y-5">
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md md:flex-1 md:max-w-1/2">
                    <label for="descripcion-p" class="form-label">Descripción P:</label>
                    <x-forms.textarea wire:model="ajustesData.fields.pg_general_descripcion" id="descripcion-p"></x-forms.textarea>
                    @error('ajustesData.fields.pg_general_descripcion') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
                <div class="w-full flex p-2 pt-4 border-2 relative rounded-md shadow-md md:flex-1 md:max-w-1/2">
                    <label for="descripcion-h4" class="form-label">Descripción Detallada H4:</label>
                    <x-forms.textarea wire:model="ajustesData.fields.pg_general_descripcion_detallada" id="descripcion-h4"></x-forms.textarea>
                    @error('ajustesData.fields.pg_general_descripcion_detallada') 
                    <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                    @enderror 
                </div>
            </div>
            <div class="w-full flex items-center justify-end">
                <x-button type="submit" btn_type="secondary">Guardar</x-button>
            </div>
        </form>
    </div>
</div>
