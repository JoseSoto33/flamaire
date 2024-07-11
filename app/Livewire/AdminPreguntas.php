<?php

namespace App\Livewire;

use App\Livewire\Forms\Preguntas\QuestionCreateForm;
use App\Livewire\Forms\Preguntas\QuestionEditForm;
use App\Models\PreguntaFrecuente;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('components.layouts.layout-admin')] 
class AdminPreguntas extends Component
{
    use WithPagination, WithFileUploads, WithoutUrlPagination;
    
    public $title = null;
    public $search = null;

    public $id_pregunta;

    public QuestionCreateForm $preguntaAdd;
    public QuestionEditForm $preguntaEdit;

    public $showPregunta = [
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
        $this->preguntaAdd->save();
        $this->resetPage();
        $this->dispatch('data-saved'); 
    }

    public function show ($idPregunta)
    {
        $this->reset('showPregunta');

        $pregunta = PreguntaFrecuente::find($idPregunta);
        $this->showPregunta['pregunta'] = $pregunta->pregunta;
        $this->showPregunta['respuesta'] = $pregunta->respuesta;
        $this->showPregunta['status'] = $pregunta->status;

        $this->dispatch('data-laoded'); 
    }

    public function edit ($idPregunta) 
    {
        $this->preguntaEdit->edit($idPregunta);
        $this->dispatch('data-laoded'); 
    }

    public function update ()
    {
        $this->preguntaEdit->update();
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
