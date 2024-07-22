<?php

namespace App\Livewire\Forms\Paises;

use App\Models\MetaData;
use App\Models\Pais;
use Illuminate\Database\Query\Builder;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CountryEditForm extends Form
{
    #[Validate]
    public $id = '';
    public $iso = '';
    public $nombre = '';
    public $status = null;

    public $row_id = '';
    public $table_name = 'paises';
    public $slug = '';
    public $meta_title = '';
    public $meta_description = '';
    public $titulo_pestania = '';
    public $titulo_header = '';
    public $titulo = '';
    public $titulo_area_categorias = '';
    public $descripcion_area_categorias = '';
    public $descripcion = '';
    public $descripcion_detallada = '';

    public $status_meta_title = false;
    public $status_meta_description = false;
    public $status_titulo_pestania = false;
    public $status_titulo_header = false;
    public $status_titulo = false;
    public $status_titulo_area_categorias = false;
    public $status_descripcion_area_categorias = false;
    public $status_descripcion = false;
    public $status_descripcion_detallada = false;

    public function rules()
    {
        return [
            'iso' => 'required|regex:/^[A-Z]+/i',
            'nombre' => 'required|regex:/^[a-zA-Zá-üÁ-Ü-\.,\/\s]+/i',
            'status' => 'required',
            'slug' => [
                'required',
                'unique' => Rule::unique('meta_data')->where(function (Builder $query) {
                    $query->where('table_name', 'paises');
                })->ignore($this->id, 'row_id'),
                'regex:/^[0-9a-z\-]+$/i',
            ],
            'meta_title' => 'nullable|regex:/^[0-9a-zA-Zá-üÁ-Ü¿?¡!-_+<>\[\]\.:,;\/\s]+/i',
            'meta_description' => 'nullable|regex:/^[0-9a-zA-Zá-üÁ-Ü¿?¡!-_+<>\[\]\.:,;\/\s]+/i',
            'titulo_pestania' => 'nullable|regex:/^[0-9a-zA-Zá-üÁ-Ü¿?¡!-_+<>\[\]\.:,;\/\s]+/i',
            'titulo_header' => 'nullable|regex:/^[0-9a-zA-Zá-üÁ-Ü¿?¡!-_+<>\[\]\.:,;\/\s]+/i',
            'titulo' => 'nullable|regex:/^[0-9a-zA-Zá-üÁ-Ü¿?¡!-_+<>\[\]\.:,;\/\s]+/i',
            'titulo_area_categorias' => 'nullable|regex:/^[0-9a-zA-Zá-üÁ-Ü¿?¡!-_+<>\[\]\.:,;\/\s]+/i',
            'descripcion_area_categorias' => 'nullable|regex:/^[0-9a-zA-Zá-üÁ-Ü¿?¡!-_+<>\[\]\.:,;\/\s]+/i',
            'descripcion' => 'nullable|regex:/^[0-9a-zA-Zá-üÁ-Ü¿?¡!-_+<>\[\]\.:,;\/\s]+/i',
            'descripcion_detallada' => 'nullable|regex:/^[0-9a-zA-Zá-üÁ-Ü¿?¡!-_+<>\[\]\.:,;\/\s]+/i',
        ];
    }

    protected function messages()
    {
        return [
            'iso.required' => 'Debe ingresar el ISO del país.',
            'iso.regex' => 'El ISO del país sólo puede llevar caracteres alfabéticos en mayúsculas.',
            'nombre.required' => 'Debe ingresar el nombre del país.',
            'nombre.regex' => 'El nombre del país sólo puede llevar caracteres alfabéticos.',
            'status.required' => 'Debe especificar el status del país.',
            'slug.required' => 'Debe ingresar un Slug.',
            'slug.unique' => 'El Slug ya existe, ingrese uno diferente.',
            'slug.regex' => 'El Slug sólo puede llevar números, caracteres alfabéticos en minúscula y guion.',
            'meta_title.regex' => 'El meta-title sólo puede llevar letras, números y algunos signos de puntuación.',
            'meta_description.regex' => 'La meta-description sólo puede llevar letras, números y algunos signos de puntuación.',
            'titulo_pestania.regex' => 'El Título de Pestania sólo puede llevar letras, números y algunos signos de puntuación.',
            'titulo_header.regex' => 'El Título Header sólo puede llevar letras, números y algunos signos de puntuación.',
            'titulo.regex' => 'El Título sólo puede llevar letras, números y algunos signos de puntuación.',
            'titulo_area_categorias.regex' => 'El Título del área de categorías sólo puede llevar letras, números y algunos signos de puntuación.',
            'descripcion_area_categorias.regex' => 'La Descripcion del área de categorías sólo puede llevar letras, números y algunos signos de puntuación.',
            'descripcion.regex' => 'La Descripción sólo puede llevar letras, números y algunos signos de puntuación.',
            'descripcion_detallada.regex' => 'La Descripción Detallada sólo puede llevar letras, números y algunos signos de puntuación.',
        ];
    }

    public function edit ($idPais) 
    {
        $this->id = $idPais;
        $pais = Pais::find($idPais);
        $this->iso = $pais->iso;
        $this->nombre = $pais->nombre;
        $this->status = $pais->status;

        $metaData = MetaData::where('table_name', 'paises')->where('row_id', $idPais)->first();

        if ($metaData) {
            $this->slug = $metaData->slug;
            $this->meta_title = $metaData->meta_title;
            $this->meta_description = $metaData->meta_description;
            $this->titulo_pestania = $metaData->titulo_pestania;
            $this->titulo_header = $metaData->titulo_header;
            $this->titulo = $metaData->titulo;
            $this->titulo_area_categorias = $metaData->titulo_area_categorias;
            $this->descripcion_area_categorias = $metaData->descripcion_area_categorias;
            $this->descripcion = $metaData->descripcion;
            $this->descripcion_detallada = $metaData->descripcion_detallada;
            $this->status_meta_title = (bool) $metaData->status_meta_title;
            $this->status_meta_description = (bool) $metaData->status_meta_description;
            $this->status_titulo_pestania = (bool) $metaData->status_titulo_pestania;
            $this->status_titulo_header = (bool) $metaData->status_titulo_header;
            $this->status_titulo = (bool) $metaData->status_titulo;
            $this->status_titulo_area_categorias = (bool) $metaData->status_titulo_area_categorias;
            $this->status_descripcion_area_categorias = (bool) $metaData->status_descripcion_area_categorias;
            $this->status_descripcion = (bool) $metaData->status_descripcion;
            $this->status_descripcion_detallada = (bool) $metaData->status_descripcion_detallada;
        } else{
            $this->reset('row_id','table_name','slug','meta_title','meta_description','titulo_pestania','titulo_header','titulo','titulo_area_categorias','descripcion_area_categorias','descripcion','descripcion_detallada','status_meta_title','status_meta_description','status_titulo_pestania','status_titulo_header','status_titulo','status_titulo_area_categorias','status_descripcion_area_categorias','status_descripcion','status_descripcion_detallada');
        }
    }

    public function update ()
    {
        $this->validate();

        $pais = Pais::find($this->id);
        $update = [
            'iso' => $this->iso,
            'nombre' => $this->nombre,
            'status' => $this->status
        ];
                
        $pais->update($update);

        $metaData = MetaData::where('table_name', 'paises')->where('row_id', $this->id)->first();

        if ($metaData) {
            $metaData->update([
                'slug' => $this->slug,
                'meta_title' => $this->meta_title,
                'meta_description' => $this->meta_description,
                'titulo_pestania' => $this->titulo_pestania,
                'titulo_header' => $this->titulo_header,
                'titulo' => $this->titulo,
                'titulo_area_categorias' => $this->titulo_area_categorias,
                'descripcion_area_categorias' => $this->descripcion_area_categorias,
                'descripcion' => $this->descripcion,
                'descripcion_detallada' => $this->descripcion_detallada,
                'status_meta_title' => $this->status_meta_title,
                'status_meta_description' => $this->status_meta_description,
                'status_titulo_pestania' => $this->status_titulo_pestania,
                'status_titulo_header' => $this->status_titulo_header,
                'status_titulo' => $this->status_titulo,
                'status_titulo_area_categorias' => $this->status_titulo_area_categorias,
                'status_descripcion_area_categorias' => $this->status_descripcion_area_categorias,
                'status_descripcion' => $this->status_descripcion,
                'status_descripcion_detallada' => $this->status_descripcion_detallada,
            ]);
        } else {
            $metaData = MetaData::create([
                'row_id' => $pais->id,
                'table_name' => 'paises', 
                'slug' => $this->slug,
                'meta_title' => $this->meta_title,
                'meta_description' => $this->meta_description,
                'titulo_pestania' => $this->titulo_pestania,
                'titulo_header' => $this->titulo_header,
                'titulo' => $this->titulo,
                'titulo_area_categorias' => $this->titulo_area_categorias,
                'descripcion_area_categorias' => $this->descripcion_area_categorias,
                'descripcion' => $this->descripcion,
                'descripcion_detallada' => $this->descripcion_detallada,
                'status_meta_title' => $this->status_meta_title,
                'status_meta_description' => $this->status_meta_description,
                'status_titulo_pestania' => $this->status_titulo_pestania,
                'status_titulo_header' => $this->status_titulo_header,
                'status_titulo' => $this->status_titulo,
                'status_titulo_area_categorias' => $this->status_titulo_area_categorias,
                'status_descripcion_area_categorias' => $this->status_descripcion_area_categorias,
                'status_descripcion' => $this->status_descripcion,
                'status_descripcion_detallada' => $this->status_descripcion_detallada,
            ]);
        }

        $this->reset();
    }
}
