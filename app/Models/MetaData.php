<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaData extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "meta_data";

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'row_id', 'table_name', 'slug',
        'meta_title',
        'meta_description',
        'titulo_pestania',
        'titulo_header',
        'titulo',
        'titulo_area_categorias',
        'descripcion_area_categorias',
        'descripcion',
        'descripcion_detallada',
        'status_meta_title',
        'status_meta_description',
        'status_titulo_pestania',
        'status_titulo_header',
        'status_titulo',
        'status_titulo_area_categorias',
        'status_descripcion_area_categorias',
        'status_descripcion',
        'status_descripcion_detallada',
        'status',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status_meta_title' => false,
        'status_meta_description' => false,
        'status_titulo_pestania' => false,
        'status_titulo_header' => false,
        'status_titulo' => false,
        'status_titulo_area_categorias' => false,
        'status_descripcion_area_categorias' => false,
        'status_descripcion' => false,
        'status_descripcion_detallada' => false,
        'status' => true,
    ];
}
