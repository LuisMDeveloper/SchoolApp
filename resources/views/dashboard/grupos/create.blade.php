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
            <a href="{{ URL::to('grupos') }}" class="btn btn-default btn-xs" role="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            Crear grupo
        </div>
        <div class="panel-body">
            {!! Form::open(array('url' => 'grupos')) !!}

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('limite', 'Limite:') !!}
                {!! Form::number('limite', null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Crear', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection