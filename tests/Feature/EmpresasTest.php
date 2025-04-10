<?php

namespace Tests\Feature;


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class EmpresasTest extends TestCase
{
    use RefreshDatabase; // Limpia la base de datos después de cada prueba
    use WithFaker; // Genera datos aleatorios para las pruebas

    /**
     * Test para verificar la creación de una empresa.
     */
    public function test_crear_empresa()
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

        // Realizar la solicitud para crear la empresa
        $response = $this->post('/admin-empresas', [
            'nombre' => 'technologia',
            'razon_social' => 'Tecnología S.A.S.',
            'tipo_empresa' => 'Tecnología',
            'nit' => '123456789',
            'correo' => 'camilo@gmail.com',
            'id_usuario' => $usuario->id, // Relación con usuario
            'id_ubicacion' => $ubicacion->id_ubicacion, // Relación con ubicación
        ]);

        $response->assertStatus(302); // Verifica si la redirección fue exitosa
        $this->assertDatabaseHas('empresas', ['correo' => 'camilo@gmail.com']); // Verifica si la empresa fue creada
    }

    public function test_eliminar_empresa()
    {
        $this->withoutMiddleware();

        // Crear un usuario si no existe
        $usuario = User::firstOrCreate([
            'username' => 'juanperez',
            'id_rol' => '1',
            'firstname' => 'Juan',
            'lastname' => 'Pérez',
            'email' => 'juan.perez@example.com',
            'city' => 'Bogotá',
            'about' => 'Usuario administrador',
            'password' => bcrypt('password123'),
        ]);

        // Crear una ubicación si no existe
        $ubicacion = \App\Models\Ubicaciones::firstOrCreate([
            'id_ubicacion' => 1,
            'ciudad' => 'Bogotá',
            'direccion' => 'Calle 123 #45-67',
        ]);

        // Crear una empresa si no existe
        $empresa = \App\Models\Empresas::firstOrCreate([
            'nombre' => 'Empresa a Eliminar',
            'razon_social' => 'Razón Social',
            'tipo_empresa' => 'Tecnología',
            'nit' => '123456789',
            'correo' => 'empresa.eliminar@example.com',
            'id_usuario' => $usuario->id,
            'id_ubicacion' => $ubicacion->id_ubicacion,
        ]);

        // Realizar la solicitud para eliminar la empresa
        $response = $this->delete("/admin-empresas/{$empresa->id_empresa}");

        $response->assertStatus(302); // Verifica si la redirección fue exitosa
        $this->assertDatabaseMissing('empresas', ['id_empresa' => $empresa->id_empresa]); // Verifica si la empresa fue eliminada
    }

    public function test_validaciones_crear_empresa()
    {
        $this->withoutMiddleware();

        // Crear un usuario si no existe
        $usuario = User::firstOrCreate([
            'username' => 'juanperez',
            'id_rol' => '1',
            'firstname' => 'Juan',
            'lastname' => 'Pérez',
            'email' => 'juan.perez@example.com',
            'city' => 'Bogotá',
            'about' => 'Usuario administrador',
            'password' => bcrypt('password123'),
        ]);

        // Crear una ubicación si no existe
        $ubicacion = \App\Models\Ubicaciones::firstOrCreate([
            'id_ubicacion' => 1,
            'ciudad' => 'Bogotá',
            'direccion' => 'Calle 123 #45-67',
        ]);

        // Enviar datos inválidos
        $response = $this->post('/admin-empresas', [
            'nombre' => '', // Campo vacío
            'razon_social' => '', // Campo vacío
            'tipo_empresa' => '', // Campo vacío
            'nit' => '', // Campo vacío
            'correo' => 'correo-no-valido', // Correo inválido
            'id_usuario' => '', // Campo vacío
            'id_ubicacion' => '', // Campo vacío
        ]);

        // Verificar que se generen errores de validación
        $response->assertSessionHasErrors([
            'nombre',
            'razon_social',
            'tipo_empresa',
            'nit',
            'correo',
            'id_usuario',
            'id_ubicacion',
        ]);
    }

    public function test_actualizar_empresa()
    {
        $this->withoutMiddleware();

        // Crear un usuario si no existe
        $usuario = User::firstOrCreate([
            'username' => 'juanperez',
            'id_rol' => '1',
            'firstname' => 'Juan',
            'lastname' => 'Pérez',
            'email' => 'juan.perez@example.com',
            'city' => 'Bogotá',
            'about' => 'Usuario administrador',
            'password' => bcrypt('password123'),
        ]);

        // Crear una ubicación si no existe
        $ubicacion = \App\Models\Ubicaciones::firstOrCreate([
            'id_ubicacion' => 1,
            'ciudad' => 'Bogotá',
            'direccion' => 'Calle 123 #45-67',
        ]);

        // Crear una empresa si no existe
        $empresa = \App\Models\Empresas::firstOrCreate([
            'nombre' => 'Empresa Antigua',
            'razon_social' => 'Razón Social Antigua',
            'tipo_empresa' => 'Tecnología',
            'nit' => '123456789',
            'correo' => 'empresa.antigua@example.com',
            'id_usuario' => $usuario->id,
            'id_ubicacion' => $ubicacion->id_ubicacion,
        ]);

        // Realizar la solicitud para actualizar la empresa
        $response = $this->put("/admin-empresas/{$empresa->id_empresa}", [
            'nombre' => 'Empresa Actualizada',
            'razon_social' => 'Razón Social Actualizada',
            'tipo_empresa' => 'Servicios',
            'nit' => '987654321',
            'correo' => 'empresa.actualizada@example.com',
        ]);

        $response->assertStatus(302); // Verifica si la redirección fue exitosa
        $this->assertDatabaseHas('empresas', ['nombre' => 'Empresa Actualizada']); // Verifica si la empresa fue actualizada
    }

}
