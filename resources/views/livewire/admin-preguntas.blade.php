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
    <h1 class="w-full p-4 mb-8 text-4xl text-center font-semibold rounded-lg shadow-lg">
        {{ $title }}
    </h1>

    <div class="w-full relative">
        <div class="w-full py-2 flex items-center justify-between">
            <x-button btn_type="primary" type="button" x-on:click="modalAdd = true; loading = false;">
                Nueva Pregunta
            </x-button>
        </div>
    </div>

    <div class="w-full mt-4 mb-2 sm:w-1/2">
        <x-forms.input class="w-full" placeholder="Buscar..." wire:model.live="search" />
    </div>

    {{-- Listado de preguntas frecuentes --}}
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-secondary-300 uppercase bg-tertiary">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pregunta
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
                @if ($preguntas->count())
                @foreach ($preguntas as $pregunta)
                    <tr wire:key='faq-{{$pregunta->id}}' class="bg-secondary-100 cursor-pointer border-b hover:bg-secondary-200">
                        <td scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                            {{ $pregunta->id }}
                        </td>
                        <td class="max-w-lg px-6 py-4 font-medium text-black whitespace-nowrap overflow-hidden text-ellipsis">
                            {{ $pregunta->pregunta }}
                        </td>
                        <td class="px-6 py-4 font-medium text-black whitespace-nowrap">
                            @if ($pregunta->status)
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
                            <button type="button" wire:click="show({{$pregunta->id}})" @click="modalShow = true; loading = true;" class="inline-block bg-blue-600 p-2 rounded-md hover:bg-blue-900" alt="Ver Categoría">
                                <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>                                  
                            </button>
                            <button type="button" wire:click="edit({{$pregunta->id}})" @click="modalEdit = true; loading = true;" class="inline-block bg-green-600 p-2 rounded-md hover:bg-green-900" alt="Editar Categoría">
                                <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                </svg>
                            </button>
                            <button type="button" wire:click="delete({{$pregunta->id}})" @click="modalDelete = true; loading = true;" class="inline-block bg-red-600 p-2 rounded-md hover:bg-red-900" alt="Eliminar Categoría">
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
    {{-- Listado de preguntas frecuentes --}}
    <div class="mt-4">
        {{ $preguntas->links() }}
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
                        Detalles de la Pregunta Frecuente
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 relative">
                    <div class="absolute w-full h-full top-0 left-0 overflow-hidden bg-black bg-opacity-30 p-1 flex items-center justify-center z-10" x-show="loading">
                        <x-loading size="md"></x-loading>
                    </div>
                    <div class="w-full flex items-start justify-between -mx-2 mb-3">
                        <div class="w-full mb-1 sm:w-1/3 sm:mb-0 px-2 font-bold text-right">
                            Pregunta:
                        </div>
                        <div class="w-full mb-1 sm:w-2/3 sm:mb-0 px-2">
                            {{ $showPregunta['pregunta'] }}
                        </div>
                    </div>
                    <div class="w-full flex items-start justify-between -mx-2 mb-3">
                        <div class="w-full mb-1 sm:w-1/3 sm:mb-0 px-2 font-bold text-right">
                            Respuesta:
                        </div>
                        <div class="w-full mb-1 sm:w-2/3 sm:mb-0 px-2">
                            {{ $showPregunta['respuesta'] }}
                        </div>
                    </div>
                    <div class="w-full flex items-start justify-between -mx-2 mb-3">
                        <div class="w-full mb-1 sm:w-1/3 sm:mb-0 px-2 font-bold text-right">
                            Status:
                        </div>
                        <div class="w-full mb-1 sm:w-2/3 sm:mb-0 px-2">
                            @if ($showPregunta['status'])
                            Activo
                            @else
                            Inactivo
                            @endif
                        </div>
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
    <div x-show='modalAdd' id="modalAdd" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 min-h-screen max-h-full bg-black bg-opacity-80 transition-opacity"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex flex-col items-center justify-between px-4 py-2 md:p-5 rounded-t dark:border-gray-600">
                    <h3 class="w-full text-2xl text-center font-semibold text-black">
                        Nueva Pregunta Frecuente
                    </h3>
                    <p class="w-full text-sm text-left mt-2 font-medium text-black">
                        Para agregar palabras resaltadas, utilice "[[" y "]]" para encerrar la palabra que quiere resaltar. Por ejemplo: [[detallado]]; esto hará que la palabra aparezca <span class="font-bold text-primary-600 inline">resaltada</span>.
                    </p>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 relative">
                    <form wire:submit.prevent="save" x-on:submit="scrollToTop('modalAdd')">
                        <div wire:loading class="absolute w-full h-full top-0 left-0 overflow-hidden bg-black bg-opacity-30 p-1 flex items-center justify-center z-10">
                            <x-loading size="md"></x-loading>
                        </div>
                        <div class="w-full mb-2 mt-4 relative">
                            <label for="pregunta" class="form-label">Pregunta:</label>
                            <x-forms.input type="test" wire:model="preguntaAdd.pregunta" id="pregunta" />
                            @error('preguntaAdd.pregunta') 
                            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                            @enderror 
                        </div>
                        <div class="w-full mb-4 mt-6 relative">
                            <label for="respuesta" class="form-label">Respuesta:</label>
                            <x-forms.textarea wire:model="preguntaAdd.respuesta" id="respuesta"></x-forms.textarea>
                            @error('preguntaAdd.respuesta') 
                            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                            @enderror 
                        </div>
                        <div class="w-full mb-4 mt-6 relative flex gap-1">
                            <label for="status" class="form-label-line">Status:</label>
                            <x-forms.radio-button wire:model='preguntaAdd.status' id="activo" value="1">Activo</x-forms.radio-button>
                            <x-forms.radio-button wire:model='preguntaAdd.status' id="inactivo" value="0">Inactivo</x-forms.radio-button>
                            @error('preguntaAdd.status') 
                            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                            @enderror 
                            @if($errors->has('error'))
                            <x-forms.msg-error>{{ $errors->first('error') }}</x-forms.msg-error>
                            @endif
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
    <div x-show='modalEdit' id="modalEdit" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full inset-0 min-h-screen max-h-full bg-black bg-opacity-80 transition-opacity"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="relative p-4 w-full max-w-2xl max-h-full mx-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex flex-col items-center justify-between px-4 py-2 md:p-5 rounded-t dark:border-gray-600">
                    <h3 class="w-full text-2xl text-center font-semibold text-black">
                        Editar Pregunta Frecuente
                    </h3>
                    <p class="w-full text-sm text-left mt-2 font-medium text-black">
                        Para agregar palabras resaltadas, utilice "[[" y "]]" para encerrar la palabra que quiere resaltar. Por ejemplo: [[detallado]]; esto hará que la palabra aparezca <span class="font-bold text-primary-600 inline">resaltada</span>.
                    </p>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 relative">
                    <form wire:submit.prevent="update" x-on:submit="scrollToTop('modalAdd')">
                        <div wire:loading class="absolute w-full h-full top-0 left-0 overflow-hidden bg-black bg-opacity-30 p-1 flex items-center justify-center z-10" x-show="loading">
                            <x-loading size="md"></x-loading>
                        </div>
                        <div class="w-full mb-2 mt-4 relative">
                            <label for="edit-pregunta" class="form-label">Pregunta:</label>
                            <x-forms.input type="test" wire:model="preguntaEdit.pregunta" id="edit-pregunta" />
                            @error('preguntaEdit.pregunta') 
                            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                            @enderror 
                        </div>
                        <div class="w-full mb-4 mt-6 relative">
                            <label for="edit-respuesta" class="form-label">Respuesta:</label>
                            <x-forms.textarea wire:model="preguntaEdit.respuesta" id="edit-respuesta"></x-forms.textarea>
                            @error('preguntaEdit.respuesta') 
                            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                            @enderror 
                        </div>
                        <div class="w-full mb-4 mt-6 relative flex gap-1">
                            <label for="status" class="form-label-line">Status:</label>
                            <x-forms.radio-button wire:model='preguntaEdit.status' id="edit-activo" value="1">Activo</x-forms.radio-button>
                            <x-forms.radio-button wire:model='preguntaEdit.status' id="edit-inactivo" value="0">Inactivo</x-forms.radio-button>
                            @error('preguntaEdit.status') 
                            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
                            @enderror 
                            @if($errors->has('error'))
                            <x-forms.msg-error>{{ $errors->first('error') }}</x-forms.msg-error>
                            @endif
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
                        Eliminar Pregunta Frecuente
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 relative">
                    <form wire:submit.prevent="destroy">
                        <div wire:loading class="absolute w-full h-full top-0 left-0 overflow-hidden bg-black bg-opacity-30 p-1 flex items-center justify-center z-10" x-show="loading">
                            <x-loading size="md"></x-loading>
                        </div>
                        <div class="w-full mb-2 mt-4 relative">
                            <p class="w-full text-left">¿Está seguro de eliminar la pregunta <span class="font-bold">"{{ $preguntaDelete['pregunta'] }}"</span>? Todos los datos sobre esta categoría serán borrados permanetemente de la base de datos.</p>
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
