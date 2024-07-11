<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ajuste extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "ajustes";

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = "id";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    const CREATED_AT = 'fecha_creado';
    const UPDATED_AT = 'fecha_editado';

    /**
     * Retorna el texto con las palabras encerradas entre [[]] resaltadas
     * en negrita y con otro color.
     *
     * @return string
     */
    public function formatedText() 
    {
        $search = ["[[", "]]"];
        $replace = ["<span class=\"font-bold text-primary-600\">", "</span>"];
        return str_replace($search, $replace, nl2br($this->valor));
    }
}
