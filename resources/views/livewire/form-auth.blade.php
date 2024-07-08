<div id="auth-form" class="w-full max-w-lg min-h-40 bg-white rounded-lg shadow-sm shadow-gray-200 p-4">
    <div class="w-full mb-4 flex items-center justify-center">
        <a href="{{ route('home') }}/">
            <img class="w-full max-w-64" src="{{ asset('img/flamaire-logo-2.png') }}" alt="" srcset="">
        </a>
    </div>
    <form wire:submit.prevent="save">
        <div class="w-full mb-2 mt-4 relative">
            <label for="email" class="form-label">Email:</label>
            <x-forms.input type="text" wire:model="email" id="email" />
            @error('email') 
            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
            @enderror 
        </div>
        <div class="w-full mb-4 mt-6 relative">
            <label for="password" class="form-label">Password:</label>
            <x-forms.input type="password" wire:model="password" id="password" />
            @error('password') 
            <x-forms.msg-error>{{ $message }}</x-forms.msg-error>
            @enderror 
            @if($errors->has('error'))
            <x-forms.msg-error>{{ $errors->first('error') }}</x-forms.msg-error>
            @endif
        </div>
        <div class="w-full mb-4">
            <x-forms.checkbox wire:model="remember_me" id="remember_me">
                Recordarme
            </x-forms.checkbox>
        </div>
        <div class="w-full my-4 flex items-center justify-center">
            <hr class="w-full max-w-16 border-primary-600 h-px">
            <span class="w-3 h-3 rounded-full bg-primary-600 mx-2"></span>
            <hr class="w-full max-w-16 border-primary-600 h-px">
        </div>
        <div class="w-full mb-4">
            <p class="flex items-center justify-start">¿Olvidaste tu contraseña? <x-link class="inline ml-1" link_type='' href="#">Recupera tu contraseña</x-link> </p>
        </div>
        <div class="w-full">
            <x-button type="submit" btn_type="secondary" full="true">Inicia Sesión</x-button>
        </div>
    </form>
</div>
