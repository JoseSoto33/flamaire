<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PlanPersonalizado extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "planes_personalizados";

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
     * Obtiene los días asociados al plan personalziado
     */
    public function dias(): HasMany
    {
        return $this->hasMany(PlanPersonalizadoDia::class, 'id_plan_personalizado');
    }

    /**
     * Obtiene las subidas que tienen el plan personalizado
     */
    public function subidas(): HasMany
    {
        return $this->hasMany(Subida::class, 'id_plan_personalizado');
    }
}
