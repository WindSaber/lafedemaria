<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kickoff extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('rol', function($table) {
                    $table->increments('id');
                    $table->string('nombre', 50);
                    $table->timestamps();
                });
        Schema::create('forma_pago', function($table) {
                    $table->increments('id');
                    $table->string('nombre', 50);
                    $table->timestamps();
                });
        Schema::create('ubicacion', function($table) {
                    $table->increments('id');
                    $table->string('nombre', 50);
                    $table->timestamps();
                });
        Schema::create('servicio', function($table) {
                    $table->increments('id');
                    $table->string('nombre', 100);
                    $table->timestamps();
                });
        Schema::create('datos_personales', function($table) {
                    $table->increments('id');
                    $table->string('nombre', 80);
                    $table->string('apellido_paterno', 80);
                    $table->string('apellido_materno', 80)->nullable();
                    $table->timestamps();
                });
        Schema::create('invitado', function($table) {
                    $table->increments('id');
                    $table->integer('datos_personales_id')->unsigned();
                    $table->foreign('datos_personales_id')->references('id')->on('datos_personales')->onDelete('cascade');
                    $table->tinyInteger('invitacion_impresa')->nullable();
                    $table->tinyInteger('invitacion_entregada')->nullable();
                    $table->tinyInteger('invitacion_aceptada')->nullable();
                    $table->integer('ubicacion_id')->unsigned();
                    $table->foreign('ubicacion_id')->references('id')->on('ubicacion')->onDelete('cascade');
                    $table->string('referencia', 150)->nullable();
                    $table->string('observaciones', 150)->nullable();
                    $table->integer('forma_pago_id')->unsigned()->nullable();
                    $table->foreign('forma_pago_id')->references('id')->on('forma_pago')->onDelete('cascade');
                    $table->timestamps();
                });
        Schema::create('integrante', function($table) {
                    $table->increments('id');
                    $table->integer('datos_personales_id')->unsigned();
                    $table->foreign('datos_personales_id')->references('id')->on('datos_personales')->onDelete('cascade');
                    $table->integer('rol_id')->unsigned();
                    $table->foreign('rol_id')->references('id')->on('rol');
                    $table->integer('ubicacion_responsable')->unsigned();
                    $table->foreign('ubicacion_responsable')->references('id')->on('ubicacion')->onDelete('cascade');
                    $table->string('celular', 10)->nullable();
                    $table->string('telefono', 10)->nullable();
                    $table->string('facebook', 20)->nullable();
                    $table->string('password', 40);
                    $table->timestamps();
                });
        Schema::create('proveedor', function($table) {
                    $table->increments('id');
                    $table->string('nombre', 60);
                    $table->string('responsable', 60)->nullable();
                    $table->string('celular', 10)->nullable();
                    $table->string('telefono1', 10)->nullable();
                    $table->string('telefono2', 10)->nullable();
                    $table->string('email', 25)->nullable();
                    $table->string('observaciones', 150)->nullable();
                    $table->timestamps();
                });

        Schema::create('movimiento', function($table) {
                    $table->increments('id');
                    $table->date('fecha');
                    $table->float('monto');
                    $table->char('entrada_salida', 1);
                    $table->integer('proveedor_id')->unsigned()->nullable();
                    $table->foreign('proveedor_id')->references('id')->on('proveedor')->onDelete('cascade');
                    $table->integer('invitado_id')->unsigned()->nullable();
                    $table->foreign('invitado_id')->references('id')->on('invitado')->onDelete('cascade');
                    $table->string('observaciones', 150)->nullable();
                    $table->timestamps();
                });
        Schema::create('cotizacion', function($table) {
                    $table->increments('id');
                    $table->integer('proveedor_id')->unsigned();
                    $table->foreign('proveedor_id')->references('id')->on('proveedor')->onDelete('cascade');
                    $table->date('fecha_recepcion')->nullable();
                    $table->date('fecha_limite_pago')->nullable();
                    $table->float('monto')->nullable();
                    $table->tinyInteger('esSeleccionado')->nullable();
                    $table->tinyInteger('cantidad')->nullable();
                    $table->string('unidad')->nullable();
                    $table->string('observaciones', 150)->nullable();
                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
