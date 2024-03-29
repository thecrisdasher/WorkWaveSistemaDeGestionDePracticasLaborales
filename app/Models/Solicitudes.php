<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Solicitudes extends Model
{
    use HasFactory;

    static $rules = [
		'name' => 'required|string',
		'email' => 'required|string',
    ];
    // Instancio la tabla 'productos'
    protected $table = 'solicitudes';

    // Declaro los campos que usaré de la tabla 'productos'
    protected $primaryKey = 'id_solicitud';
    protected $fillable = ['fecha_solicitud'];

    public function postulante(): BelongsTo
    {
        return $this->belongsTo(Postulantes::class);
    }

    public function estadoSolicitud(): BelongsTo
    {
        return $this->belongsTo(Estados_solicitudes::class);
    }

    public function oferta(): BelongsTo
    {
        return $this->belongsTo(Ofertas::class);
    }

    public function hojas_de_vida(): BelongsTo
    {
        return $this->belongsTo(Hojas_de_vida::class);
    }

}
