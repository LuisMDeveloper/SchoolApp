@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            Grupos
            <a href="{{ URL::to('grupos/create') }}" class="btn btn-default btn-xs pull-right" role="button">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Numero de Alumnos</th>
                    <th>Disponoble</th>
                    <th>Creado en</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($grupos as $key => $grupo)
                    <tr>
                        <td>{{ $grupo->id }}</td>
                        <td><a href="{{ URL::to('grupos/' . $grupo->id) }}">{{ $grupo->nombre }}</a></td>
                        <td>{{ count($grupo->alumnos) }}</td>
                        <td>{{ $grupo->limite }}</td>
                        <td>{{ $grupo->created_at }}</td>
                        <td>
                            <a class="btn btn-default" href="{{ URL::to('grupos/asignar/' . $grupo->id) }}" role="button">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Asignar Alumnos
                            </a>
                            <a class="btn btn-success" href="{{ URL::to('grupos/ecxel/' . $grupo->id) }}" role="button">
                                <span class="glyphicon glyphicon-download" aria-hidden="true"></span> Excel
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection