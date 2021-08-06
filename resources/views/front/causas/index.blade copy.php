@extends('main')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">SENTENCIAS</h4>
                    <p class="card-category">Here is a subtitle for this table</p>
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>Fuero</th>
                            <th>Expediente</th>
                            <th>Actor/imputado</th>
                            <th>Demandado/Victima</th>
                            <th>Objeto Procesal</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Fuero</th>
                            <th>Descripcion</th>
                        </thead>
                        <tbody>
                        @foreach ($causas as $causa)
                            <tr>
                                <td>PENAL</td>
                                <td>{{ $causa->created_at->format('d/m/Y') }}</td>
                                <td>{{ $causa->created_at->format('h:i:s A') }}</td>
                                <td>{{ $causa->fuero->descripcion }}</td>
                                <td>{{ $causa->descripcion }}</td>
                                <td>{{ $causa->numero_expediente }}</td>
                                <td>{{ $causa->actor_imputado }}</td>
                                <td>{{ $causa->demandado_victima }}</td>
                                <td>{{ $causa->objeto_procesal }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection