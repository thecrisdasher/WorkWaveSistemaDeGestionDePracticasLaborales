<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCargo extends Model
{
    use HasFactory;

    protected $table = 'tipo_cargos'; // Nombre correcto de la tabla
    protected $primaryKey = 'id_cargo'; // Llave primaria de la tabla
    public $timestamps = false; // Si no usas columnas created_at y updated_at
}