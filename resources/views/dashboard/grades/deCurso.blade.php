@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            Calificaciones del curso {{ $curso->nombre }}
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
                                @foreach($competencies as $key => $competency)
                                    <th class="success">{{$competency->name}}</th>
                                @endforeach
                                <th class="info">Promedio</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($grupo->alumnos as $key => $alumno)
                                <tr class="{{ str_contains($alumno->estado, 'baja') ? 'danger': '' }}">
                                    <td>{{ $alumno->id }}</td>
                                    <td><a href="{{ URL::to('alumnos/' . $alumno->id) }}">{{ $alumno->nombre }}</a></td>
                                    <td>{{ $alumno->apellidos }}</td>
                                    @foreach($competencies as $key => $competency)
                                        @if ($alumno->grades->where('competency_id', $competency->id)->first() === null)
                                            <td></td>
                                        @else
                                            <td>{{ $alumno->grades->where('competency_id', $competency->id)->first()->grade }}</td>
                                        @endif

                                    @endforeach
                                    @if ($alumno->grades->isEmpty())
                                        <td></td>
                                    @else
                                        <td>{{ $alumno->grades->whereIn('competency_id', $competencies->lists('id')->toArray())->avg('grade') }}</td>
                                    @endif

                                    <td>
                                        <a class="btn btn-xs btn-primary" href="{{ URL::to('grades/alumno/'.$alumno->id.'/cursos/' . $curso->id) }}" role="button">Calificar</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection