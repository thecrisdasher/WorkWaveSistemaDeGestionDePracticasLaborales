<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipo_cargos extends Model
{
    use HasFactory;

    protected $table = 'tipo_contratos'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id_tipo_contrato'; // Clave primaria
    protected $fillable = ['tipo']; // Campos que se pueden llenar

    public $timestamps = false; // Desactiva las marcas de tiempo
}

