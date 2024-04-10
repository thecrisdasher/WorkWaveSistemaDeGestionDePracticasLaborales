<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roles extends Model
{
    use HasFactory;

    static $rules = [
		'name' => 'required|string',
		'email' => 'required|string',
    ];
    // Instancio la tabla 'productos'
    protected $table = 'roles';

    // Declaro los campos que usaré de la tabla 'productos'
    protected $primaryKey = 'id_rol';
    protected $fillable = ['tipo_rol_user'];

    public function Users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
