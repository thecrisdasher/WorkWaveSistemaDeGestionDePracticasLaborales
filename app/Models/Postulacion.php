<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulacion extends Model
{
    use HasFactory;

    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'solicitudes';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'id_postulante',       // ID del usuario que realizó la postulación
        'oferta_id',     // ID de la oferta a la que se postuló
        'estado',        // Estado de la postulación (aceptada, rechazada, pendiente, etc.)
        'fecha_postulacion', // Fecha en la que se realizó la postulación
    ];

    /**
     * Relación con el modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con el modelo Oferta.
     */
    public function oferta()
    {
        return $this->belongsTo(Ofertas::class);
    }

    // Relación con el modelo Empresas
    public function empresa()
    {
        return $this->belongsTo(Empresas::class, 'id_empresa', 'id_empresa'); // Clave foránea y clave primaria personalizada
    }
}

class Empresas extends Model
{
    use HasFactory;

    // Relación con el modelo Postulacion
    public function postulaciones()
    {
        return $this->hasMany(Postulacion::class, 'id_empresa '); // Asegúrate de que 'id_empresa ' sea la clave foránea correcta
    }
}

class Ofertas extends Model
{
    use HasFactory;

    // Relación con el modelo Postulacion
    public function postulaciones()
    {
        return $this->hasMany(Postulacion::class, 'oferta_id'); // Asegúrate de que 'oferta_id' sea la clave foránea correcta
    }
}