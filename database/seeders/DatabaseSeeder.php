<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Oficina;
use App\Models\Fuero;
use App\Models\Secretaria;
use App\Models\Vocalia;
use App\Models\Relatoria;
use App\Models\TipoSentencia;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //FUEROS
        $fuero = new Fuero();
        $fuero->descripcion = "Civil";
        $fuero->save();

        $fuero = new Fuero();
        $fuero->descripcion = "Penal";
        $fuero->save();

        $fuero = new Fuero();
        $fuero->descripcion = "Apremios";
        $fuero->save();

        $fuero = new Fuero();
        $fuero->descripcion = "Documentos";
        $fuero->save();

        $fuero = new Fuero();
        $fuero->descripcion = "Laboral";
        $fuero->save();

        //OFICINAS

        $oficina = new Oficina();
        $oficina->descripcion = "secretaria";
        $oficina->tipo = "secretaria";
        $oficina->save();
        
        $oficina = new Oficina();
        $oficina->descripcion = "vocalia1";
        $oficina->tipo = "vocalia";
        $oficina->save();

        $oficina = new Oficina();
        $oficina->descripcion = "vocalia2";
        $oficina->tipo = "vocalia";
        $oficina->save();

        $oficina = new Oficina();
        $oficina->descripcion = "vocalia3";
        $oficina->tipo = "vocalia";
        $oficina->save();

        $oficina = new Oficina();
        $oficina->descripcion = "relatoria1-1";
        $oficina->tipo = "relatoria";
        $oficina->save();

        $oficina = new Oficina();
        $oficina->descripcion = "relatoria1-2";
        $oficina->tipo = "relatoria";
        $oficina->save();

        $oficina = new Oficina();
        $oficina->descripcion = "relatoria2-1";
        $oficina->tipo = "relatoria";
        $oficina->save();

        $oficina = new Oficina();
        $oficina->descripcion = "relatoria2-2";
        $oficina->tipo = "relatoria";
        $oficina->save();

        $oficina = new Oficina();
        $oficina->descripcion = "relatoria3-1";
        $oficina->tipo = "relatoria";
        $oficina->save();

        $oficina = new Oficina();
        $oficina->descripcion = "relatoria3-2";
        $oficina->tipo = "relatoria";
        $oficina->save();

        //SECRETARIAS

        $secretaria = new Secretaria();
        $secretaria->descripcion = "Secretaria";
        $secretaria->centro = "cap";
        $secretaria->id_oficina = "1";
        $secretaria->save();
        
        //VOCALIAS

        $vocalia = new Vocalia();
        $vocalia->descripcion = "Vocalia1";
        $vocalia->id_secretaria = "1";
        $vocalia->id_oficina = "2";
        $vocalia->save();

        $vocalia = new Vocalia();
        $vocalia->descripcion = "Vocalia2";
        $vocalia->id_secretaria = "1";
        $vocalia->id_oficina = "3";
        $vocalia->save();

        $vocalia = new Vocalia();
        $vocalia->descripcion = "Vocalia3";
        $vocalia->id_secretaria = "1";
        $vocalia->id_oficina = "4";
        $vocalia->save();

        //RELATORIAS

        $relatoria = new Relatoria();
        $relatoria->descripcion = "Relatoria1-1";
        $relatoria->id_vocalia = "1";
        $relatoria->id_oficina = "5";
        $relatoria->save();

        $relatoria = new Relatoria();
        $relatoria->descripcion = "Relatoria1-2";
        $relatoria->id_vocalia = "1";
        $relatoria->id_oficina = "6";
        $relatoria->save();

        $relatoria = new Relatoria();
        $relatoria->descripcion = "Relatoria2-1";
        $relatoria->id_vocalia = "2";
        $relatoria->id_oficina = "7";
        $relatoria->save();

        $relatoria = new Relatoria();
        $relatoria->descripcion = "Relatoria2-2";
        $relatoria->id_vocalia = "2";
        $relatoria->id_oficina = "8";
        $relatoria->save();

        $relatoria = new Relatoria();
        $relatoria->descripcion = "Relatoria2-2";
        $relatoria->id_vocalia = "2";
        $relatoria->id_oficina = "8";
        $relatoria->save();

        //TIPO-SENTENCIA

        $Tsentencia = new TipoSentencia();
        $Tsentencia->descripcion = "Por Mamila";
        $Tsentencia->save();

        $Tsentencia = new TipoSentencia();
        $Tsentencia->descripcion = "Por Gorreao";
        $Tsentencia->save();

        $Tsentencia = new TipoSentencia();
        $Tsentencia->descripcion = "Por Gobernao";
        $Tsentencia->save();

        //USUARIOS
        $usuario = new User();
        $usuario->name = "miguel";
        $usuario->email = "pingo@pingo.com.ar";
        $usuario->password = "1234";
        $usuario->tipo = "ADMIN";
        $usuario->id_oficina = "1";
        $usuario->save();

        $usuario = new User();
        $usuario->name = "martin";
        $usuario->email = "pingo1@pingo.com.ar";
        $usuario->password = "1234";
        $usuario->tipo = "ADMIN";
        $usuario->id_oficina = "1";
        $usuario->save();

        $usuario = new User();
        $usuario->name = "secretario 1";
        $usuario->email = "secretario@pingo.com.ar";
        $usuario->password = "1234";
        $usuario->tipo = "Secretaria";
        $usuario->id_oficina = "1";

        $usuario = new User();
        $usuario->name = "vocal1";
        $usuario->email = "vocal1@pingo.com.ar";
        $usuario->password = "1234";
        $usuario->tipo = "Vocalia";
        $usuario->id_oficina = "2";
        $usuario->save();

        $usuario = new User();
        $usuario->name = "vocal2";
        $usuario->email = "vocal2@pingo.com.ar";
        $usuario->password = "1234";
        $usuario->tipo = "Vocalia";
        $usuario->id_oficina = "3";
        $usuario->save();

        $usuario = new User();
        $usuario->name = "vocal3";
        $usuario->email = "vocal3@pingo.com.ar";
        $usuario->password = "1234";
        $usuario->tipo = "Vocalia";
        $usuario->id_oficina = "4";
        $usuario->save();


        $usuario = new User();
        $usuario->name = "relatoria1-1";
        $usuario->email = "relator1@pingo.com.ar";
        $usuario->password = "1234";
        $usuario->tipo = "Relator";
        $usuario->id_oficina = "5";
        $usuario->save();


        $usuario = new User();
        $usuario->name = "relatoria1-2";
        $usuario->email = "relator2@pingo.com.ar";
        $usuario->password = "1234";
        $usuario->tipo = "Relator";
        $usuario->id_oficina = "6";
        $usuario->save();

        $usuario = new User();
        $usuario->name = "relatoria2-1";
        $usuario->email = "relator3@pingo.com.ar";
        $usuario->password = "1234";
        $usuario->tipo = "Relator";
        $usuario->id_oficina = "7";
        $usuario->save();

        $usuario = new User();
        $usuario->name = "relatoria2-2";
        $usuario->email = "relator4@pingo.com.ar";
        $usuario->password = "1234";
        $usuario->tipo = "Relator";
        $usuario->id_oficina = "8";
        $usuario->save();

        $usuario = new User();
        $usuario->name = "relatoria3-1";
        $usuario->email = "relator5@pingo.com.ar";
        $usuario->password = "1234";
        $usuario->tipo = "Relator";
        $usuario->id_oficina = "9";
        $usuario->save();

        $usuario = new User();
        $usuario->name = "relatoria3-2";
        $usuario->email = "relator6@pingo.com.ar";
        $usuario->password = "1234";
        $usuario->tipo = "Relator";
        $usuario->id_oficina = "10";
        $usuario->save();

    }
}


