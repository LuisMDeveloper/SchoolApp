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
            <a href="{{ URL::to('cursos') }}" class="btn btn-default btn-xs" role="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            Dar de alta curso
        </div>
        <div class="panel-body">
            {!! Form::open(array('url' => 'cursos')) !!}

            <div class="form-group">
                {!! Form::label('nombre', 'Nombre:') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('fecha_inicio', 'Fecha de Inicio:') !!}
                {!! Form::date('fecha_inicio', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('fecha_fin', 'Fecha de Fin:') !!}
                {!! Form::date('fecha_fin', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::Label('materia_id', 'Materia:') !!}
                {!! Form::select('materia_id', $materias, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::Label('maestro_id', 'Maestro:') !!}
                {!! Form::select('maestro_id', $maestros, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('descripcion', 'Descripcion:') !!}
                {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Lunes') !!}
                {!! Form::checkbox('lunes_time_yes', 'true') !!}
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::label('lunes_time_de', 'De:') !!}
                        {!! Form::input('time', 'lunes_time_de', date('07:00'), ['class' => 'form-control', 'step' => '1800']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('lunes_time_a', 'A:') !!}
                        {!! Form::input('time', 'lunes_time_a', date('07:00'), ['class' => 'form-control', 'step' => '1800']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Martes') !!}
                {!! Form::checkbox('martes_time_yes', 'true') !!}
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::label('martes_time_de', 'De:') !!}
                        {!! Form::input('time', 'martes_time_de', date('07:00'), ['class' => 'form-control', 'step' => '1800']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('martes_time_a', 'A:') !!}
                        {!! Form::input('time', 'martes_time_a', date('07:00'), ['class' => 'form-control', 'step' => '1800']) !!}
                    </div>
                </div>


            </div>

            <div class="form-group">
                {!! Form::label('Miercoles') !!}
                {!! Form::checkbox('miercoles_time_yes', 'true') !!}
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::label('miercoles_time_de', 'De:') !!}
                        {!! Form::input('time', 'miercoles_time_de', date('07:00'), ['class' => 'form-control', 'step' => '1800']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('miercoles_time_a', 'A:') !!}
                        {!! Form::input('time', 'miercoles_time_a', date('07:00'), ['class' => 'form-control', 'step' => '1800']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Jueves') !!}
                {!! Form::checkbox('jueves_time_yes', 'true') !!}
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::label('jueves_time_de', 'De:') !!}
                        {!! Form::input('time', 'jueves_time_de', date('07:00'), ['class' => 'form-control', 'step' => '1800']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('jueves_time_a', 'A:') !!}
                        {!! Form::input('time', 'jueves_time_a', date('07:00'), ['class' => 'form-control', 'step' => '1800']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('Viernes') !!}
                {!! Form::checkbox('viernes_time_yes', 'true') !!}
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Form::label('viernes_time_de', 'De:') !!}
                        {!! Form::input('time', 'viernes_time_de', date('07:00'), ['class' => 'form-control', 'step' => '1800']) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::label('viernes_time_a', 'A:') !!}
                        {!! Form::input('time', 'viernes_time_a', date('07:00'), ['class' => 'form-control', 'step' => '1800']) !!}
                    </div>
                </div>
            </div>


            {!! Form::submit('Dar de alta', ['class' => 'btn btn-primary pull-right']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection