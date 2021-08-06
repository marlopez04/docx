<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fuero;
use App\Models\Causa;
use App\Models\Sentencia;
use App\Models\Oficina;

class CausaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


// para mostrar listado en la Vocalia

/*
        $sentencias = Sentencia::paginate();
        $sentencias->load('causa','tiposentencia');

        return view('front.vocalia.index')
        ->with('sentencias', $sentencias);
*/


//        return view('front.causas.asignar');

/*

//se crea la causa
        $causa = new Causa();
        $causa->descripcion = "pingo";
        $causa->id_fuero = "1"; 
        $causa->numero_expediente = "112-poronga";
        $causa->actor_imputado = "el puto";
        $causa->demandado_victima = "La zorra";
        $causa->objeto_procesal = "mi verga";
        $causa->save();

        //dd($causa);
*/

/*

//se crea la sentencia
        $sentencia = new Sentencia();
        $sentencia->id_causa = $causa->id;
        $sentencia->fecha_sorteo = $causa->created_at;
        $sentencia->fecha_vencimiento = $causa->created_at;
        $sentencia->instancia_sentencia = "1";
        $sentencia->id_tipo = "1";
        $sentencia->save();

        $sentencia->load('causa');
*/

//para asignar vocalia
/*
        $oficinas = Oficina::where('tipo', 'Vocalia')
                            ->orderBy('id', 'desc')
                            ->get();

        return view('front.causas.asignar')
            ->with('sentencia', $sentencia)
            ->with('oficinas', $oficinas);
*/
        

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
       

        return view('front.causas.create')
            ->with('fueros', $fueros);
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

        $causa = new Causa($request->all());

        //FALTA AGREGAR ANTES DE CREAR LA CAUSA, QUE CORROBORE QUE LA CAUSA NO ESTA CREADA

        //dd($causa);

        $causa->save();

        //se crea la sentencia

        $sentencia = new Sentencia();
        $sentencia->id_causa = $causa->id;
        $sentencia->fecha_sorteo = $causa->created_at;
        $sentencia->fecha_vencimiento = $causa->created_at;
        $sentencia->instancia_sentencia = "1";
        $sentencia->id_tipo = "1";
        $sentencia->save();


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
        $causa = new Causa();
        $causa->descripcion = "pingo";
        $causa->id_fuero = "1"; 
        $causa->numero_expediente = "112-poronga";
        $causa->actor_imputado = "el puto";
        $causa->demandado_victima = "La zorra";
        $causa->objeto_procesal = "mi verga";
        $causa->save();

        dd($causa);
        
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
