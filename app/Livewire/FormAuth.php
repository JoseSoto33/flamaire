<?php

namespace App\Livewire;

use App\Models\Sesion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
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
            Log::info('Autenticación exitosa para usuario con email: ' . $this->email);

            $request->session()->regenerate();
            Log::info('Sesión regenerada.');

            // Verifica si la sesión se está creando en la base de datos
            $sessionId = $request->session()->getId();
            Log::info('ID de la sesión: ' . $sessionId);

            $sessionExists = DB::table('sessions')->where('id', $sessionId)->exists();
            if ($sessionExists) {
                Log::info('Sesión creada correctamente en la base de datos.');
            } else {
                Log::error('Sesión no creada en la base de datos.');
            }

            // Verificar si la sesión se crea correctamente
            if ($request->session()->has('session_name')) {
                Log::info('Sesión creada correctamente.');
            } else {
                Log::error('Sesión no creada.');
            }
            $data = $request->session()->all();
            Log::info('Session_data: ' . json_encode($data));
 
            $this->reset(); 
            return redirect()->route('dashboard');
        }
        $this->addError('error', 'El email o la contraseña son incorrectos, verifique sus datos e intente nuevamente.');
        return back()
                ->withErrors(['error' => 'El email o la contraseña son incorrectos, verifique sus datos e intente nuevamente.'])
                ->withInput();
    }

    public function render()
    {
        return view('livewire.form-auth');
    }
}
