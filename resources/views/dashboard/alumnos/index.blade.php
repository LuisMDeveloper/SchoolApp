@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            Alumnos
            <a href="{{ URL::to('alumnos/create') }}" class="btn btn-primary btn-xs pull-right" role="button">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Crear Alumno
            </a>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha de nacimiento</th>
                    <th>Tel&eacute;fono</th>
                    <th>Nombre del tutor</th>
                    <th>Tel&eacute;fono de emergencia</th>
                    <th>Facebook</th>
                    <th>Estado</th>
                </tr>
                </thead>
                <tbody>
                @foreach($alumnos as $key => $alumno)
                    <tr>
                        <td>{{ $alumno->id }}</td>
                        <td><a href="{{ URL::to('alumnos/' . $alumno->id) }}">{{ $alumno->nombre }}</a></td>
                        <td>{{ $alumno->apellidos }}</td>
                        <td>{{ $alumno->fecha_nacimiento }}</td>
                        <td>{{ $alumno->telefono }}</td>
                        <td>{{ $alumno->nombre_del_tutor }}</td>
                        <td>{{ $alumno->num_emergencia }}</td>
                        <td>{{ $alumno->facebook }}</td>
                        <td>{{ $alumno->estado }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection