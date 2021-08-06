@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ASIGNAR (VOCALIA )</h1>
@stop

@section('content')

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h5 >Fuero: (PENDIENTE)</h5>
                                    <h5 >N° expendiente: {{ $sentencia->causa->numero_expediente }}</h5>
                                    <h5 >Actor: {{ $sentencia->causa->actor_imputado }}</h5>
                                    <h5 >Demandado: {{ $sentencia->causa->demandado_victima }}</h5>
                                    <h5 >Tipo de Sentencia: {{ $sentencia->tipo }}</h5> 
                                    <h5 >Vencimiento: {{ $sentencia->fecha_vencimiento }}</h5> 
                                    <br>

                                    <button type="submit" class="btn btn-danger btn-fill pull-left">Devolver</button> <h6>ocacional cuando venga de vocalia</h6>
                                    
                                    <br>
                                    <br>
                                    <br>


                                    <h5 class="card-title">Seleccionar VOCALIA / RELATORIA destino</h5>


                                    <select class="form-select" aria-label="Fuero" >
                                                        <!-- en base a este se deben mostrar los fueros -->
                                                        <option selected></option>
                                                            @foreach ($oficinas as $oficina)

                                                            <option class="form-select form-option-sm"  value="{{$oficina->id}}"> {{ $oficina->descripcion  }}</option>

                                                            @endforeach

                                    </select>                                    
                                    <br>

                                    <button type="submit" class="btn btn-info btn-fill pull-left">Enviar</button>
                                    

                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Fecha</th>
                                            <th>Oficina</th>
                                            <th>Detalle</th>
                                            <th>Descargar</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>24-06-2021</td>
                                                <td>Vocalia 1</td>
                                                <td>detalle simple (capaz que no hace falta)</td>
                                                <td><a class="btn btn-info btn-fill btn-wd" data-toggle="modal" data-target="#myModal1" href="#pablo">
                                                    Descargar
                                                </a></td>
                                            </tr>
                                            <tr>
                                                <td>04-04-2021</td>
                                                <td>Vocalia 2</td>
                                                <td>detalle simple (capaz que no hace falta)</td>
                                                <td><a class="btn btn-info btn-fill btn-wd" data-toggle="modal" data-target="#myModal1" href="#pablo">
                                                    Descargar
                                                </a></td>
                                            </tr>
                                            <tr>
                                                <td>24-03-2021</td>
                                                <td>Vocalia 1</td>
                                                <td>detalle simple (capaz que no hace falta)</td>
                                                <td><a class="btn btn-info btn-fill btn-wd" data-toggle="modal" data-target="#myModal1" href="#pablo">
                                                    Descargar
                                                </a></td>
                                            </tr>
                                            <tr>
                                                <td>20-03-2021</td>
                                                <td>Vocalia 1</td>
                                                <td>detalle simple (capaz que no hace falta)</td>
                                                <td><a class="btn btn-info btn-fill btn-wd" data-toggle="modal" data-target="#myModal1" href="#pablo">
                                                    Descargar
                                                </a></td>
                                            </tr>

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