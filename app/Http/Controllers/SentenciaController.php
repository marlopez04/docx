<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fuero;
use App\Models\User;
use App\Models\Causa;
use App\Models\Sentencia;
use App\Models\Oficina;
use App\Models\Movimiento;
use App\Models\ObjetoProcesal;
use App\Models\TipoSentencia;

class SentenciaController extends Controller
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
        //
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
    {

                $sentencia = Sentencia::Find($id);
                $sentencia->load('causa', 'tiposentencia');   
                
                $oficinas = Oficina::all();

                $movimientos = Movimiento::where('sentencia_id', $id)
                ->orderBy('id', 'desc')
                ->get();
               
                $movimientos->load('sentencia','causa');

                //dd($movimientos);
              
                return view('front.sentencias.show')
                ->with('movimientos', $movimientos)
                ->with('sentencia', $sentencia)
                ->with('oficinas', $oficinas);
                
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
