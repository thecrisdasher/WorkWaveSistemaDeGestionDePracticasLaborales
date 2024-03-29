<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Postulantes extends Model
{
    use HasFactory;
    // Instancio la tabla 'productos'
    protected $table = 'postulantes';

    // Declaro los campos que usaré de la tabla 'productos'
    protected $primaryKey = 'id_postulante';
    protected $fillable = ['nombre', 'apellidos', 'fecha_nacimiento'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function postulante(): HasMany
    {
        return $this->hasMany(Postulantes::class);
    }

    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitudes::class);
    }

}
