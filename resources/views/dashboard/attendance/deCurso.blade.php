@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            Asistencia del curso {{ $curso->nombre }}
        </div>
        <div class="panel-body">
            @foreach($grupos as $key => $grupo)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$grupo->nombre}}</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                @foreach($dates as $key => $date)
                                    <th class="success" style="white-space: nowrap; font-size: 10px;" >{{ $date->format('m-d') }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($grupo->alumnos as $key => $alumno)
                                <tr class="{{ str_contains($alumno->estado, 'baja') ? 'danger': '' }}">
                                    <td>{{ $alumno->id }}</td>
                                    <td><a href="{{ URL::to('alumnos/' . $alumno->id) }}">{{ $alumno->nombre }}</a></td>
                                    <td>{{ $alumno->apellidos }}</td>
                                    @foreach($dates as $key => $date)
                                        <td><input type="checkbox" name="animal" value="{{ $date->toDateString() }}" {{ !($attendances->where('alumno_id', $alumno->id)->where('fecha', $date->toDateString())->isEmpty()) ? 'checked': '' }}/></td>
                                    @endforeach
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ URL::to('attendance/alumno/'.$alumno->id.'/cursos/' . $curso->id) }}" role="button">Modificar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer"><span>{{$curso->fecha_inicio}}</span><span class="pull-right">{{$curso->fecha_inicio}}</span></div>
                </div>
            @endforeach
        </div>
    </div>
@endsection