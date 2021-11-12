@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sentencia</h1>
@stop

@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">


                            <div class="box box-solid box-primary">
                                

                                <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Fuero</th>
                                            <th>Nº expediente</th>
                                            <th>Actor</th>
                                            <th>Demandado</th>
                                            <th>Tipo de Sentencia</th>
                                            <th>Vencimiento</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Fuero: (PENDIENTE)</td>
                                                <td> {{ $sentencia->causa->numero_expediente }} </td>
                                                <td> {{ $sentencia->causa->actor_imputado }} </td>
                                                <td> {{ $sentencia->causa->demandado_victima }} </td>
                                                <td> {{ $sentencia->tiposentencia->descripcion }} </td>
                                                <td> {{ $sentencia->fecha_vencimiento }} </td>
                                            </tr>
                                        </tbody>
                                </table>

                            </div>

                            <div class="box box-solid box-warning">
                                    <h3 class="box-tittle">Historial</h3>
                                    <div class="box-body">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <th>Fecha</th>
                                                <th>Oficina</th>
                                                <th>Detalle</th>
                                                <th>Archivo</th>
                                            </thead>
                                            <tbody>

                                                @foreach ($movimientos as $movimiento)
                                                <tr>
                                                    <td>{{ $movimiento->created_at->format('d/m/Y') }}</td>

                                                    @foreach ( $oficinas as $oficina )
                                                        @if ($movimiento->origen == $oficina->id)
                                                            <td>{{ $oficina->descripcion }}</td>
                                                        @endif
                                                    @endforeach

                                                    <td>{{ $movimiento->motivo }}</td>
                                                    <td><a class="btn btn-info btn-fill btn-wd" data-toggle="modal" data-target="#myModal1" href="#pablo">
                                                        Descargar
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
            </div>

@endsection

 @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop