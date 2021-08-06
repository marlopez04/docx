<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sentencia')->nullable();
            $table->foreignId('origen')->nullable();
            $table->foreignId('destino')->nullable();
            $table->foreignId('id_usuario')->nullable();
            $table->enum('tipo',['Pre-Opinante', 'Conformante'])->default('Pre-Opinante');
            $table->string('motivo');
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
        Schema::dropIfExists('movimientos');
    }
}
