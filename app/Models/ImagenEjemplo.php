<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ImagenEjemplo extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "imagenes_ejemplo_verificacion";

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = "id";

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => true,
    ];

    /**
     * Obtiene el código de verificación al que pertenece la imagen de ejemplo
     */
    public function codigosVerificacion(): HasOne
    {
        return $this->hasOne(CodigoVerificacion::class, 'id_ejemplo');
    }
}
