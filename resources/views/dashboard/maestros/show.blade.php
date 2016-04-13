@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ URL::to('maestros') }}" class="btn btn-default btn-xs" role="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            {{ $maestro->nombre }} {{ $maestro->apellidos }}
            <a href="{{ URL::to('maestros/' . $maestro->id.'/edit/') }}" class="btn btn-default btn-xs pull-right" role="button">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td class="col-md-2 text-right">ID:</td> <td class="col-md-10">{{ $maestro->id }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Nombre:</td> <td class="col-md-10">{{ $maestro->nombre }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Apellidos:</td> <td>{{ $maestro->apellidos }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Direccion:</td> <td>{{ $maestro->direccion }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Genero:</td> <td>{{ $maestro->genero }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Fecha de nacimiento:</td> <td>{{ $maestro->fecha_nacimiento }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Telefono:</td> <td>{{ $maestro->telefono }}</td>
                </tr>
            </table>

        </div>
    </div>
@endsection