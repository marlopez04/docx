@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Devolver</h1>
@stop

@section('content')

<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                  <!--  <h4 class="card-title">Devolver</h4> -->
                                </div>
                                <div class="card-body">
                                <form action="{{ route('movimientos.store') }}" method="POST">
                                    
                                    @csrf
                                        <div class="row">                                       
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group">

                                                    <label>Motivo de la devolucion</label>
                                                    <textarea name="motivo" class="form-control" placeholder="Escribir aqui, un texto breve explicando el motivo de la devolucion" id="floatingTextarea2" style="height: 100px"></textarea>
                                                    <input type="text" value="{{$movimiento->usuario_id}}" name="usuario_id" class="form-control">
                                                    <input type="text" value="{{$movimiento->origen}}" name="destino" class="form-control" >
                                                    <input type="text" value="{{$movimiento->destino}}" name="origen" class="form-control" >
                                                    <input type="text" value="{{$movimiento->sentencia_id}}" name="sentencia_id" class="form-control">
                                                    <input type="text" value="{{$movimiento->causa_id}}" name="causa_id" class="form-control" >
                                                    <input type="text" value="{{$movimiento->id}}" name="movimiento" class="form-control" >
                                                    <input type="text" value="devolucion" name="qhaci" class="form-control" >
                                
                                                </div>
                                            </div>
                                           
                                        </div>

                                        <div class="row">

                                        </div>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Enviar</button>
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