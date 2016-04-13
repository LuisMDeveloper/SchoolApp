@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            Cursos
            <a href="{{ URL::to('cursos/create') }}" class="btn btn-default btn-xs pull-right" role="button">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Fecha de inicio</th>
                    <th>Fecha de fin</th>
                    <th>Materia</th>
                    <th>Maestro</th>
                    <th>Descripcion</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cursos as $key => $curso)
                    <tr>
                        <td>{{ $curso->id }}</td>
                        <td><a href="{{ URL::to('cursos/' . $curso->id) }}">{{ $curso->nombre }}</a></td>
                        <td>{{ $curso->fecha_inicio }}</td>
                        <td>{{ $curso->fecha_fin }}</td>
                        <td>{{ $curso->materia->nombre }}</td>
                        <td>{{ $curso->maestro->nombre }} {{ $curso->maestro->apellidos }}</td>
                        <td> {{ str_limit($curso->descripcion, 33) }}</td>
                        <td>
                            <a class="btn btn-default" href="{{ URL::to('cursos/asignar/' . $curso->id) }}" role="button">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Asignar Grupos
                            </a>
                        </td>
                        <td>
                            {{ Form::open(array('url' => 'cursos/' . $curso->id, 'class' => 'pull-right')) }}
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