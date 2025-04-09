<?php

namespace Database\Factories;

use App\Models\Ubicaciones;
use Illuminate\Database\Eloquent\Factories\Factory;

class UbicacionFactory extends Factory
{
    protected $model = Ubicaciones::class;

    public function definition()
    {
        return [
            'ciudad' => $this->faker->city, // Genera un nombre de ciudad aleatorio
            'direccion' => $this->faker->address, // Genera una dirección aleatoria
        ];
    }
}
