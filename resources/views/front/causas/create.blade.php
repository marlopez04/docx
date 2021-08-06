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

                                                            <option value="{{$fuero->id}}">{{ $fuero->descripcion}} </option>

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
                                        <div class="row">
                                            <div class="col-md-6 pr-1">
                                                <div class="form-group">
                                                    <label>Fecha del Sorteo</label>
                                                    <input type="date" name="fecha_sorteo" class="form-control" value="01/01/2021">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-1">
                                                <div class="form-group">
                                                    <label>Fecha del Vencimiento</label>
                                                    <input type="date" name="fecha_vencimiento" class="form-control" value="01/01/2021">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <label for="exampleDataList" class="form-label">Datalist example</label>
                                            <input class="form-control" name="vocalia" list="datalistOptions" id="exampleDataList" placeholder="Seleccionar vocalia">
                                            <datalist id="datalistOptions">
                                            @foreach ($vocalias as $vocalia)

                                                <option value="{{$vocalia->id}}">{{ $vocalia->descripcion}} </option>

                                            @endforeach
                                            </datalist>
                                        </div>

                                        <div class="row">

                                            <select id="ms" multiple="multiple" class="form-control">
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>



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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="multiple-select.js"></script>
<script>
    $(function() {
        $('#ms').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
</script>
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop