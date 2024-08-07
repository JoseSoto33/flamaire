<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntaFrecuente extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "preguntas_frecuentes";

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
    protected $fillable = ['pregunta', 'respuesta', 'status'];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => true,
    ];

    public function formatedQuestion() 
    {
        $search = ["[[", "]]"];
        $replace = ["<span class=\"font-bold text-current\">", "</span>"];
        return str_replace($search, $replace, nl2br($this->pregunta));
    }

    public function formatedAnswer() 
    {
        $search = ["[[", "]]"];
        $replace = ["<span class=\"font-bold text-primary-600 inline\">", "</span>"];
        return str_replace($search, $replace, nl2br($this->respuesta));
    }
}
