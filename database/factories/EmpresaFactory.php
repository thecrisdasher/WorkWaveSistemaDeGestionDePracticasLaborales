<?php

namespace Database\Factories;

use App\Models\Empresas; // Asegúrate de que el modelo sea correcto
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpresaFactory extends Factory
{
    protected $model = Empresas::class; // Asegúrate de que el modelo sea correcto

    public function definition()
    {
        return [
            'nombre' => $this->faker->company,
            'razon_social' => $this->faker->Razon,
            'nit' => $this->faker->phoneNit,
            'correo' => $this->faker->unique()->safeEmail,
            'tipo_empresa' => $this->faker->unique()->typeComnpany,
        ];
    }
}
