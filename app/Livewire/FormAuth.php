<?php

namespace App\Livewire;

use App\Models\Sesion;
use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormAuth extends Component
{
    #[Validate('required|email|exists:App\Models\Usuario,email')]
    public $email = null;

    #[Validate('required', as: 'contraseña')]
    public $password = null;
    
    public $remember_me = null;

    protected function messages()
    {
        return [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.exists' => 'El correo electrónico no se encuentra registrado.',
            'password.required' => 'Debe escribir su contraseña.',
        ];
    }

    public function save (Request $request)
    {
        $this->validate(); 

        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];
 
        if (Auth::attempt($credentials)) {
    
            $request->session()->regenerate();
 
            $this->reset(); 
            return redirect(route('dashboard').'/');
        }
        $this->addError('error', 'El email o la contraseña son incorrectos, verifique sus datos e intente nuevamente.');
        return back()
                ->withErrors(['error' => 'El email o la contraseña son incorrectos, verifique sus datos e intente nuevamente.'])
                ->withInput();
    }

    #[Layout('components.layouts.layout-auth')] 
    public function render()
    {
        return view('livewire.form-auth');
    }
}
