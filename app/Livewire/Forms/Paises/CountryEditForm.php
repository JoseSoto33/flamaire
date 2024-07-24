<?php

namespace App\Livewire\Forms\Paises;

use App\Models\MetaData;
use App\Models\Pais;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CountryEditForm extends Form
{
    #[Validate]
    public $id = '';
    public $iso = '';
    public $nombre = '';
    public $url_subdomain = '';
    public $url_img = '';
    public $status = null;
    public $urlImage;

    public $urlImageKey;

    public function rules()
    {
        return [
            'iso' => 'required|regex:/^[A-Z]+/i',
            'nombre' => 'required|regex:/^[a-zA-Zá-üÁ-Ü\s]+/i',
            'url_subdomain' => 'required|url:http,https',
            'urlImage' => 'nullable|image|mimes:jpeg,jpg,png|max:3052',
            'status' => 'required',
        ];
    }

    protected function messages()
    {
        return [
            'iso.required' => 'Debe ingresar el ISO del país.',
            'iso.regex' => 'El ISO del país sólo puede llevar caracteres alfabéticos en mayúsculas.',
            'nombre.required' => 'Debe ingresar el nombre del país.',
            'nombre.regex' => 'El nombre del país sólo puede llevar caracteres alfabéticos.',
            'url_subdomain.required' => 'Debe ingresar la URL del subdominio.',
            'url_subdomain.url' => 'El subdominio debe tener una URL válida.',
            'urlImage.image' => 'El archivo cargado debe ser de tipo imagen.',
            'urlImage.mimes' => 'Sólo se permiten los formatos de imagen jpeg, jpg y png.',
            'urlImage.max' => 'La imagen debe ser de 3Mb máximo.',
            'status.required' => 'Debe especificar el status del país.',
            
        ];
    }

    public function edit ($idPais) 
    {
        $this->id = $idPais;
        $pais = Pais::find($idPais);
        $this->iso = $pais->iso;
        $this->nombre = $pais->nombre;
        $this->url_subdomain = $pais->url_subdomain;
        $this->url_img = $pais->url_img;
        $this->status = $pais->status;

    }

    public function update ()
    {
        $this->validate();

        $pais = Pais::find($this->id);
        $update = [
            'iso' => $this->iso,
            'nombre' => $this->nombre,
            'url_subdomain' => $this->url_subdomain,
            'status' => $this->status
        ];
                
        $pais->update($update);

        if ($this->urlImage) {
            if (!empty($pais->url_img)) 
                Storage::delete($pais->url_img);

            $pais->url_img = $this->urlImage->store('categorias');
            $pais->save();
        }

        $this->reset();
        $this->urlImageKey = rand(); 
    }
}
