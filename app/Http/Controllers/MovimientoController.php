<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Fuero;
use App\Models\User;
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

        

        $Movimiento1 = Movimiento::find($request->movimiento);
        $Movimiento1->estado = "Archivado";
        $Movimiento1->save();

        $Movimiento = new Movimiento();
        $Movimiento->sentencia_id = $request->sentencia_id;
        $Movimiento->causa_id = $request->causa_id;
        $Movimiento->origen = $request->origen; // debe obtener en base al id de la oficina del usuario 
        $Movimiento->destino = $request->destino;
        $Movimiento->tipo = "Devolucion";
        $Movimiento->motivo = $request->motivo; 
        $Movimiento->usuario_id = $request->usuario_id; // usuario que genera el movimiento (en este caso crea la causa)
        $Movimiento->save();

        /*

        if ($request->file('imagen'))
        {
            $file = $request->file('imagen');
            $nombre = 'articulo_' . time() .'.' . $file->getClientOriginalExtension();
            $path = public_path() . '/imagenes/articulos/';
            $file->move($path, $nombre);     
        } 

        */


        return redirect()->route('movimientos.show', $Movimiento->origen);        

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

            /*
                3 secretario
                4 vocal
                7 relator
            */
        $usuario = User::find(7);

        $movimientos = Movimiento::where('destino', $id)
                             ->where('estado', 'Vigente')
                             ->orderBy('id', 'desc')
                             ->get();

        $movimientos->load('sentencia','causa','origen');

        //dd($movimientos);


        $fueros = Fuero::all();
        $objetosP = ObjetoProcesal::all();
        $tiposentencias = TipoSentencia::all();
        
        return view('front.movimientos.show')
        ->with('movimientos',$movimientos)
        ->with('fueros', $fueros)
        ->with('usuario', $usuario)
        ->with('tiposentencias', $tiposentencias)
        ->with('objetosP', $objetosP);
        

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           /*
                3 secretario
                4 vocal
                7 relator
            */

        $usuario = User::find(7);

        $movimiento = Movimiento::find($id);

        $movimiento->load('sentencia','causa');

        //dd($movimiento);

        $fueros = Fuero::all();
        $objetosP = ObjetoProcesal::all();
        $tiposentencias = TipoSentencia::all();

        return view('front.movimientos.devolver')
        ->with('movimiento',$movimiento)
        ->with('fueros', $fueros)
        ->with('usuario', $usuario)
        ->with('tiposentencias', $tiposentencias)
        ->with('objetosP', $objetosP);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mov($movi,$mov)
    {
     
        /*
        secretaria
            1º pre opinante
            2º secretaria vocalia 2
            3º devolucion (vocalia)
        vocalia
            4º al relator
            5º devolucion (secret)
            6º devolucion (relat)
            7º remision (voto)
        relatoria
            8º subir voto
            9º corregir voto
            10º devolucion
        */

        switch ($mov){
            case '2': //secretaria -> vocalia 2
                break;
            case '3': //devolucion secretaria -> vocalia

                return view('front.movimientos.devolver')
                ->with('movimiento',$movimiento)
                ->with('fueros', $fueros)
                ->with('usuario', $usuario)
                ->with('tiposentencias', $tiposentencias)
                ->with('objetosP', $objetosP);

                break;
            case '4': //vocalia -> relator 
                break;
            case '5': //devolucion vocalia -> secretaria 

                return view('front.movimientos.devolver')
                ->with('movimiento',$movimiento)
                ->with('fueros', $fueros)
                ->with('usuario', $usuario)
                ->with('tiposentencias', $tiposentencias)
                ->with('objetosP', $objetosP);

                break;
            case '6': //devolucion vocalia -> relatoria
                //se copia el archivo de la relatoria, y se lo asigna al movimiento nuevo. Aparte se borra el linck el archivo de la relatoria

                return view('front.movimientos.devolver')
                ->with('movimiento',$movimiento)
                ->with('fueros', $fueros)
                ->with('usuario', $usuario)
                ->with('tiposentencias', $tiposentencias)
                ->with('objetosP', $objetosP);

                break;
            case '7': //remision vocalia -> secretaria
                //se copia el archivo de la relatoria, y se lo asigna al movimiento nuevo
                break;
            case '8': //subir voto relatoria -> vocalia
                break;
            case '9': //corregir voto relatoria -> vocalia
                break;
            case '10': //devolucion relatoria -> vocalia

                return view('front.movimientos.devolver')
                ->with('movimiento',$movimiento)
                ->with('fueros', $fueros)
                ->with('usuario', $usuario)
                ->with('tiposentencias', $tiposentencias)
                ->with('objetosP', $objetosP);

                break;
            default:
                break;
        }

        $movimiento = Movimiento::find($movi);
        dd($movi . "-----". $mov);
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
