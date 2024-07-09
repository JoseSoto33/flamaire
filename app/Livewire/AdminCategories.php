<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\MetaData;
use Illuminate\Database\Query\Builder;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.layout-admin')] 
class AdminCategories extends Component
{
    use WithPagination;

    public $title = null;
    public $search = null;
    
    public $id_categoria;
    public $nombre;
    public $status;

    public $currentCategory = null;
    public $currentMetaData = null;

    public $categoryAdd = [
        'nombre' => '',
        'status' => null
    ];

    public $addMetaData = [
        'row_id' => '', 
        'table_name' => 'categorias', 
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

    public $categoryEdit = [
        'nombre' => '',
        'status' => null
    ]; 

    public $editMetaData = [
        'row_id' => '', 
        'table_name' => 'categorias', 
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

    public $categoryDelete = [
        'nombre' => '',
        'status' => null
    ];

    public function mount ($id = null)
    {
        if (!empty($id)) {
            $this->title = 'Subcategorías';
            $this->currentCategory = Categoria::find($id);
            $this->currentMetaData = MetaData::where('table_name', 'categorias')->where('row_id', $id)->first();
        } else {
            $this->title = 'Categorías';            
        }
    }

    public function save ()
    {
        $categoria = Categoria::create([
            'nombre' => $this->categoryAdd['nombre'],
            'status' => $this->categoryAdd['status']
        ]);

        $metaData = MetaData::create([
            'row_id' => $categoria->id,
            'table_name' => 'categorias', 
            'slug' => $this->addMetaData['slug'],
            'meta_title' => $this->addMetaData['meta_title'],
            'meta_description' => $this->addMetaData['meta_description'],
            'titulo_pestania' => $this->addMetaData['titulo_pestania'],
            'titulo_header' => $this->addMetaData['titulo_header'],
            'titulo' => $this->addMetaData['titulo'],
            'titulo_area_categorias' => $this->addMetaData['titulo_area_categorias'],
            'descripcion_area_categorias' => $this->addMetaData['descripcion_area_categorias'],
            'descripcion' => $this->addMetaData['descripcion'],
            'descripcion_detallada' => $this->addMetaData['descripcion_detallada'],
            'status_meta_title' => $this->addMetaData['status_meta_title'],
            'status_meta_description' => $this->addMetaData['status_meta_description'],
            'status_titulo_pestania' => $this->addMetaData['status_titulo_pestania'],
            'status_titulo_header' => $this->addMetaData['status_titulo_header'],
            'status_titulo' => $this->addMetaData['status_titulo'],
            'status_titulo_area_categorias' => $this->addMetaData['status_titulo_area_categorias'],
            'status_descripcion_area_categorias' => $this->addMetaData['status_descripcion_area_categorias'],
            'status_descripcion' => $this->addMetaData['status_descripcion'],
            'status_descripcion_detallada' => $this->addMetaData['status_descripcion_detallada'],
        ]);

        $this->reset('categoryAdd', 'addMetaData');
        $this->resetPage();
        $this->dispatch('data-laoded'); 
    }

    public function show ($idCategoria)
    {
        $this->reset('categoryEdit', 'editMetaData');

        $categoria = Categoria::find($idCategoria);
        $this->id_categoria = $categoria->id;
        $this->categoryEdit['nombre'] = $categoria->nombre;
        $this->categoryEdit['status'] = $categoria->status;

        $metaData = MetaData::where('table_name', 'categorias')->where('row_id', $idCategoria)->first();

        if ($metaData) {
            $this->editMetaData['slug'] = $metaData->slug;
            $this->editMetaData['meta_title'] = $metaData->meta_title;
            $this->editMetaData['meta_description'] = $metaData->meta_description;
            $this->editMetaData['titulo_pestania'] = $metaData->titulo_pestania;
            $this->editMetaData['titulo_header'] = $metaData->titulo_header;
            $this->editMetaData['titulo'] = $metaData->titulo;
            $this->editMetaData['titulo_area_categorias'] = $metaData->titulo_area_categorias;
            $this->editMetaData['descripcion_area_categorias'] = $metaData->descripcion_area_categorias;
            $this->editMetaData['descripcion'] = $metaData->descripcion;
            $this->editMetaData['descripcion_detallada'] = $metaData->descripcion_detallada;
            $this->editMetaData['status_meta_title'] = $metaData->status_meta_title;
            $this->editMetaData['status_meta_description'] = $metaData->status_meta_description;
            $this->editMetaData['status_titulo_pestania'] = $metaData->status_titulo_pestania;
            $this->editMetaData['status_titulo_header'] = $metaData->status_titulo_header;
            $this->editMetaData['status_titulo'] = $metaData->status_titulo;
            $this->editMetaData['status_titulo_area_categorias'] = $metaData->status_titulo_area_categorias;
            $this->editMetaData['status_descripcion_area_categorias'] = $metaData->status_descripcion_area_categorias;
            $this->editMetaData['status_descripcion'] = $metaData->status_descripcion;
            $this->editMetaData['status_descripcion_detallada'] = $metaData->status_descripcion_detallada;
        } else{
            $this->reset('editMetaData');
        }

        $this->dispatch('data-laoded'); 
    }

    public function edit ($idCategoria) 
    {
        $this->id_categoria = $idCategoria;
        $categoria = Categoria::find($idCategoria);
        $this->categoryEdit['nombre'] = $categoria->nombre;
        $this->categoryEdit['status'] = $categoria->status;

        $metaData = MetaData::where('table_name', 'categorias')->where('row_id', $idCategoria)->first();

        if ($metaData) {
            $this->editMetaData['slug'] = $metaData->slug;
            $this->editMetaData['meta_title'] = $metaData->meta_title;
            $this->editMetaData['meta_description'] = $metaData->meta_description;
            $this->editMetaData['titulo_pestania'] = $metaData->titulo_pestania;
            $this->editMetaData['titulo_header'] = $metaData->titulo_header;
            $this->editMetaData['titulo'] = $metaData->titulo;
            $this->editMetaData['titulo_area_categorias'] = $metaData->titulo_area_categorias;
            $this->editMetaData['descripcion_area_categorias'] = $metaData->descripcion_area_categorias;
            $this->editMetaData['descripcion'] = $metaData->descripcion;
            $this->editMetaData['descripcion_detallada'] = $metaData->descripcion_detallada;
            $this->editMetaData['status_meta_title'] = $metaData->status_meta_title;
            $this->editMetaData['status_meta_description'] = $metaData->status_meta_description;
            $this->editMetaData['status_titulo_pestania'] = $metaData->status_titulo_pestania;
            $this->editMetaData['status_titulo_header'] = $metaData->status_titulo_header;
            $this->editMetaData['status_titulo'] = $metaData->status_titulo;
            $this->editMetaData['status_titulo_area_categorias'] = $metaData->status_titulo_area_categorias;
            $this->editMetaData['status_descripcion_area_categorias'] = $metaData->status_descripcion_area_categorias;
            $this->editMetaData['status_descripcion'] = $metaData->status_descripcion;
            $this->editMetaData['status_descripcion_detallada'] = $metaData->status_descripcion_detallada;
        } else{
            $this->reset('editMetaData');
        }      
        $this->dispatch('data-laoded'); 
    }

    public function update ()
    {
        $categoria = Categoria::find($this->id_categoria);
        $update = [
            'nombre' => $this->categoryEdit['nombre'],
            'status' => $this->categoryEdit['status']
        ];

        if (!empty($this->currentCategory)) $update['id_categoria_padre'] = $this->currentCategory->id;

        $categoria->update($update);

        $metaData = MetaData::where('table_name', 'categorias')->where('row_id', $this->id_categoria)->first();

        if ($metaData) {
            $metaData->update([
                'slug' => $this->editMetaData['slug'],
                'meta_title' => $this->editMetaData['meta_title'],
                'meta_description' => $this->editMetaData['meta_description'],
                'titulo_pestania' => $this->editMetaData['titulo_pestania'],
                'titulo_header' => $this->editMetaData['titulo_header'],
                'titulo' => $this->editMetaData['titulo'],
                'titulo_area_categorias' => $this->editMetaData['titulo_area_categorias'],
                'descripcion_area_categorias' => $this->editMetaData['descripcion_area_categorias'],
                'descripcion' => $this->editMetaData['descripcion'],
                'descripcion_detallada' => $this->editMetaData['descripcion_detallada'],
                'status_meta_title' => $this->editMetaData['status_meta_title'],
                'status_meta_description' => $this->editMetaData['status_meta_description'],
                'status_titulo_pestania' => $this->editMetaData['status_titulo_pestania'],
                'status_titulo_header' => $this->editMetaData['status_titulo_header'],
                'status_titulo' => $this->editMetaData['status_titulo'],
                'status_titulo_area_categorias' => $this->editMetaData['status_titulo_area_categorias'],
                'status_descripcion_area_categorias' => $this->editMetaData['status_descripcion_area_categorias'],
                'status_descripcion' => $this->editMetaData['status_descripcion'],
                'status_descripcion_detallada' => $this->editMetaData['status_descripcion_detallada'],
            ]);
        } else {
            $metaData = MetaData::create([
                'row_id' => $categoria->id,
                'table_name' => 'categorias', 
                'slug' => $this->editMetaData['slug'],
                'meta_title' => $this->editMetaData['meta_title'],
                'meta_description' => $this->editMetaData['meta_description'],
                'titulo_pestania' => $this->editMetaData['titulo_pestania'],
                'titulo_header' => $this->editMetaData['titulo_header'],
                'titulo' => $this->editMetaData['titulo'],
                'titulo_area_categorias' => $this->editMetaData['titulo_area_categorias'],
                'descripcion_area_categorias' => $this->editMetaData['descripcion_area_categorias'],
                'descripcion' => $this->editMetaData['descripcion'],
                'descripcion_detallada' => $this->editMetaData['descripcion_detallada'],
                'status_meta_title' => $this->editMetaData['status_meta_title'],
                'status_meta_description' => $this->editMetaData['status_meta_description'],
                'status_titulo_pestania' => $this->editMetaData['status_titulo_pestania'],
                'status_titulo_header' => $this->editMetaData['status_titulo_header'],
                'status_titulo' => $this->editMetaData['status_titulo'],
                'status_titulo_area_categorias' => $this->editMetaData['status_titulo_area_categorias'],
                'status_descripcion_area_categorias' => $this->editMetaData['status_descripcion_area_categorias'],
                'status_descripcion' => $this->editMetaData['status_descripcion'],
                'status_descripcion_detallada' => $this->editMetaData['status_descripcion_detallada'],
            ]);
        }

        $this->reset('id_categoria', 'categoryEdit', 'editMetaData');
        $this->dispatch('data-laoded'); 
    }

    public function delete ($idCategoria)
    {
        $this->id_categoria = $idCategoria;
        $categoria = Categoria::find($idCategoria);
        $this->categoryDelete['nombre'] = $categoria->nombre;
        $this->categoryDelete['status'] = $categoria->status;

        $this->dispatch('data-laoded');        
    }

    public function destroy ()
    {
        $categoria = Categoria::find($this->id_categoria);
        $metaData = MetaData::where('table_name', 'categorias')->where('row_id', $this->id_categoria)->first();

        $categoria->delete();
        if (!empty($metaData)) $metaData->delete();

        $this->reset('id_categoria', 'categoryDelete');

        $this->dispatch('data-laoded');        
    }

    public function render()
    {
        $categorias = Categoria::where('id_categoria_padre', !empty($this->currentCategory)? $this->currentCategory->id : null)
                        ->when($this->search, function($query) {
                            $query->where('nombre', 'LIKE', '%'.$this->search.'%');
                        })
                        ->orderBy('id', 'desc')
                        ->paginate(5);
        return view('livewire.admin-categories', compact('categorias'));
    }
}
