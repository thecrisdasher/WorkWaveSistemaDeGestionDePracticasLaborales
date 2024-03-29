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
            $table->id('id_ubicaciones',11)->autoIncrement();
            $table->string('direccion',255);
            $table->string('ciudad',255);
        });
        Schema::create('empresas', function (Blueprint $table) {
            $table->id('id_empresa',11)->autoIncrement();
            $table->string('nombre',255);
            $table->string('razon_social',255);
            $table->unsignedBigInteger('id_ubicacion',11);
            $table->unsignedBigInteger('id_usuario',11);
            $table->timestamps();
            $table->foreign('id_ubicacion')->references('id_ubicacion')->on('ubicaciones');
            $table->foreign('id_usuario')->references('id')->on('users');
        });
        Schema::create('tipo_cargos', function (Blueprint $table) {
            $table->id('id_cargo',11)->autoIncrement();
            $table->string('cargo',255);
        });
        Schema::create('tipo_comtratos', function (Blueprint $table) {
            $table->id('id_tipo_contrato',11)->autoIncrement();
            $table->string('tipo',255);
        });
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id('id_oferta',11)->autoIncrement();
            $table->string('nombre_oferta',255);
            $table->string('descripcion',255);
            $table->decimal('salario',10,2);
            $table->date('fecha_limite');
            $table->unsignedBigInteger('id_tipo_cargo',11);
            $table->unsignedBigInteger('id_tipo_contrato',11);
            $table->unsignedBigInteger('id_empresa',11);
            $table->unsignedBigInteger('id_ubicacion',11);
            $table->timestamps();
            $table->foreign('id_tipo_cargo')->references('id_cargo')->on('tipo_cargos');
            $table->foreign('id_tipo_contrato')->references('id_tipo_contrato')->on('tipo_contratos');
            $table->foreign('id_empresa')->references('id_empresa')->on('empresas');
            $table->foreign('id_ubicacion')->references('id_ubicaion')->on('ubicaciones');
        });
        Schema::create('hojas_de_vida', function (Blueprint $table) {
            $table->id('id_hojadevida',11)->autoIncrement();
            $table->binary('archivo');
        });
        Schema::create('estados_solicitudes', function (Blueprint $table) {
            $table->id('id_estadosolicitud',11)->autoIncrement();
            $table->binary('estado',255);
        });
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id('id_solicitud',11)->autoIncrement();
            $table->unsignedBigInteger('id_hojadevida',11);
            $table->unsignedBigInteger('id_postulante',11);
            $table->unsignedBigInteger('id_estadosolicitud',11);
            $table->unsignedBigInteger('id_oferta',11);
            $table->timestamps('fecha_solicitud');
            $table->foreign('id_hojadevida')->references('id_hojadevida')->on('hojas_de_vida');
            $table->foreign('id_postulante')->references('id_postulante')->on('postulantes');
            $table->foreign('id_estadosolicitud')->references('id_estadosolicitud')->on('estados_solicitudes');
            $table->foreign('id_oferta')->references('id_estadosolicitud')->on('estados_solicitudes');
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->id('id_rol',11)->autoIncrement();
            $table->string('tipo_rol_usuario',255);
        });

        Schema::create('databasae_workwave', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('databasae_workwave');
    }
};
