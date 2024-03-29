<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ubicaciones extends Model
{
    use HasFactory;

    static $rules = [
		'name' => 'required|string',
		'email' => 'required|string',
    ];
    // Instancio la tabla 'productos'
    protected $table = 'ubicaciones';

    // Declaro los campos que usaré de la tabla 'productos'
    protected $primaryKey = 'id_ubicacion';
    protected $fillable = ['direccion', 'ciudad'];

    public function empresas(): HasMany
    {
        return $this->hasMany(Empresas::class);
    }
}
