<?php

namespace Database\Factories;

use App\Models\Tipo_contratos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TipoContrato>
 */
class TipoContratoFactory extends Factory
{
    protected $model = Tipo_contratos::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
        ];
    }
}
