@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><small>Asistencia del curso {{ $curso->nombre }} para el alumno</small> {{ $alumno->nombre }} {{ $alumno->apellidos }}</h4>
        </div>
        <div class="panel-body">
            {!! Form::open(array('url' => 'attendance/alumno/'.$alumno->id.'/cursos/'.$curso->id, 'method' => 'put', 'class' => 'form-horizontal')) !!}

            @foreach($dates as $key => $date)
                <div class="form-group">
                    {!! Form::label('date_'.$date->toDateString(), $date->toDateString(), ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {{ Form::hidden('hidden_'.$date->toDateString(), $date->toDateString()) }}
                        {{ Form::checkbox('date_'.$date->toDateString(), $date->toDateString(), !($attendances->where('fecha', $date->toDateString())->isEmpty())) }}
                    </div>
                </div>
            @endforeach
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit('Subir Asistencia', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>


            {!! Form::close() !!}
        </div>
    </div>
@endsection