<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->id('id_ubicacion');
            $table->string('direccion', 255);
            $table->string('ciudad', 255);
            $table->timestamps();
        });

        Schema::create('empresas', function (Blueprint $table) {
            $table->id('id_empresa');
            $table->string('nombre');
            $table->string('razon_social');
            $table->string('tipo_empresa');
            $table->string('nit')->unique();
            $table->string('correo')->unique();
            $table->unsignedBigInteger('id_usuario'); // Clave foránea
            $table->unsignedBigInteger('id_ubicacion'); // Clave foránea
            $table->timestamps();

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_ubicacion')->references('id_ubicacion')->on('ubicaciones')->onDelete('cascade');
        });

        Schema::create('tipo_cargos', function (Blueprint $table) {
            $table->id('id_tipo_cargo'); // Cambiado para que coincida con la clave foránea
            $table->string('cargo', 255);
        });

        Schema::create('tipo_contratos', function (Blueprint $table) {
            $table->id('id_tipo_contrato');
            $table->string('tipo', 255);
        });

        Schema::create('ofertas', function (Blueprint $table) {
            $table->id('id_oferta');
            $table->string('nombre_oferta');
            $table->text('descripcion');
            $table->decimal('salario', 10, 2);
            $table->date('fecha_limite')->nullable();
            $table->timestamps();

            // Claves foráneas
            $table->unsignedBigInteger('id_tipo_cargo');
            $table->unsignedBigInteger('id_tipo_contrato');
            $table->unsignedBigInteger('id_empresa');
            $table->unsignedBigInteger('id_ubicacion');

            $table->foreign('id_tipo_cargo')->references('id_tipo_cargo')->on('tipo_cargos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tipo_contrato')->references('id_tipo_contrato')->on('tipo_contratos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_empresa')->references('id_empresa')->on('empresas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ubicacion')->references('id_ubicacion')->on('ubicaciones')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('hojas_de_vida', function (Blueprint $table) {
            $table->id('id_hojadevida');
            $table->boolean('archivo');
        });

        Schema::create('estados_solicitudes', function (Blueprint $table) {
            $table->id('id_estadosolicitud');
            $table->string('estado');
        });

        Schema::create('postulantes', function (Blueprint $table) {
            $table->id('id_postulante');
            $table->string('nombre', 255);
            $table->string('apellido', 255);
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id('id_solicitud');
            $table->unsignedBigInteger('id_hojadevida');
            $table->unsignedBigInteger('id_postulante');
            $table->unsignedBigInteger('id_estadosolicitud');
            $table->unsignedBigInteger('id_oferta');
            $table->timestamp('fecha_solicitud')->nullable();

            $table->foreign('id_hojadevida')->references('id_hojadevida')->on('hojas_de_vida')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_postulante')->references('id_postulante')->on('postulantes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_estadosolicitud')->references('id_estadosolicitud')->on('estados_solicitudes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_oferta')->references('id_oferta')->on('ofertas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes');
        Schema::dropIfExists('postulantes');
        Schema::dropIfExists('estados_solicitudes');
        Schema::dropIfExists('hojas_de_vida');
        Schema::dropIfExists('ofertas');
        Schema::dropIfExists('tipo_contratos');
        Schema::dropIfExists('tipo_cargos');
        Schema::dropIfExists('empresas');
        Schema::dropIfExists('ubicaciones');
    }
};
