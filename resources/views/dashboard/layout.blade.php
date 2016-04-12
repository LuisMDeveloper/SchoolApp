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
                            <li role="presentation" class="{{ Request::is('usuarios') ? 'active' : '' }}"><a href="{{ URL::to('usuarios') }}">Usuarios <span class="badge">{{$usersCount}}</span></a></li>
                            <li role="presentation" class="{{ Request::is('alumnos') ? 'active' : '' }}"><a href="{{ URL::to('alumnos') }}">Alumnos</a></li>
                            <li role="presentation"><a href="#">Messages</a></li>
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
