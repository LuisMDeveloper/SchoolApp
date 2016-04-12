@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ URL::to('grupos') }}" class="btn btn-default btn-xs" role="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            Asignar alumnos a grupo <strong>{{ $grupo->nombre }}</strong>
        </div>
        <div class="panel-body">
            <div class="page-header">
                <h1><small>Asignacion masiva</small></h1>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Aleatoriamente
                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                            El grupo sera llenado de forma aleatoria con los alumnos que no tengan un grupo asignado respetando el limite del grupo.
                        </div>
                    </div>
                    <a class="btn btn-primary pull-right" href="{{ URL::to('grupos/random/'. $grupo->id) }}" role="button">
                        Asignar
                    </a>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    Alfabeticamente
                </div>
                <div class="panel-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                            El grupo sera llenado de forma alfabetica con los alumnos que no tengan un grupo asignado respetando el limite del grupo.
                        </div>
                    </div>
                    <a class="btn btn-primary pull-right" href="{{ URL::to('grupos/alfa/'. $grupo->id) }}" role="button">
                        Asignar
                    </a>
                </div>
            </div>

            <div class="page-header">
                <h1><small>Asignacion manual</small></h1>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                    Seleccione de los alumnos que no tienen un grupo asignado y asignelos al grupo actual.
                </div>
            </div>
            {!! Form::open(array('url' => 'grupos/manual/'. $grupo->id, 'method' => 'put')) !!}

            <div class="form-group">
                {!! Form::label('alumnos[]', 'Alumnos a asignar:') !!}
                {!! Form::select('alumnos[]', $alumnos, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
            </div>
            {!! Form::submit('Asignar', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}

        </div>
    </div>
@endsection