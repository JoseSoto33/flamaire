<?php

namespace App\Livewire;

use App\Livewire\Forms\Paises\CountryCreateForm;
use App\Livewire\Forms\Paises\CountryEditForm;
use App\Models\MetaData;
use App\Models\Pais;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Layout('components.layouts.layout-admin')]
class AdminPaises extends Component
{
    use WithPagination, WithFileUploads, WithoutUrlPagination;

    public $title = null;
    public $search = null;

    public $id_pais;
    public $iso;
    public $nombre;
    public $url_subdomain;
    public $status;

    public CountryCreateForm $countryAdd;
    public CountryEditForm $countryEdit;

    public $showCountry;

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
        $this->reset('showCountry');

        $this->showCountry = Pais::find($idPais);

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
        $this->countryDelete['url_subdomain'] = $pais->url_subdomain;
        $this->countryDelete['status'] = $pais->status;

        $this->dispatch('data-laoded');        
    }

    public function destroy ()
    {
        $pais = Pais::find($this->id_pais);
        
        if (!empty($pais->url_img)) 
            Storage::delete($pais->url_img);

        $pais->delete();
        

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
