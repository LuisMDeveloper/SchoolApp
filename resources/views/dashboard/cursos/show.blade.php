@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ URL::to('cursos') }}" class="btn btn-default btn-xs" role="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            {{ $curso->nombre }} {{ $curso->apellidos }}
            <a href="{{ URL::to('cursos/' . $curso->id.'/edit/') }}" class="btn btn-default btn-xs pull-right" role="button">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td class="col-md-2 text-right">ID:</td> <td class="col-md-10">{{ $curso->id }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Nombre:</td> <td class="col-md-10">{{ $curso->nombre }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">fecha_inicio:</td> <td>{{ $curso->fecha_inicio }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">fecha_fin:</td> <td>{{ $curso->fecha_fin }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">materia:</td> <td>{{ $curso->materia->nombre }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">maestro:</td> <td>{{ $curso->maestro->nombre }} {{ $curso->maestro->apellidos }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">descripcion:</td> <td>{{ $curso->descripcion }}</td>
                </tr>
            </table>

            <div id='calendar'></div>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            // page is now ready, initialize the calendar...

            var lunes_start = '2016-05-16T'+lunes_de;
            var lunes_end = '2016-05-16T'+lunes_a;
            console.log(lunes_start);
            console.log(lunes_end);

            var martes_start = '2016-05-17T'+martes_de;
            var martes_end = '2016-05-17T'+martes_a;
            var miercoles_start = '2016-05-18T'+miercoles_de;
            var miercoles_end = '2016-05-18T'+miercoles_a;
            var jueves_start = '2016-05-19T'+jueves_de;
            var jueves_end = '2016-05-19T'+jueves_a;
            var viernes_start = '2016-05-20T'+viernes_de;
            var viernes_end = '2016-05-20T'+viernes_a;

            $('#calendar').fullCalendar({
                defaultView: 'agendaWeek',
                events: [
                    {
                        title: 'Lunes',
                        start: lunes_start,
                        end: lunes_end
                    },
                    {
                        title: 'Martes',
                        start: martes_start,
                        end: martes_end
                    },
                    {
                        title: 'Miercoles',
                        start: miercoles_start,
                        end: miercoles_end
                    },
                    {
                        title: 'Jueves',
                        start: jueves_start,
                        end: jueves_end
                    },
                    {
                        title: 'Viernes',
                        start: viernes_start,
                        end: viernes_end
                    }
                ]
            })

        });

    </script>
@endsection