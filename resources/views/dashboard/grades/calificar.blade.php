@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><small>Calificaciones del curso {{ $curso->nombre }} para el alumno</small> {{ $alumno->nombre }} {{ $alumno->apellidos }}</h4>
        </div>
        <div class="panel-body">
            {!! Form::open(array('url' => 'grades/alumno/'.$alumno->id.'/cursos/'.$curso->id, 'method' => 'put', 'class' => 'form-horizontal')) !!}

            @foreach($curso->competencies as $key => $competency)
                <div class="form-group">
                    {!! Form::label(camel_case($competency->name), $competency->name, ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        @if ($grades->where('competency_id', $competency->id)->first() === null)
                            {!! Form::number(camel_case($competency->name), null, ['class' => 'form-control']) !!}
                        @else
                            {!! Form::number(camel_case($competency->name), $grades->where('competency_id', $competency->id)->first()->grade, ['class' => 'form-control']) !!}
                        @endif
                    </div>
                </div>
            @endforeach
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit('Subir Calificaciones', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>


            {!! Form::close() !!}
        </div>
    </div>
@endsection