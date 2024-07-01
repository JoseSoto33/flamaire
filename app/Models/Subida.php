<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subida extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "subidas";

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
        'dia_entero' => false,
        'status' => true,
    ];

    /**
     * Obtiene el usuario al que pertenece la subida
     */
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    /**
     * Obtiene el plan que tiene la subida
     */
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class, 'id_plan');
    }

    /**
     * Obtiene el plan personalizado que tiene la subida
     */
    public function planPersonalizado(): BelongsTo
    {
        return $this->belongsTo(PlanPersonalizado::class, 'id_plan_personalizado');
    }
    
    /**
     * Obtiene el tipo de anuncio que tiene la subida
     */
    public function tipoAnuncio(): BelongsTo
    {
        return $this->belongsTo(TipoAnuncio::class, 'id_tipo_anuncio');
    }

    /**
     * 
     */
    public function subidasAuto(): HasMany
    {
        return $this->hasMany(SubidaAutomatica::class, 'id_subida');
    }
}
