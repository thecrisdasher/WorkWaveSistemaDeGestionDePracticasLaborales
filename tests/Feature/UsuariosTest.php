<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;

class UsuariosTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * Test para verificar la creación de un usuario.
     */
    public function test_crear_usuario()
    {
        $this->withoutMiddleware();

        // Crear un rol si no existe
        $role = Roles::firstOrCreate([
            'id_rol' => 1,
            'tipo_rol_usuario' => 'Administrador'
        ]); // Asegúrate que este rol existe

        $response = $this->post('/admin-users', [
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

        $response->assertStatus(302); // Verifica si la redirección fue exitosa
        $this->assertDatabaseHas('users', ['email' => 'juan.perez@example.com']); // Verifica si el usuario fue creado
    }

    /**
     * Test para verificar la actualización de un usuario.
     */
    public function test_actualizar_usuario()
    {
        $this->withoutMiddleware();

        $role = Roles::firstOrCreate([
            'id_rol' => 1,
            'tipo_rol_usuario' => 'Administrador'
        ]); // Asegúrate que este rol exista

        $user = User::factory()->create([
            'username' => 'abel',
            'id_rol' => $role->id_rol, // Usar un rol válido
            'firstname' => 'abel',
            'lastname' => 'sol',
            'email' => 'juan.carlos@example.com',
            'password' => 'camilo123',
            'city' => 'camilo123',
            'postal' => 'camilo123',
            'about' => 'camilo123',
            'carrera' => 'camilo123',
            'facultad' => 'camilo123'
        ]);

        $response = $this->put("/admin-users/{$user->id}", [

            'username' => 'abel',
            'id_rol' => $role->id_rol, // Usar un rol válido
            'firstname' => 'abel',
            'lastname' => 'sol',
            'email' => 'juan.carlos@example.com',
            'password' => 'camilo123',
            'city' => 'camilo123',
            'postal' => 'camilo123',
            'about' => 'camilo123',
            'carrera' => 'camilo123',
            'facultad' => 'camilo123'
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', ['email' => 'juan.carlos@example.com']); // Verifica si el usuario fue actualizado
    }

    /**
     * Test para verificar la eliminación de un usuario.
     */
    public function test_eliminar_usuario()
    {
        $this->withoutMiddleware();

        $role = Roles::firstOrCreate([
            'id_rol' => 1,
            'tipo_rol_usuario' => 'Administrador'
        ]);

        $user = User::factory()->create(['id_rol' => $role->id_rol]);

        $response = $this->delete("/admin-users/{$user->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('users', ['id' => $user->id]); // Verifica si el usuario fue eliminado
    }

    /**
     * Test para verificar las validaciones al crear un usuario.
     */
    public function test_validaciones_crear_usuario()
    {
        $this->withoutMiddleware();

        // Crear el rol si no existe
        $role = Roles::firstOrCreate([
            'id_rol' => 1,
            'tipo_rol_usuario' => 'Administrador'
        ]);

        // Enviar datos inválidos
        $response = $this->post('/admin-users', [
            'username' => '', // Campo vacío
            'id_rol' => '', // Campo vacío
            'firstname' => '',
            'lastname' => '',
            'email' => 'correo-no-valido', // Correo inválido
            'password' => '', // Contraseña vacía
            'password_confirmation' => '', // Confirmación vacía
        ]);

        // Verificar que se generen errores de validación
        $response->assertSessionHasErrors([
            'username',
            'id_rol',
            'firstname',
            'lastname',
            'email',
            'password',
        ]);
    }

    /**
     * Test para verificar que se puede listar los usuarios.
     */
    public function test_listar_usuarios()
    {
        $this->withoutMiddleware();

        $role = Roles::firstOrCreate([
            'id_rol' => 1,
            'tipo_rol_usuario' => 'Administrador'
        ]); 

        User::factory()->count(5)->create(['id_rol' => $role->id_rol]);

        $response = $this->get('/admin-users');

        $response->assertStatus(200);
        $response->assertViewHas('users_admin'); // Verifica que la variable 'users_admin' esté disponible en la vista
    }

}
