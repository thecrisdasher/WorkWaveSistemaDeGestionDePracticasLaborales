<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipo_contratos extends Model
{
    use HasFactory;

    static $rules = [
		'name' => 'required|string',
		'email' => 'required|string',
    ];
    // Instancio la tabla 'contratos'
    protected $table = 'tipo_contratos';

    // Declaro los campos que usaré de la tabla 'contratos'
    protected $primaryKey = 'id_tipo_contrato';
    protected $fillable = ['tipo'];

    public function Ofertas(): HasMany
    {
        return $this->hasMany(Ofertas::class);
    }

}
