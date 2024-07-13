<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class CategoriasHome extends Component
{
    public function render()
    {
        $data['categorias'] = Categoria::where('id_categoria_padre', null)->where('status', true)->orderBy('id', 'asc')->get();
        foreach ($data['categorias'] as $key => $categoria) {
            if ($categoria->subCategorias()->where('status', true)->exists()) {
                $data['subcategorias'][$categoria->id] = $categoria->subCategorias()->where('status', true)->get();
            }
        }
        return view('livewire.categorias-home', $data);
    }
}
