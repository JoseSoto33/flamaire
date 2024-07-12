<?php

namespace App\Livewire\Forms\Ajustes;

use App\Models\Ajuste;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AjustesForm extends Form
{
    public $prefix = 'pg_general';
    public $fields = [
        'num_cards' => 5,
        'payment' => '',
        'pricing' => '',
        'divisa' => '',
        'min' => 1,
        'max' => 5000,
        'meta_title' => '',
        'meta_description' => '',
        'titulo_pestania' => '',
        'titulo_header' => '',
        'titulo' => '',
        'titulo_regiones' => '',
        'titulo_area_categorias' => '',
        'descripcion_area_categorias' => '',
        'descripcion' => '',
        'descripcion_regiones' => '',
        'descripcion_detallada' => '',
        'divisa_iso' => '',
        'divisa_simbolo' => '',
        'divisa_moneda' => '',
    ];

    public function save ()
    {
        $upsert = [];
        foreach ($this->fields as $key => $field) {
            $upsert[] = ['campo' => $this->prefix . '_' . $key, 'valor' => $field];
        }

        if (count($upsert)) {
            $ajuste = Ajuste::upsert($upsert, uniqueBy: ['campo'], update: ['valor']);
        }
    }
}
