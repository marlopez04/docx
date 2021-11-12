<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fuero;
use App\Models\Causa;
use App\Models\Sentencia;
use App\Models\Oficina;
use App\Models\Vocalia;
use App\Models\RespSentencia;
use App\Models\Movimiento;
use App\Models\TipoSentencia;
use App\Models\ObjetoProcesal;

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
        $causas->load('fuero','sentencias');

        $fueros = Fuero::all();

        //dd($causas);

        $sentencias = Sentencia::paginate();
        $sentencias->load('causa','tiposentencia');

        $objetosP = ObjetoProcesal::all();

        //dd($objetosP);


        //dd($sentencias);


        return view('front.causas.index')
        ->with('causas', $causas)
        ->with('sentencias', $sentencias)
        ->with('fueros', $fueros)
        ->with('objetosP', $objetosP);
        
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
        
        $TipoSentencias = TipoSentencia::orderBy('id', 'desc')->get();
        $OProcesales = ObjetoProcesal::orderBy('id', 'desc')->get();
       
        return view('front.causas.create')
            ->with('fueros', $fueros)
            ->with('vocalias', $vocalias)
            ->with('TipoSentencias', $TipoSentencias)
            ->with('OProcesales', $OProcesales);
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

        //se crea la causa
        $causa = new Causa();
        $causa->fuero_id = $request->fuero_id;
        $causa->numero_expediente = $request->numero_expediente;
        $causa->actor_imputado =  $request->actor_imputado;
        $causa->demandado_victima =  $request->demandado_victima;
        $causa->objeto_procesal_id =  $request->objeto_procesal_id;

        //FALTA AGREGAR ANTES DE CREAR LA CAUSA, QUE CORROBORE QUE LA CAUSA NO ESTA CREADA

        //dd($causa);

        $causa->save();

        //se crea la sentencia

        $sentencia = new Sentencia();
        $sentencia->causa_id = $causa->id;
        $sentencia->descripcion = "pingo en lata";
        $sentencia->fecha_sorteo = $request->fecha_sorteo;
        $sentencia->fecha_vencimiento = $request->fecha_vencimiento;
        $sentencia->instancia_sentencia = "1";
        $sentencia->tipo_id = "1";
        $sentencia->save();

        //se carga la vocalia preopinante
        $RespSentencia = new RespSentencia();
        $RespSentencia->sentencia_id = $sentencia->id;
        $RespSentencia->oficina_id = $request->vocalia;
        $RespSentencia->tipo = "Preopinante";
        $RespSentencia->save();

        $Movimiento = new Movimiento();
        $Movimiento->sentencia_id = $sentencia->id;
        $Movimiento->causa_id = $causa->id;
        $Movimiento->origen = 1; // debe obtener en base al id de la oficina del usuario 
        $Movimiento->destino = $request->vocalia;
        $Movimiento->motivo = "Pase para voto preopinante.";
        $Movimiento->usuario_id = 1; // usuario que genera el movimiento (en este caso crea la causa)
        $Movimiento->save();


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
