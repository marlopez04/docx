@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sentencias</h1>
@stop

@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">SENTENCIAS</h4>

                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">


                    <thead>
                                            <th>Centro/Fuero</th>
                                            <th>N° Expediente</th>
                                            <th>Caratula</th>
                                            <th>Tipo de Sentencia</th>
                                            <th>Vencimiento</th>
                                            <th>Estado/Oficina</th>
                                            <th>Asignar</th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                                <td>FILTRO</td>
                                                <td></td>
                                                <td></td>
                                                <td>FILTRO</td>
                                                <td>ORDEN</td>
                                                <th>FILTRO</th> 
                                                <td></td>
                                            </tr>
                                        @foreach ($sentencias as $sentencia)
                                            <tr>
                                                <td>(PENDIENTE)</td>
                                                <td>{{ $sentencia->causa->numero_expediente }}</td>
                                                <td>{{ $sentencia->causa->actor_imputado }} / {{ $sentencia->causa->demandado_victima }}</td>
                                                <td>{{ $sentencia->tiposentencia->descripcion }}</td>
                                                <td>{{ $sentencia->fecha_vencimiento }}</td>
                                                <th>Estado/Oficina</th> <!--evaluar oficina destino del ultimo movimiento -->
                                                <td><a class="btn btn-info btn-fill btn-wd" data-toggle="modal" data-target="#myModal1" href="#pablo">
                                                    Asignar
                                                </a></td>
                                            </tr>

                                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>    


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop


