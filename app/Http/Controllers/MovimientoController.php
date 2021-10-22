<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Fuero;
use App\Models\Causa;
use App\Models\Sentencia;
use App\Models\Oficina;
use App\Models\Movimiento;
use App\Models\ObjetoProcesal;
use App\Models\TipoSentencia;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {           // show($id, $vigencia, $origen)
                //vigencia va a ingresar para traer los archivados o los vigentes
                //Origen va definir si trae los movimientos que recibe la oficna o los que envio la oficina


        $movimientos = Movimiento::where('destino', $id)
                             ->where('tipo', 'Vigente')
                             ->orderBy('id', 'desc')
                             ->get();

        $movimientos->load('sentencia','causa');

        //dd($movimientos);


        $fueros = Fuero::all();
        $objetosP = ObjetoProcesal::all();
        $tiposentencias = TipoSentencia::all();
        
        return view('front.movimientos.show')
        ->with('movimientos',$movimientos)
        ->with('fueros', $fueros)
        ->with('tiposentencias', $tiposentencias)
        ->with('objetosP', $objetosP);
        



        /*
        //dd($id);
        $causa = Causa::Find($id);
        //dd($causa);

        $sentenciaID = \DB::select("SELECT id FROM sentencias WHERE estado = 'Sorteado' AND causa_id = '{$id}'");

        dd($sentenciaID[0]->id);
/*
        $sentenciaID = Sentencia::select('id')
                                ->where('id_causa', $id)
                                ->where('estado', 'En Tramite' )
                                ->get();
*/

//        dd($sentenciaID);                                        


//        $sentencia = Sentencia::Find($sentenciaID[0]->id);
        
//        $sentencia->load('causa');

        //dd($sentencia);

        //dd($causa);
/*
        $oficinas = Oficina::where('tipo', 'Vocalia')
        ->orderBy('id', 'desc')
        ->get();
*/

/*
        return view('front.vocalia.asignar')
        ->with('oficinas',$oficinas)
        ->with('sentencia', $sentencia)
        ->with('causa', $causa);
*/
        
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
