<?php

namespace App\Livewire\Forms\Ajustes;

use App\Models\Ajuste;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AjustesForm extends Form
{
    public $fields = [
        'pg_general_num_cards' => 5,
        'pg_general_payment' => '',
        'pg_general_pricing' => '',
        'pg_general_divisa' => '',
        'pg_general_min' => 1,
        'pg_general_max' => 5000,
        'pg_general_meta_title' => '',
        'pg_general_meta_description' => '',
        'pg_general_titulo_pestania' => '',
        'pg_general_titulo_header' => '',
        'pg_general_titulo' => '',
        'pg_general_titulo_regiones' => '',
        'pg_general_titulo_area_categorias' => '',
        'pg_general_descripcion_area_categorias' => '',
        'pg_general_descripcion' => '',
        'pg_general_descripcion_detallada' => '',
        'pg_general_divisa_iso' => '',
        'pg_general_divisa_simbolo' => '',
        'pg_general_divisa_moneda' => '',
    ];

    public function save ()
    {
        $upsert = [];
        foreach ($this->fields as $key => $field) {
            $upsert[] = ['campo' => $key, 'valor' => $field];
        }

        if (count($upsert)) {
            $ajuste = Ajuste::upsert($upsert, uniqueBy: ['campo'], update: ['valor']);
        }
    }
}
