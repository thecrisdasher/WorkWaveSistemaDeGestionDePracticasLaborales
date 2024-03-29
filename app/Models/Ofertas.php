<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ofertas extends Model
{
    use HasFactory;

    // Instancio la tabla 'productos'
    protected $table = 'ofertas';

    // Declaro los campos que usaré de la tabla 'productos'
    protected $primaryKey = 'id_oferta';
    protected $fillable = ['nombre_oferta', 'descripcion', 'salario','id_empresa'];

    /**
     * Get the post that owns the comment.
     */
    public function tipoCargo(): BelongsTo
    {
        return $this->belongsTo(Tipo_cargos::class);
    }


    /**
     * Get the post that owns the comment.
     */
    public function tipoContrato(): BelongsTo
    {
        return $this->belongsTo(Tipo_contratos::class);
    }

    public function empresa(): BelongsTo
    {
        return $this->belongsTo(Empresas::class);
    }

    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitudes::class);
    }
}
