<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roles extends Model
{
    use HasFactory;

    static $rules = [
        'tipo_rol_usuario' => 'required|string',
    ];
    // Instancio la tabla 'productos'
    protected $table = 'roles';

    // Declaro los campos que usaré de la tabla 'productos'
    protected $primaryKey = 'id_rol';
    protected $fillable = ['tipo_rol_usuario'];

    public function users()
    {
        return $this
            ->belongsTo(User::class);
    }
}
