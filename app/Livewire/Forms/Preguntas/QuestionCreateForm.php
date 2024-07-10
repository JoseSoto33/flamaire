<?php

namespace App\Livewire\Forms\Preguntas;

use App\Models\PreguntaFrecuente;
use Livewire\Attributes\Validate;
use Livewire\Form;

class QuestionCreateForm extends Form
{
    #[Validate]
    public $pregunta = '';
    public $respuesta = '';
    public $status = false;

    public function rules ()
    {
        return [
            'pregunta' => 'required|unique:App\Models\PreguntaFrecuente,pregunta|regex:/^[0-9a-zA-Zá-üÁ-Ü¿?¡!-_+<>\[\]\.:,;\/\s]+/i',
            'respuesta' => 'required|regex:/^[0-9a-zA-Zá-üÁ-Ü¿?¡!-_+<>\[\]\.:,;\/\s]+/i',
            'status' => 'required',
        ];
    }

    public function messages ()
    {
        return [
            'pregunta.required' => 'Debe ingresar la pregunta.',
            'pregunta.regex' => 'La pregunta sólo puede llevar letras, números y algunos signos de puntuación.',
            'pregunta.unique' => 'No se puede repetir la pregunta.',
            'respuesta.required' => 'Debe ingresar una respuesta.',
            'respuesta.regex' => 'La respuesta sólo puede llevar letras, números y algunos signos de puntuación.',
            'status.required' => 'Debe especificar el status de la pregunta.',
        ];
    }

    public function save ()
    {
        $this->validate();
        $pregunta = PreguntaFrecuente::create([
            'pregunta' => $this->pregunta,
            'respuesta' => $this->respuesta,
            'status' => $this->status
        ]);

        $this->reset();
    }
}
