<?php

namespace App\Livewire\Forms\Preguntas;

use App\Models\PreguntaFrecuente;
use Illuminate\Database\Query\Builder;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class QuestionEditForm extends Form
{
    #[Validate]
    public $id;
    public $pregunta = '';
    public $respuesta = '';
    public $status = false;

    public function rules ()
    {
        return [
            'pregunta' => [
                'required',
                'unique' => Rule::unique('preguntas_frecuentes')->ignore($this->id),
                'regex:/^[0-9a-zA-Zá-üÁ-Ü¿?¡!-_+<>\[\]\.:,;\/\s]+/i',
            ],
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

    public function edit ($idPregunta)
    {
        $this->id = $idPregunta;
        $pregunta = PreguntaFrecuente::find($idPregunta);
        $this->pregunta = $pregunta->pregunta;
        $this->respuesta = $pregunta->respuesta;
        $this->status = $pregunta->status;
    }

    public function update ()
    {
        $pregunta = PreguntaFrecuente::find($this->id);
        $update = [
            'pregunta' => $this->pregunta,
            'respuesta' => $this->respuesta,
            'status' => $this->status
        ];
                
        $pregunta->update($update);

        $this->reset();
    }
}
