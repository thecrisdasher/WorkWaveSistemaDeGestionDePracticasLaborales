<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empresas extends Model
{
    use HasFactory;

    // Instancio la tabla 'empresas'
    protected $table = 'empresas';

    // Declaro los campos que usaré de la tabla 'empresas'
    protected $primaryKey = 'id_empresa';
    protected $fillable = [
        'nombre',
        'razon_social',
        'tipo_empresa',
        'nit',
        'correo',
        'id_ubicacion',
        'id_usuario',
    ];

    public function Ofertas(): HasMany
    {
        return $this->hasMany(Ofertas::class);
    }

    public function ubicacion(): BelongsTo
    {
        return $this->belongsTo(Ubicaciones::class);
    }
}
