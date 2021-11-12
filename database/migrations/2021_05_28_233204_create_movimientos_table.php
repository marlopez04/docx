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
            $table->foreignId('sentencia_id')->nullable();
            $table->foreignId('causa_id')->nullable();
            $table->foreignId('origen')->nullable();
            $table->foreignId('destino')->nullable();
            $table->enum('tipo',['Asignacion', 'Devolucion', 'Voto'])->default('Asignacion');
            $table->enum('estado',['Vigente', 'Archivado'])->default('Vigente');
            $table->foreignId('usuario_id')->nullable();
            $table->string('motivo');
            $table->string('archivo', 200);
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
