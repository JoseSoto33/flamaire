<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Obtiene el asunto del registro de denuncias.
     */
    public function sesiones(): HasMany
    {
        return $this->hasMany(Sesion::class, 'user_id');
    }

    /**
     * Obtiene la categoría a la que pertenece el usuario.
     */
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    /**
     * Obtiene la sub categoría a la que pertenece el usuario.
     */
    public function subCategoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'id_sub_categoria');
    }

    /**
     * Obtiene la nacionalidad del usuario.
     */
    public function nacionalidad(): BelongsTo
    {
        return $this->belongsTo(Nacionalidad::class, 'id_nacionalidad');
    }

    /**
     * Obtiene la ciudade/zona a la que pertenece el usuario.
     */
    public function zona(): BelongsTo
    {
        return $this->belongsTo(CiudadZona::class, 'id_zona');
    }

    /**
     * Obtiene el listado de visualizaciones del usuario
     */
    public function visualizaciones(): HasMany 
    {
        return $this->hasMany(UsuarioVisualizacion::class, 'id_usuario');
    }

    /**
     * Obtiene las fotos del usuario
     */
    public function fotos(): HasMany 
    {
        return $this->hasMany(UsuarioFoto::class, 'id_usuario');
    }

    /**
     * Obtiene los videos del usuario
     */
    public function videos(): HasMany 
    {
        return $this->hasMany(UsuarioVideo::class, 'id_usuario');
    }

    /**
     * Obtiene las tarifas del usuario
     */
    public function tarifas(): HasMany 
    {
        return $this->hasMany(Tarifa::class, 'id_usuario');
    }

    /**
     * Obtiene las disposiciones que tiene el usuario.
     */
    public function disposiciones(): BelongsToMany
    {
        return $this->belongsToMany(Disposicion::class, 'usuario_disposicion', 'id_usuario', 'id_disposicion');
    }

    /**
     * Obtiene el asunto del registro de contacto.
     */
    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class, 'id_usuario');
    }

    /**
     * Obtiene el asunto del registro de denuncias.
     */
    public function denuncias(): HasMany
    {
        return $this->hasMany(Denuncia::class, 'id_usuario');
    }

    /**
     * Obtiene el asunto del registro de denuncias.
     */
    public function codigosVerificacion(): HasMany
    {
        return $this->hasMany(CodigoVerificacion::class, 'id_usuario');
    }

    /**
     * Obtiene las servicios que tiene el usuario.
     */
    public function servicios(): BelongsToMany
    {
        return $this->belongsToMany(Servicio::class, 'usuarios_servicios', 'id_usuario', 'id_servicio');
    }

    /**
     * Obtiene los datos fiscales del usuario.
     */
    public function datosFiscales(): HasOne
    {
        return $this->hasOne(DatosFiscales::class, 'id_usuario');
    }

    /**
     * Obtiene las descripciones físicas que tiene el usuario.
     */
    public function descripcionesFisicas(): BelongsToMany
    {
        return $this->belongsToMany(DescripcionFisica::class, 'usuario_descripcion_fisica', 'id_usuario', 'id_descripcion_fisica');
    }

    /**
     * Obtiene los intereses que tiene el usuario.
     */
    public function intereses(): BelongsToMany
    {
        return $this->belongsToMany(Interes::class, 'intereses_usuario', 'id_usuario', 'id_interes');
    }

    /**
     * Obtiene las formas de pago que tiene el usuario.
     */
    public function formasPago(): BelongsToMany
    {
        return $this->belongsToMany(FormaPago::class, 'usuario_formas_pago', 'id_usuario', 'id_forma_pago');
    }

    /**
     * Obtiene los horarios que tiene el usuario.
     */
    public function horarios(): BelongsToMany
    {
        return $this->belongsToMany(Horario::class, 'usuario_horarios', 'id_usuario', 'id_horario');
    }

    /**
     * Obtiene los idiomas que tiene el usuario.
     */
    public function idiomas(): BelongsToMany
    {
        return $this->belongsToMany(Horario::class, 'usuario_idiomas', 'id_usuario', 'id_idioma');
    }

    /**
     * Obtiene el teléfono del usuario.
     */
    public function telefono(): HasOne
    {
        return $this->hasOne(Telefono::class, 'id_usuario');
    }

    /**
     * Obtiene las fases de registro que posee el usuario.
     */
    public function fases(): BelongsToMany
    {
        return $this->belongsToMany(Interes::class, 'fases_registro_usuario', 'id_usuario', 'id_fase');
    }

    /**
     * Obtiene las subidas que tiene el usuario
     */
    public function subidas(): HasMany
    {
        return $this->hasMany(Subida::class, 'id_usuario');
    }

    /**
     * Obtiene los mensajes recordatorios de verificación que tiene el usuario
     */
    public function recordatorios(): HasMany
    {
        return $this->hasMany(RecordatorioVerificacion::class, 'id_usuario');
    }
}
