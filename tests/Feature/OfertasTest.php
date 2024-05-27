<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Ofertas;
use DateTime;
use Session;
use Redirect;

class OfertasTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->withoutMiddleware();
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $token = csrf_token();


        $response = $this->post('/oferta', [
            'nombre_oferta' => 'Practicante En Soporte',
            'descripcion' => 'Que sepa soportar',
            'salario' => 1160000,
            'tipoCargo' => 1,
            'id_empresa' => 1,
        ]);
        $response->assertStatus(302); // Verificar si la redirección fue exitosa
        $this->assertDatabaseHas('ofertas', ['nombre_oferta' => 'Practicante redes']); //

    }
}

