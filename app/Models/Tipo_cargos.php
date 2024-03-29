<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tipo_cargos extends Model
{
    use HasFactory;

    static $rules = [
		'name' => 'required|string',
		'email' => 'required|string',
    ];
    // Instancio la tabla 'productos'
    protected $table = 'tipo_cargos';

    // Declaro los campos que usaré de la tabla 'productos'
    protected $primaryKey = 'id_cargo';
    protected $fillable = ['cargo'];


    /**
     * Get the ofertas for the blog post.
     */
    public function Ofertas(): HasMany
    {
        return $this->hasMany(Ofertas::class);
    }
}
