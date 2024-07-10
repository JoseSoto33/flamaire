<?php

namespace App\Livewire;

use App\Models\PreguntaFrecuente;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('components.layouts.layout-admin')] 
class AdminPreguntas extends Component
{
    use WithPagination, WithFileUploads;
    
    public $title = null;
    public $search = null;

    public $id_pregunta;

    public $preguntaAdd = [
        'pregunta' => '',
        'respuesta' => '',
        'status' => null
    ];

    public $preguntaEdit = [
        'pregunta' => '',
        'respuesta' => '',
        'status' => null
    ];

    public $preguntaDelete = [
        'pregunta' => '',
        'respuesta' => '',
        'status' => null
    ];

    public function mount ()
    {
        $this->title = 'Preguntas Frecuentes';
    }

    public function save ()
    {
        $pregunta = PreguntaFrecuente::create([
            'pregunta' => $this->preguntaAdd['pregunta'],
            'respuesta' => $this->preguntaAdd['respuesta'],
            'status' => $this->preguntaAdd['status']
        ]);

        $this->reset('preguntaAdd');
        $this->resetPage();
        $this->dispatch('data-saved'); 
    }

    public function show ($idPregunta)
    {
        $this->reset('preguntaEdit');

        $pregunta = PreguntaFrecuente::find($idPregunta);
        $this->id_pregunta = $pregunta->id;
        $this->preguntaEdit['pregunta'] = $pregunta->pregunta;
        $this->preguntaEdit['respuesta'] = $pregunta->respuesta;
        $this->preguntaEdit['status'] = $pregunta->status;

        $this->dispatch('data-laoded'); 
    }

    public function edit ($idPregunta) 
    {
        $this->id_pregunta = $idPregunta;
        $pregunta = PreguntaFrecuente::find($idPregunta);
        $this->preguntaEdit['pregunta'] = $pregunta->pregunta;
        $this->preguntaEdit['respuesta'] = $pregunta->respuesta;
        $this->preguntaEdit['status'] = $pregunta->status;
   
        $this->dispatch('data-laoded'); 
    }

    public function update ()
    {
        $pregunta = PreguntaFrecuente::find($this->id_pregunta);
        $update = [
            'pregunta' => $this->preguntaEdit['pregunta'],
            'respuesta' => $this->preguntaEdit['respuesta'],
            'status' => $this->preguntaEdit['status']
        ];
                
        $pregunta->update($update);

        $this->reset('id_pregunta', 'preguntaEdit');
        $this->dispatch('data-updated'); 
    }

    public function delete ($idPregunta)
    {
        $this->id_pregunta = $idPregunta;
        $pregunta = PreguntaFrecuente::find($idPregunta);
        $this->preguntaDelete['pregunta'] = $pregunta->pregunta;
        $this->preguntaDelete['respuesta'] = $pregunta->respuesta;
        $this->preguntaDelete['status'] = $pregunta->status;

        $this->dispatch('data-laoded');        
    }

    public function destroy ()
    {
        $pregunta = PreguntaFrecuente::find($this->id_pregunta);
        $pregunta->delete();

        $this->reset('id_pregunta', 'preguntaDelete');
        $this->resetPage();
        $this->dispatch('data-deleted');        
    }

    public function render()
    {
        $preguntas = PreguntaFrecuente::orderBy('id', 'desc')->paginate(5);

        return view('livewire.admin-preguntas', compact('preguntas'));
    }
}
