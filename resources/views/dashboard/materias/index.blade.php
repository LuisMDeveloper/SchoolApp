@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            Materias
            <a href="{{ URL::to('materias/create') }}" class="btn btn-default btn-xs pull-right" role="button">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </a>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                </tr>
                </thead>
                <tbody>
                @foreach($materias as $key => $materia)
                    <tr>
                        <td>{{ $materia->id }}</td>
                        <td><a href="{{ URL::to('materias/' . $materia->id) }}">{{ $materia->nombre }}</a></td>
                        <td>{{ str_limit($materia->descripcion, 100) }}</td>
                        <td>
                            {{ Form::open(array('url' => 'materias/' . $materia->id, 'class' => 'pull-right')) }}
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