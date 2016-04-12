@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ URL::to('grupos') }}" class="btn btn-default btn-xs" role="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            <strong>Grupo {{ $grupo->nombre }}</strong>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <caption>Grupo {{ $grupo->nombre }}</caption>
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Teléfono</th>
                    <th>Facebook</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                @foreach($grupo->alumnos as $key => $alumno)
                    <tr class="{{ str_contains($alumno->estado, 'baja') ? 'danger': '' }}">
                        <td>{{ $alumno->id }}</td>
                        <td><a href="{{ URL::to('alumnos/' . $alumno->id) }}">{{ $alumno->nombre }}</a></td>
                        <td>{{ $alumno->apellidos }}</td>
                        <td>{{ $alumno->telefono }}</td>
                        <td>{{ $alumno->facebook }}</td>
                        <td>{{ $alumno->estado }}</td>
                        <td>
                            <a class="btn btn-danger" href="{{ URL::to('grupos/quitar/'.$grupo->id.'/'.$alumno->id) }}" role="button">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Quitar
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection