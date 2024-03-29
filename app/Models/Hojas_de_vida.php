<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hojas_de_vida extends Model
{
    protected $table = 'hojas_de_vida';

    // Declaro los campos que usaré de la tabla 'productos'
    protected $primaryKey = 'id_hojadevida';
    protected $fillable = ['archivo'];

    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitudes::class);
    }
}
