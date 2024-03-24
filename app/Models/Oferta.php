<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    static $rules = [
		'name' => 'required|string',
		'email' => 'required|string',
    ];
    // Instancio la tabla 'productos'
    protected $table = 'oferta';

    // Declaro los campos que usaré de la tabla 'productos'
    protected $fillable = ['nombre', 'fecha', 'salario', 'descripcion'];
}
