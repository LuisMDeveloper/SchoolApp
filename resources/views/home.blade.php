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
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido!</div>

                <div class="panel-body">
                    <p>This site is a plain, unconfigured installation of the latest stable version of Moodle.</p>
                    <p>Use one of the following demo accounts to log in and play with it:</p>
                    <ul>
                        <li>admin / sandbox</li>
                        <li>manager / sandbox</li>
                        <li>teacher / sandbox</li>
                        <li>student / sandbox</li>
                    </ul>
                    <p>The site is reset to its blank state every hour, on the hour.</p>
                    <p>To see a more interesting demo site with more realistic content, visit: Mount Orange School.</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Cursos</div>

                <div class="panel-body">
                    Bienvenido Alumno, Maestro o Administrador
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
