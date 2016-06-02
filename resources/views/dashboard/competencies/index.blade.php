@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            Competencias para el curso {{ $curso->nombre }}
            <a href="{{ URL::to('cursos/'.$curso->id.'/competencies/create') }}" class="btn btn-default btn-xs pull-right" role="button">
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
                @foreach($competencies as $key => $competency)
                    <tr>
                        <td>{{ $competency->id }}</td>
                        <td><a href="{{ URL::to('cursos/'.$curso->id.'/competencies/' . $competency->id . "/edit/") }}">{{ $competency->name }}</a></td>
                        <td> {{ str_limit($competency->description, 33) }}</td>
                        <td>
                            {{ Form::open(array('url' => 'cursos/'.$curso->id.'/competencies/' . $competency->id, 'class' => 'pull-right')) }}
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