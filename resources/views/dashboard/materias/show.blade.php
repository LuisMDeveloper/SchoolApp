@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ URL::to('materias') }}" class="btn btn-default btn-xs" role="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            {{ $materia->nombre }}
            <a href="{{ URL::to('materias/' . $materia->id.'/edit/') }}" class="btn btn-default btn-xs pull-right" role="button">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td class="col-md-2 text-right">ID:</td> <td class="col-md-10">{{ $materia->id }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Nombre:</td> <td class="col-md-10">{{ $materia->nombre }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Descripcion:</td> <td>{{ $materia->descripcion }}</td>
                </tr>

            </table>

        </div>
    </div>
@endsection