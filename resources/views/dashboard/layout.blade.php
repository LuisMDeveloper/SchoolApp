@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Library</a></li>
                    <li class="active">Data</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Panel de Control</div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li role="presentation" class="{{ Request::is('home') ? 'active' : '' }}"><a href="{{ URL::to('home') }}">Home</a></li>
                            <li role="presentation" class="{{ Request::is('usuarios') ? 'active' : '' }}"><a href="{{ URL::to('usuarios') }}">Usuarios <span class="badge pull-right">{{$usersCount}}</span></a></li>
                            <li role="presentation" class="{{ Request::is('alumnos') ? 'active' : '' }}"><a href="{{ URL::to('alumnos') }}">Alumnos <span class="badge pull-right">{{$alumnosCount}}</span></a></li>
                            <li role="presentation" class="{{ Request::is('grupos') ? 'active' : '' }}"><a href="{{ URL::to('grupos') }}">Grupos <span class="badge pull-right">{{$gruposCount}}</span></a></li>
                            <li role="presentation" class="{{ Request::is('materias') ? 'active' : '' }}"><a href="{{ URL::to('materias') }}">Materias <span class="badge pull-right">{{$materiasCount}}</span></a></li>
                            <li role="presentation" class="{{ Request::is('maestros') ? 'active' : '' }}"><a href="{{ URL::to('maestros') }}">Maestros <span class="badge pull-right">{{$maestrosCount}}</span></a></li>
                            <li role="presentation" class="{{ Request::is('cursos') ? 'active' : '' }}"><a href="{{ URL::to('cursos') }}">Cursos <span class="badge pull-right">{{$cursosCount}}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @yield('content-panel')
            </div>
        </div>
    </div>
@endsection
