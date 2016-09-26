<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePodersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha');
            $table->string('poderante');
            $table->string('dni');
            $table->string('direccion');
            $table->string('localidad');
            $table->string('demandado');
            $table->string('aseguradora');
            $table->string('fecha_siniestro');
            $table->string('dominio_siniestro');
            $table->string('direccion_siniestro');
            $table->string('localidad_siniestro');
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
        Schema::drop('poders');
    }
}
