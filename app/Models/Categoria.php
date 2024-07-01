<?php

namespace App\Models;

use Database\Factories\CategoriaFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categorias';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'id_categoria_padre' => null,
        'status' => true,
    ];

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): Factory
    {
        return CategoriaFactory::new();
    }

    /**
     * Obtiene las subcategorías de esta categoría.
     */
    public function subCategorias(): HasMany
    {
        return $this->hasMany(Categoria::class, 'id_categoria_padre');
    }

    /**
     * Obtiene la categoría a la que pertenece esta subcategoría.
     */
    public function categoriasPadre(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'id_categoria_padre');
    }
}
