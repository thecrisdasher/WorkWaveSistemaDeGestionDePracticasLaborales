<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Ofertas;
use App\Models\User;

class OfertasTest extends TestCase
{
    use RefreshDatabase; // Limpia la base de datos después de cada prueba
    use WithFaker; // Genera datos aleatorios para las pruebas

    /**
     * Test para verificar la creación de una oferta.
     */
    public function test_crear_oferta()
    {
        $this->withoutMiddleware();

        // Crear un usuario si no existe
        $usuario = User::firstOrCreate([
            'username' => 'juanperez',
            'id_rol' => '1', // Usar un rol válido
            'firstname' => 'Juan',
            'lastname' => 'Pérez',
            'email' => 'juan.perez@example.com',
            'city' => 'Bogotá',
            'about' => 'Usuario administrador',
            'password' => 'password123',
            'password_confirmation' => 'password123', // Confirmación de contraseña
        ]);

        // Crear una ubicación si no existe
        $ubicacion = \App\Models\Ubicaciones::firstOrCreate([
            'id_ubicacion' => 1,
            'ciudad' => 'Bogotá',
            'direccion' => 'Calle 123 #45-67',
        ]);

        // Crear registros relacionados
        $empresa = \App\Models\Empresas::firstOrCreate([
            'nombre' => 'Empresa 1',
            'razon_social' => 'Razón Social 1',
            'tipo_empresa' => 'Tecnología',
            'nit' => '123456789',
            'correo' => 'empresa1@example.com',
            'id_usuario' => $usuario->id, // Relación con el usuario existente
            'id_ubicacion' => $ubicacion->id_ubicacion, // Relación con la ubicación existente
        ]);

        $tipoCargo = \App\Models\Tipo_cargos::firstOrCreate(['cargo' => 'Desarrollador']);
        $tipoContrato = \App\Models\Tipo_contratos::firstOrCreate(['tipo' => 'Practicante']);


        // Realizar la solicitud para crear la empresa
        $response = $this->post('/oferta', [
            'nombre_oferta' => 'Practicante en Desarrollo',
            'descripcion' => 'Desarrollar aplicaciones web',
            'salario' => 1500000,
            'id_tipo_cargo' => $tipoCargo->id,
            'id_tipo_contrato' => 1,
            'id_empresa' => $empresa->id_empresa,
            'id_ubicacion' => $ubicacion->id_ubicacion,
        ]);

        $response->assertStatus(302); // Verifica si la redirección fue exitosa
        $this->assertDatabaseHas('ofertas', ['nombre_oferta' => 'Practicante en Desarrollo']); // Verifica si la oferta fue creada
    }

    /**
     * Test para verificar la actualización de una oferta.
     */
    //     public function test_actualizar_oferta()
    //     {
    //         $this->withoutMiddleware();

    //         // Crear registros relacionados
    //         $usuario = User::firstOrCreate([
    //             'username' => 'juanperez',
    //             'id_rol' => '1',
    //             'firstname' => 'Juan',
    //             'lastname' => 'Pérez',
    //             'email' => 'juan.perez@example.com',
    //             'city' => 'Bogotá',
    //             'about' => 'Usuario administrador',
    //             'password' => bcrypt('password123'),
    //         ]);

    //         $empresa = \App\Models\Empresas::firstOrCreate([
    //             'nombre' => 'Empresa 1',
    //             'razon_social' => 'Razón Social 1',
    //             'tipo_empresa' => 'Tecnología',
    //             'nit' => '123456789',
    //             'correo' => 'empresa1@example.com',
    //         ]);

    //         $tipoCargo = \App\Models\TipoCargo::firstOrCreate(['nombre' => 'Desarrollador']);
    //         $ubicacion = \App\Models\Ubicaciones::firstOrCreate([
    //             'ciudad' => 'Bogotá',
    //             'direccion' => 'Calle 123 #45-67',
    //         ]);

    //         // Crear una oferta
    //         $oferta = \App\Models\Ofertas::firstOrCreate([
    //             'nombre_oferta' => 'Practicante en Diseño',
    //             'descripcion' => 'Diseñar interfaces gráficas',
    //             'salario' => 1400000,
    //             'id_tipo_cargo' => $tipoCargo->id,
    //             'id_empresa' => $empresa->id_empresa,
    //             'id_ubicacion' => $ubicacion->id_ubicacion,
    //         ]);

    //         // Realizar la solicitud para actualizar la oferta
    //         $response = $this->put("/oferta/{$oferta->id}", [
    //             'nombre_oferta' => 'Practicante en Diseño Gráfico',
    //             'descripcion' => 'Diseñar interfaces gráficas avanzadas',
    //             'salario' => 1600000,
    //         ]);

    //         $response->assertStatus(302); // Verifica si la redirección fue exitosa
    //         $this->assertDatabaseHas('ofertas', ['nombre_oferta' => 'Practicante en Diseño Gráfico']); // Verifica si la oferta fue actualizada
    //     }

    //     /**
    //      * Test para verificar la eliminación de una oferta.
    //      */
    //     public function test_eliminar_oferta()
    //     {
    //         $this->withoutMiddleware();

    //         // Crear una oferta
    //         $oferta = \App\Models\Ofertas::firstOrCreate([
    //             'nombre_oferta' => 'Oferta a Eliminar',
    //             'descripcion' => 'Descripción de la oferta',
    //             'salario' => 1200000,
    //         ]);

    //         // Realizar la solicitud para eliminar la oferta
    //         $response = $this->delete("/oferta/{$oferta->id}");

    //         $response->assertStatus(302); // Verifica si la redirección fue exitosa
    //         $this->assertDatabaseMissing('ofertas', ['id' => $oferta->id]); // Verifica si la oferta fue eliminada
    //     }

    //     /**
    //      * Test para verificar las validaciones al crear una oferta.
    //      */
    //     public function test_validaciones_crear_oferta()
    //     {
    //         $this->withoutMiddleware();

    //         // Enviar datos inválidos
    //         $response = $this->post('/oferta', [
    //             'nombre_oferta' => '', // Campo vacío
    //             'descripcion' => 'Descripción válida',
    //             'salario' => 1500000,
    //         ]);

    //         $response->assertSessionHasErrors(['nombre_oferta']); // Verifica si hay errores en el campo 'nombre_oferta'
    //     }

    //     /**
    //      * Test para verificar que se puede listar las ofertas.
    //      */
    //     public function test_listar_ofertas()
    //     {
    //         $this->withoutMiddleware();

    //         // Crear varias ofertas
    //         \App\Models\Ofertas::insert([
    //             [
    //                 'nombre_oferta' => 'Oferta 1',
    //                 'descripcion' => 'Descripción 1',
    //                 'salario' => 1000000,
    //             ],
    //             [
    //                 'nombre_oferta' => 'Oferta 2',
    //                 'descripcion' => 'Descripción 2',
    //                 'salario' => 2000000,
    //             ],
    //         ]);

    //         // Realizar la solicitud para listar las ofertas
    //         $response = $this->get('/oferta');

    //         $response->assertStatus(200); // Verifica si la solicitud fue exitosa
    //         $response->assertViewHas('ofertas'); // Verifica si la vista tiene la variable 'ofertas'
    //     }
}
