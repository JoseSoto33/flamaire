<?php

namespace App\Livewire;

use App\Livewire\Forms\Paises\CountryCreateForm;
use App\Livewire\Forms\Paises\CountryEditForm;
use App\Models\MetaData;
use App\Models\Pais;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('components.layouts.layout-admin')]
class AdminPaises extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $title = null;
    public $search = null;

    public $id_pais;
    public $iso;
    public $nombre;
    public $status;

    public CountryCreateForm $countryAdd;
    public CountryEditForm $countryEdit;

    public $showCountry;
    public $showMetaData = [
        'row_id' => '', 
        'table_name' => 'paises', 
        'slug' => '',
        'meta_title' => '',
        'meta_description' => '',
        'titulo_pestania' => '',
        'titulo_header' => '',
        'titulo' => '',
        'titulo_area_categorias' => '',
        'descripcion_area_categorias' => '',
        'descripcion' => '',
        'descripcion_detallada' => '',
        'status_meta_title' => false,
        'status_meta_description' => false,
        'status_titulo_pestania' => false,
        'status_titulo_header' => false,
        'status_titulo' => false,
        'status_titulo_area_categorias' => false,
        'status_descripcion_area_categorias' => false,
        'status_descripcion' => false,
        'status_descripcion_detallada' => false,
    ];

    public $countryDelete = [
        'nombre' => '',
        'iso' => '',
        'status' => null
    ];

    public function mount ($id = null)
    {
        $this->title = 'Países';            
    }

    public function save ()
    {
        $this->countryAdd->save();
        $this->resetPage();
        $this->dispatch('data-saved');
    }

    public function show ($idPais)
    {
        $this->reset('showCountry', 'showMetaData');

        $this->showCountry = Pais::find($idPais);

        $metaData = MetaData::where('table_name', 'paises')->where('row_id', $idPais)->first();
        if ($metaData) {
            $this->showMetaData['slug'] = $metaData->slug;
            $this->showMetaData['meta_title'] = $metaData->meta_title;
            $this->showMetaData['meta_description'] = $metaData->meta_description;
            $this->showMetaData['titulo_pestania'] = $metaData->titulo_pestania;
            $this->showMetaData['titulo_header'] = $metaData->titulo_header;
            $this->showMetaData['titulo'] = $metaData->titulo;
            $this->showMetaData['titulo_area_categorias'] = $metaData->titulo_area_categorias;
            $this->showMetaData['descripcion_area_categorias'] = $metaData->descripcion_area_categorias;
            $this->showMetaData['descripcion'] = $metaData->descripcion;
            $this->showMetaData['descripcion_detallada'] = $metaData->descripcion_detallada;
            $this->showMetaData['status_meta_title'] = $metaData->status_meta_title;
            $this->showMetaData['status_meta_description'] = $metaData->status_meta_description;
            $this->showMetaData['status_titulo_pestania'] = $metaData->status_titulo_pestania;
            $this->showMetaData['status_titulo_header'] = $metaData->status_titulo_header;
            $this->showMetaData['status_titulo'] = $metaData->status_titulo;
            $this->showMetaData['status_titulo_area_categorias'] = $metaData->status_titulo_area_categorias;
            $this->showMetaData['status_descripcion_area_categorias'] = $metaData->status_descripcion_area_categorias;
            $this->showMetaData['status_descripcion'] = $metaData->status_descripcion;
            $this->showMetaData['status_descripcion_detallada'] = $metaData->status_descripcion_detallada;
        } else{
            $this->reset('showMetaData');
        }

        $this->dispatch('data-laoded'); 
    }

    public function edit ($idPais) 
    {
        $this->id_pais = $idPais;
        $this->countryEdit->edit($idPais);     
        $this->dispatch('data-laoded'); 
    }

    public function update ()
    {        
        $this->countryEdit->update(); 
        $this->dispatch('data-updated'); 
    }

    public function delete ($idPais)
    {
        $this->id_pais = $idPais;
        $pais = Pais::find($idPais);
        $this->countryDelete['nombre'] = $pais->nombre;
        $this->countryDelete['status'] = $pais->status;

        $this->dispatch('data-laoded');        
    }

    public function destroy ()
    {
        $pais = Pais::find($this->id_pais);
        $metaData = MetaData::where('table_name', 'paises')->where('row_id', $this->id_categoria)->first();

        $pais->delete();
        if (!empty($metaData)) $metaData->delete();

        $this->reset('id_pais', 'countryDelete');
        $this->resetPage();
        $this->dispatch('data-deleted');        
    }

    public function render()
    {
        $paises = Pais::when($this->search, function($query) {
                            $query->where('nombre', 'LIKE', '%'.$this->search.'%');
                        })
                        ->orderBy('id', 'desc')
                        ->paginate(5);
        return view('livewire.admin-paises', compact('paises'));
    }
}
