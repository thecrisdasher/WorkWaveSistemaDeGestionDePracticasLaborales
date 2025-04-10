<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;

    protected $table = 'postulantes'; // Nombre de la tabla en la base de datos
    public $timestamps = false; // Desactiva las marcas de tiempo

    protected $fillable = [
        'id_postulante', // Llave primaria
        'nombre',
        'apellido',
        'id', // Llave foránea con la tabla `users`
    ];
}
