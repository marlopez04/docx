<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fuero;
use App\Models\Causa;
use App\Models\Sentencia;
use App\Models\Oficina;
use App\Models\Vocalia;
use App\Models\RespSentencia;

class CausaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $causas = Causa::paginate();
        $causas->load('fuero');
        
        return view('front.causas.index')
        ->with('causas', $causas);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$fueros = Fuero::orderBy('id', 'desc')->select('descripcion', 'id')->get();

        $fueros = Fuero::orderBy('id', 'desc')->get();
        $vocalias = Vocalia::orderBy('id', 'desc')->get();
       

        return view('front.causas.create')
            ->with('fueros', $fueros)
            ->with('vocalias', $vocalias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        //dd($request);

        $causa = new Causa();
        $causa->id_fuero = $request->id_fuero;
        $causa->descripcion = $request->descripcion;
        $causa->numero_expediente = $request->numero_expediente;
        $causa->actor_imputado =  $request->actor_imputado;
        $causa->demandado_victima =  $request->demandado_victima;
        $causa->objeto_procesal =  $request->objeto_procesal;

        //FALTA AGREGAR ANTES DE CREAR LA CAUSA, QUE CORROBORE QUE LA CAUSA NO ESTA CREADA

        //dd($causa);

        $causa->save();

        //se crea la sentencia

        $sentencia = new Sentencia();
        $sentencia->id_causa = $causa->id;
        $sentencia->fecha_sorteo = $request->fecha_sorteo;
        $sentencia->fecha_vencimiento = $request->fecha_vencimiento;
        $sentencia->instancia_sentencia = "1";
        $sentencia->id_tipo = "1";
        $sentencia->save();

        $RespSentencia = new RespSentencia();
        $RespSentencia->id_oficina = $request->vocalia;
        $RespSentencia->save();


        //$causa = new Causa($request->all());

        return redirect()->route('causas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        dd($id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
