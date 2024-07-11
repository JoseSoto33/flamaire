<?php

namespace App\Livewire;

use App\Livewire\Forms\Ajustes\AjustesForm;
use App\Models\Ajuste;
use App\Models\Divisa;
use Livewire\Component;

class AdminSettings extends Component
{
    public $title;
    public AjustesForm $ajustesData;

    public function mount ()
    {
        $this->title = 'Ajustes';

        $data = Ajuste::where('campo', 'like', 'pg_general_%')->where('status', true);
        if ($data->exists()) {
            $result = $data->get();
            foreach ($result as $key => $row) {
                $this->ajustesData->fields[$row->campo] = $row->valor;
            }
        }
    }

    public function save ()
    {
        $this->ajustesData->save();
        $this->dispatch('data-saved');
    }

    public function render()
    {
        $divisas = Divisa::where('status', true)->get();
        return view('livewire.admin-settings', compact('divisas'));
    }
}
