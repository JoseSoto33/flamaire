<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CiudadZona extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "ciudades_zonas";

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
     * Obtiene la región a la que pertenece esta ciudad/zona.
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(RegionEstadoDepartamento::class, 'id_region');
    }

    /**
     * Obtiene los datos fiscales asociados a esta ciudad/zona.
     */
    public function datosFiscales(): HasMany
    {
        return $this->hasMany(DatosFiscales::class, 'id_zona');
    }
}
