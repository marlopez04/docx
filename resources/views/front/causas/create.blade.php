@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sentencias</h1>
@stop

@section('content')

<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Crear Causa</h4>
                                </div>
                                <div class="card-body">
                                <form action="{{ route('causas.store') }}" method="POST">
                                    
                                    @csrf
                                        <div class="row">                                       
                                            <div class="col-md-5 pr-1">
                                                <div class="form-group">

                                                    <label>Fuero</label>
                                
                                                    <select class="form-select" name="id_fuero" aria-label="Fuero" require="">                                                        <!-- Depende de que centro se seleccione -->
                                                        <option selected></option>
                                                            @foreach ($fueros as $fuero)

                                                            <option class="form-select form-option-sm"  value="{{$fuero->id}}">{{ $fuero->descripcion}} </option>

                                                            @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Descripcion</label>
                                                    <input type="text" name="descripcion" class="form-control" placeholder="Descripcion de la causa">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                <label>Numero de Expediente</label>
                                                    <input type="text" name="numero_expediente" class="form-control" placeholder="Numero de Expediente">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Actor Imputado</label>
                                                    <input type="text" name="actor_imputado" class="form-control" placeholder="Actor Imputado">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Demandado / Victima</label>
                                                    <input type="text" name="demandado_victima" class="form-control" placeholder="Demandado / Victima">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                <label>Objeto Procesal</label>
                                                    <input type="text" name="objeto_procesal" class="form-control" placeholder="Objeto Procesal">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Crear</button>
                                        <div class="clearfix"></div>
                                    </form>
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