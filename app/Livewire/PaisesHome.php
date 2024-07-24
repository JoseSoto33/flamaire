<?php

namespace App\Livewire;

use App\Models\Pais;
use Livewire\Component;

class PaisesHome extends Component
{
    public function render()
    {
        $paises = Pais::where('status', true)->orderBy('id', 'asc')->get();
        return view('livewire.paises-home', compact('paises'));
    }
}
