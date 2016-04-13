@extends('dashboard.layout')

@section('content-panel')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ URL::to('cursos') }}" class="btn btn-default btn-xs" role="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            Editar curso
        </div>
        <div class="panel-body">
            {!! Form::model($curso, array('route' => array('cursos.update', $curso->id), 'method' => 'PUT')) !!}

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('fecha_inicio', 'Fecha de Inicio:') !!}
                {!! Form::date('fecha_inicio', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('fecha_fin', 'Fecha de Fin:') !!}
                {!! Form::date('fecha_fin', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::Label('materia_id', 'Materia:') !!}
                {!! Form::select('materia_id', $materias, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::Label('maestro_id', 'Maestro:') !!}
                {!! Form::select('maestro_id', $maestros, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('descripcion', 'Descripcion:') !!}
                {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Dar de alta', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection