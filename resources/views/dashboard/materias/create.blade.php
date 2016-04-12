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
            <a href="{{ URL::to('materias') }}" class="btn btn-default btn-xs" role="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            Dar de alta materia
        </div>
        <div class="panel-body">
            {!! Form::open(array('url' => 'materias')) !!}

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
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