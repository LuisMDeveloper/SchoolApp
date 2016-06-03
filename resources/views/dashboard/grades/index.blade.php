@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            Cursos
        </div>
        <div class="panel-body">
            @foreach($cursos as $key => $curso)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>{{ $curso->nombre }} <small>{{$curso->materia->nombre}}</small></h4>
                        Inicio: {{ $curso->fecha_inicio }}<br>
                        Fin: {{ $curso->fecha_fin }}
                    </div>
                    <div class="panel-footer">
                        {{ $curso->maestro->nombre }} {{ $curso->maestro->apellidos }}
                        <a class="btn btn-xs btn-primary pull-right" href="{{ URL::to('grades/curso/' . $curso->id) }}" role="button">Calificaciones</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection