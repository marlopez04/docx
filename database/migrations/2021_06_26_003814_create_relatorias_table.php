<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatorias', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->enum('centro',['CAP', 'BRS', 'CJC', 'CJM'])->default('CAP');
            $table->integer('id_vocalia')->unsigned();
            $table->integer('id_oficina')->unsigned();                      
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
        Schema::dropIfExists('relatorias');
    }
}
