<?php

namespace Database\Factories;

use App\Models\Ofertas;
use App\Models\Empresa;
use App\Models\Empresas;
use App\Models\tipo_cargo;
use App\Models\TipoContrato;
use App\Models\Ubicacion;
use App\Models\Ubicaciones;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ofertas>
 */
class OfertasFactory extends Factory
{
    protected $model = Ofertas::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre_oferta' => $this->faker->jobTitle,
            'descripcion' => $this->faker->paragraph,
            'salario' => $this->faker->numberBetween(1000000, 5000000),
            'id_cargo' => TipoCargoFactory::factory(),
            'id_tipo_contrato' => TipoContratoFactory::factory(),
            'id_empresa' => Empresas::factory(),
            'id_ubicacion' => Ubicaciones::factory(),
        ];
    }
}
