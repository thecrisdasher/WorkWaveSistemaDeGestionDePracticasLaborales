<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Este método se ejecuta cuando se aplica la migración.
     * Crea la tabla 'roles' y agrega la columna 'id_rol' a la tabla 'users',
     * estableciendo una relación de clave foránea entre ambas tablas.
     *
     * @return void
     */
    public function up()
    {
        // Crear la tabla 'roles' para almacenar los diferentes tipos de roles de usuario
        Schema::create('roles', function (Blueprint $table) {
            $table->id('id_rol'); // Columna primaria de la tabla 'roles'
            $table->string('tipo_rol_usuario', 255); // Nombre o descripción del rol
        });

        // Modificar la tabla 'users' para agregar la relación con 'roles'
        Schema::table('users', function (Blueprint $table) {
            // Agregar la columna 'id_rol' como unsignedBigInteger para la relación
            $table->unsignedBigInteger('id_rol');

            // Crear la clave foránea que conecta 'users.id_rol' con 'roles.id_rol'
            $table->foreign('id_rol')
                ->references('id_rol') // Referencia la columna 'id_rol' de la tabla 'roles'
                ->on('roles')
                ->onDelete('cascade') // Si se elimina un rol, se eliminan los usuarios asociados
                ->onUpdate('cascade'); // Si se actualiza un rol, se actualiza en los usuarios
        });
    }

    /**
     * Reverse the migrations.
     *
     * Este método se ejecuta cuando se revierte la migración.
     * Elimina la relación de clave foránea y la columna 'id_rol' de la tabla 'users',
     * y elimina la tabla 'roles'.
     *
     * @return void
     */
    public function down()
    {
        // Revertir los cambios en la tabla 'users'
        Schema::table('users', function (Blueprint $table) {
            // Eliminar la clave foránea 'id_rol' y la columna asociada
            $table->dropForeign(['id_rol']);
            $table->dropColumn('id_rol');
        });

        // Eliminar la tabla 'roles'
        Schema::dropIfExists('roles');
    }
};
