<?php

namespace App\Livewire;

use App\Models\PreguntaFrecuente;
use Livewire\Component;

class PreguntasFrecuentes extends Component
{
    public $var_descripcion;

    public function mount($var_descripcion = null)
    {
        $this->var_descripcion = $var_descripcion;
    }
    public function render()
    {
        $preguntas = PreguntaFrecuente::where('status', true)->orderBy('id', 'asc')->get();
        return view('livewire.preguntas-frecuentes', compact('preguntas'));
    }
}
