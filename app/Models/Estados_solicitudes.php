<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Estados_solicitudes extends Model
{
    protected $table = 'estados_solicitudes';

    // Declaro los campos que usaré de la tabla 'productos'
    protected $primaryKey = 'id_estadosolicitud';
    protected $fillable = ['estado'];

    /**
     * Get the post that owns the comment.
     */
    public function solicitudes(): HasMany
    {
        return $this->hasMany(Solicitudes::class);
    }
}
