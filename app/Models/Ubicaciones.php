<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ubicaciones extends Model
{
    use HasFactory;

    static $rules = [
        'ciudad' => 'required|string|max:255', // Campo 'nombre' es obligatorio y debe ser una cadena
        'direccion' => 'required|string|max:255', // Campo 'direccion' es obligatorio y debe ser una cadena
    ];
    // Instancio la tabla 'productos'
    protected $table = 'ubicaciones';

    // Declaro los campos que usaré de la tabla 'productos'
    protected $primaryKey = 'id_ubicacion';
    protected $fillable = ['ciudad', 'direccion'];
    public $timestamps = false; // Desactiva las marcas de tiempo
    public function empresas(): HasMany
    {
        return $this->hasMany(Empresas::class);
    }
}
