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
            <a href="{{ URL::to('maestros') }}" class="btn btn-default btn-xs" role="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            Modificar Registro
        </div>
        <div class="panel-body">
            {!! Form::model($maestro, array('route' => array('maestros.update', $maestro->id), 'method' => 'PUT')) !!}

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('apellidos', 'Apellidos:') !!}
                {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('direccion', 'Direccion:') !!}
                {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('genero', 'Genero:') !!}
                {!! Form::select('genero', array('Masculino' => 'Masculino', 'Femenino' => 'Femenino'),null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento:') !!}
                {!! Form::date('fecha_nacimiento', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('telefono', 'Numero de telefono:') !!}
                {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection