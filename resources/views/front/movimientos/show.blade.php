@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
    <h1>{{ $usuario->tipo}}</h1>

@stop

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>Ver</th>
                            <th>Fuero</th>
                            <th>Expediente</th>
                            <th>Actor/imputado</th>
                            <th>Demandado/Victima</th>
                            <th>Objeto Procesal</th>
                            <th>Tipo de Sentencia</th>
                            <th>sorteo</th>
                            <th>vencimiento</th>
                        </thead>
                        <tbody>
                        @foreach ($movimientos as $movimiento)
                            
                            <tr>

                                <td><a href="{{ route('sentencias.show', $movimiento->sentencia->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench"> <i class="fas fa-fw fa-lock"></i> </span>    </a></td>


                            @foreach ($fueros as $fuero)

                                @if ($movimiento->causa->fuero_id == $fuero->id)
                                <td>{{ $fuero->descripcion }}</td>
                                @endif
                                
                            @endforeach

                                <td>{{ $movimiento->causa->numero_expediente }}</td>
                                <td>{{ $movimiento->causa->actor_imputado }}</td>
                                <td>{{ $movimiento->causa->demandado_victima }}</td>

                                @foreach ($objetosP as $objetop)

                                    @if ($movimiento->causa->objeto_procesal_id == $objetop->id)
                                        <td>{{ $objetop->descripcion }}</td>
                                    @endif

                                @endforeach

                                @foreach ($tiposentencias as $tipo)

                                    @if ($movimiento->sentencia->tipo_id == $tipo->id)
                                        <td>{{ $tipo->descripcion }}</td>
                                    @endif

                                @endforeach


                                <td>{{ $movimiento->sentencia->fecha_sorteo }}</td>
                                <td>{{ $movimiento->sentencia->fecha_vencimiento }}</td>
                                
                                <td>
                                    <a href="{{ route('movimientos.edit', $movimiento->id) }}" class="btn btn-danger"> <span class="glyphicon glyphicon-wrench">Devolver</span></a>

                                    @if ($usuario->tipo == "Relator")

                                        <a href="{{ route('movimientos.show', $movimiento->sentencia->causa->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench">Voto</span></a>

                                    @else
                                        <a href="{{ route('movimientos.show', $movimiento->sentencia->causa->id) }}" class="btn btn-warning"> <span class="glyphicon glyphicon-wrench">Asignar</span></a>
                                    @endif

                                    
                                </td>
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

