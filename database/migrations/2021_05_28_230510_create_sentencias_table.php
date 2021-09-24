<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sentencias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('causa_id')->nullable();
            $table->date('fecha_sorteo');
            $table->date('fecha_vencimiento');
            $table->string('instancia_sentencia');
            $table->foreignId('tipo_id')->nullable();
            $table->enum('estado',['Sorteado','En Tramite','Para Firmar', 'Archivada'])->default('Sorteado');
            $table->string('descripcion');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sentencias');
    }
}
