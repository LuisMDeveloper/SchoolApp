@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            {{ $curso->nombre }} {{ $curso->apellidos }}
        </div>
        <div class="panel-body">
            {!! Form::open(array('url' => 'cursos/manual/'. $curso->id, 'method' => 'put')) !!}

            <div class="form-group">
                {!! Form::label('grupos[]', 'Grupos a asignar:') !!}
                {!! Form::select('grupos[]', $grupos, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            </div>
            {!! Form::submit('Asignar', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection