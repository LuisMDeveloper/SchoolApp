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

            //2016-05-23T
            var lunes = moment().startOf('isoweek');
            var lunes_str = moment().startOf('isoweek').format("YYYY-MM-DDT");
            var martes = lunes.add(1, 'day');
            var martes_str = martes.format("YYYY-MM-DDT");
            var miercoles = martes.add(1, 'day');
            var miercoles_str = miercoles.format("YYYY-MM-DDT");
            var jueves = miercoles.add(1, 'day');
            var jueves_str = jueves.format("YYYY-MM-DDT");
            var viernes = jueves.add(1, 'day');
            var viernes_str = viernes.format("YYYY-MM-DDT");
            var sabado = viernes.add(1, 'day');
            var sabado_str = sabado.format("YYYY-MM-DDT");
            var domingo = sabado.add(1, 'day');
            var domingo_str = domingo.format("YYYY-MM-DDT");

            var lunes_start = lunes_str + lunes_de;
            var lunes_end = lunes_str + lunes_a;
            console.log(lunes_start);
            console.log(lunes_end);

            var martes_start = martes_str + martes_de;
            var martes_end = martes_str + martes_a;

            var miercoles_start = miercoles_str + miercoles_de;
            var miercoles_end = miercoles_str + miercoles_a;

            var jueves_start = jueves_str + jueves_de;
            var jueves_end = jueves_str + jueves_a;

            var viernes_start = viernes_str + viernes_de;
            var viernes_end = viernes_str + viernes_a;

            //if ($curso->lunes_de != '00:00:00') {
            //    $lunes_time_yes = 'true';
            //}

            var events = [];

            if (lunes_de != '00:00:00') {
                events.push({
                    title: 'Lunes',
                    start: lunes_start,
                    end: lunes_end
                });
            }

            if (martes_de != '00:00:00') {
                events.push({
                    title: 'Martes',
                    start: martes_start,
                    end: martes_end
                });
            }

            if (miercoles_de != '00:00:00') {
                events.push({
                    title: 'Miercoles',
                    start: miercoles_start,
                    end: miercoles_end
                });
            }

            if (jueves_de != '00:00:00') {
                events.push({
                    title: 'Jueves',
                    start: jueves_start,
                    end: jueves_end
                });
            }

            if (viernes_de != '00:00:00') {
                events.push({
                    title: 'Viernes',
                    start: viernes_start,
                    end: viernes_end
                });
            }

            $('#calendar').fullCalendar({
                allDaySlot: false,
                header: false,
                defaultView: 'agendaWeek',
                events: events,
                views: {
                    week: {
                        // options apply to basicWeek and agendaWeek views
                        columnFormat: 'dddd'
                    }
                }
            })

        });

    </script>
@endsection