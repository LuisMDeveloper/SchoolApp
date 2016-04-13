@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            Maestros
            <a href="{{ URL::to('maestros/create') }}" class="btn btn-default btn-xs pull-right" role="button">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
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
                    <th>Teléfono</th>
                </tr>
                </thead>
                <tbody>
                @foreach($maestros as $key => $maestro)
                    <tr>
                        <td>{{ $maestro->id }}</td>
                        <td><a href="{{ URL::to('maestros/' . $maestro->id) }}">{{ $maestro->nombre }}</a></td>
                        <td>{{ $maestro->apellidos }}</td>
                        <td>{{ $maestro->fecha_nacimiento }}</td>
                        <td>{{ $maestro->telefono }}</td>
                        <td>
                            {{ Form::open(array('url' => 'maestros/' . $maestro->id, 'class' => 'pull-right')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Borrar', array('class' => 'btn btn-warning btn-sm')) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection