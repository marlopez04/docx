<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sentencia_id')->nullable();
            $table->foreignId('usuario_id')->nullable();
            $table->foreignId('movimiento_id')->nullable();
            $table->string('direccion_archivo');
            $table->enum('tipo',['Pre-Opinante', 'Conformante'])->default('Pre-Opinante');
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
        Schema::dropIfExists('votos');
    }
}
