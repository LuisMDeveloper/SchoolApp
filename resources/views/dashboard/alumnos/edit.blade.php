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
            <a href="{{ URL::to('alumnos') }}" class="btn btn-default btn-xs" role="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            Modificar Registro
        </div>
        <div class="panel-body">
            {!! Form::model($alumno, array('route' => array('alumnos.update', $alumno->id), 'method' => 'PUT', 'files' => true)) !!}

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

            <div class="form-group">
                {!! Form::label('nombre_del_tutor', 'Nombre del tutor:') !!}
                {!! Form::text('nombre_del_tutor', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('num_emergencia', 'Numero de emergencia:') !!}
                {!! Form::text('num_emergencia', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('facebook', 'Facebook:') !!}
                {!! Form::text('facebook', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('como_nos_conociste', 'Como nos conociste?:') !!}
                {!! Form::textarea('como_nos_conociste', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('estado', 'Estado:') !!}
                {!! Form::select('estado', array('alta' => 'alta',
                                                'baja temporal' => 'baja temporal',
                                                'baja por egreso' => 'baja por egreso',
                                                'baja definitiva' => 'baja definitiva'),
                null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('certificado_secundaria', 'Certificado de Secundaria:') !!}
                {!! Form::file('certificado_secundaria', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('acta_de_nacimiento_path', 'Acta de Nacimiento:') !!}
                {!! Form::file('acta_de_nacimiento_path', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('curp', 'CURP:') !!}
                {!! Form::file('curp', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('comprobande_de_domicilio', 'Comprobande de Domicilio:') !!}
                {!! Form::file('comprobande_de_domicilio', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('certificado_parcial', 'Certificado Parcial:') !!}
                {!! Form::file('certificado_parcial', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Dar de alta', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection