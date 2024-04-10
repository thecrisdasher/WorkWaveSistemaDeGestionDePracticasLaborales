<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empresas extends Model
{
    use HasFactory;

    // Instancio la tabla 'productos'
    protected $table = 'empresas';

    // Declaro los campos que usaré de la tabla 'productos'
    protected $primaryKey = 'id_empresa';
    protected $fillable = ['nombre', 'razon_social'];

    public function Ofertas(): HasMany
    {
        return $this->hasMany(Ofertas::class);
    }

    public function ubicacion(): BelongsTo
    {
        return $this->belongsTo(Ubicaciones::class);
    }
}
