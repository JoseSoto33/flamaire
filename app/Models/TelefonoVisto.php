<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TelefonoVisto extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "telefonos_vistos";

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = "id";    

    /**
     * Obtiene el teléfono al cual pertenece la vista
     */
    public function telefono(): BelongsTo
    {
        return $this->belongsTo(Telefono::class, 'id_telefono');
    }
}
