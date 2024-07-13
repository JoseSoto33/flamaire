<?php

namespace App\Livewire\Forms\Ajustes;

use App\Models\Ajuste;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use Livewire\Form;

class AjustesPageForm extends Form
{
    public $prefix = 'pg_general';
    public $fields = [
        'meta_title' => '',
        'meta_description' => '',
        'titulo_pestania' => '',
        'titulo_header' => '',
        'titulo' => '',
        'titulo_regiones' => '',
        'titulo_area_categorias' => '',
        'descripcion' => '',
        'descripcion_area_categorias' => '',
        'descripcion_regiones' => '',
        'descripcion_detallada' => '',
    ];

    public function edit ($page_prefix = 'pg_general')
    {
        $this->reset();
        
        $this->prefix = $page_prefix;
        $data = Ajuste::where('campo', 'like', $page_prefix.'_%');
        if ($data->exists()) {
            $result = $data->get();
            foreach ($result as $key => $row) {
                $index = Str::swap([$this->prefix.'_' => ''], $row->campo);
                if (isset($this->fields[$index])) $this->fields[$index] = $row->valor;
            }
        }   
    }

    public function update ()
    {
        $upsert = [];
        foreach ($this->fields as $key => $field) {
            if (!empty($field)) $upsert[] = ['campo' => $this->prefix . '_' . $key, 'valor' => $field];
        }

        if (count($upsert)) {
            $ajuste = Ajuste::upsert($upsert, uniqueBy: ['campo'], update: ['valor']);
        }

        $this->reset();
    }
}
