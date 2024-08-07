<?php

namespace App\Livewire;

use App\Livewire\Forms\Ajustes\AjustesForm;
use App\Livewire\Forms\Ajustes\AjustesPageForm;
use App\Models\Ajuste;
use App\Models\Divisa;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminSettings extends Component
{
    public $title;
    public AjustesForm $ajustesData;
    public AjustesPageForm $ajustesSiteData;

    public function mount ()
    {
        $this->title = 'Ajustes';
        $this->ajustesData->prefix = "pg_general";
        $data = Ajuste::where('campo', 'like', 'pg_general_%');
        if ($data->exists()) {
            $result = $data->get();
            foreach ($result as $key => $row) {
                $this->ajustesData->fields[Str::swap([$this->ajustesData->prefix.'_' => ''], $row->campo)] = $row->valor;
            }
        }
    }

    public function save ()
    {
        $this->ajustesData->save();
        $this->dispatch('data-saved');
    }

    public function edit ($page_prefix = "pg_general")
    {
        $this->ajustesSiteData->edit($page_prefix);
        $this->dispatch('data-laoded'); 
    }

    public function update ()
    {
        $this->ajustesSiteData->update();
        $this->dispatch('data-updated');
    }

    public function render()
    {
        $divisas = Divisa::where('status', true)->get();
        return view('livewire.admin-settings', compact('divisas'));
    }
}
