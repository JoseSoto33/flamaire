<?php

namespace App\Livewire;

use App\Livewire\Forms\Categorias\CategoryCreateForm;
use App\Livewire\Forms\Categorias\CategoryEditForm;
use App\Models\Categoria;
use App\Models\MetaData;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('components.layouts.layout-admin')] 
class AdminCategories extends Component
{
    use WithPagination, WithFileUploads;

    public $title = null;
    public $search = null;
    
    public $id_categoria;
    public $nombre;
    public $status;

    public $currentCategory = null;
    public $currentMetaData = null;

    public CategoryCreateForm $categoryAdd;
    public CategoryEditForm $categoryEdit;

    public $showCategory;
    public $showMetaData = [
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
        $this->categoryAdd->save();
        $this->resetPage();
        $this->dispatch('data-saved');
    }

    public function show ($idCategoria)
    {
        $this->reset('showCategory', 'showMetaData');

        $this->showCategory = Categoria::find($idCategoria);

        $metaData = MetaData::where('table_name', 'categorias')->where('row_id', $idCategoria)->first();
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

    public function edit ($idCategoria) 
    {
        $this->id_categoria = $idCategoria;
        $this->categoryEdit->edit($idCategoria);     
        $this->dispatch('data-laoded'); 
    }

    public function update ()
    {        
        $this->categoryEdit->update(); 
        $this->dispatch('data-updated'); 
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

        if (!empty($categoria->url_img)) 
            Storage::delete($categoria->url_img);

        $categoria->delete();
        if (!empty($metaData)) $metaData->delete();

        $this->reset('id_categoria', 'categoryDelete');
        $this->resetPage();
        $this->dispatch('data-deleted');        
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
