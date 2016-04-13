@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ URL::to('cursos') }}" class="btn btn-default btn-xs" role="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            {{ $curso->nombre }} {{ $curso->apellidos }}
            <a href="{{ URL::to('cursos/' . $curso->id.'/edit/') }}" class="btn btn-default btn-xs pull-right" role="button">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td class="col-md-2 text-right">ID:</td> <td class="col-md-10">{{ $curso->id }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Nombre:</td> <td class="col-md-10">{{ $curso->nombre }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">fecha_inicio:</td> <td>{{ $curso->fecha_inicio }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">fecha_fin:</td> <td>{{ $curso->fecha_fin }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">materia:</td> <td>{{ $curso->materia->nombre }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">maestro:</td> <td>{{ $curso->maestro->nombre }} {{ $curso->maestro->apellidos }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">descripcion:</td> <td>{{ $curso->descripcion }}</td>
                </tr>
            </table>

        </div>
    </div>
@endsection