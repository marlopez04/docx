<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespSentenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resp_sentencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sentencia')->nullable();
            $table->foreignId('id_oficina')->nullable();
            $table->enum('tipo',['Preopinante', 'Conformante'])->default('Preopinante');
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
        Schema::dropIfExists('resp_sentencias');
    }
}
