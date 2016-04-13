@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ URL::to('alumnos') }}" class="btn btn-default btn-xs" role="button">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            {{ $alumno->nombre }} {{ $alumno->apellidos }}
            <a href="{{ URL::to('alumnos/' . $alumno->id.'/edit/') }}" class="btn btn-default btn-xs pull-right" role="button">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>
        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td class="col-md-2 text-right">ID:</td> <td class="col-md-10">{{ $alumno->id }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Nombre:</td> <td class="col-md-10">{{ $alumno->nombre }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Apellidos:</td> <td>{{ $alumno->apellidos }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Direccion:</td> <td>{{ $alumno->direccion }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Genero:</td> <td>{{ $alumno->genero }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Fecha de nacimiento:</td> <td>{{ $alumno->fecha_nacimiento }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Tel&eacute;fono:</td> <td>{{ $alumno->telefono }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">&iquest;Como nos conociste?:</td> <td>{{ $alumno->como_nos_conociste }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Nombre del tutor:</td> <td>{{ $alumno->nombre_del_tutor }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Numero de emergencia:</td> <td>{{ $alumno->num_emergencia }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Facebook:</td> <td>{{ $alumno->facebook }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Estado:</td> <td>{{ $alumno->estado }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Certificado de Secundaria:</td>
                    @if(!empty($alumno->certificado_secundaria))
                        <td>{{ link_to_route('document',"certificado_secundaria", ['file' => $alumno->certificado_secundaria]) }}</td>
                    @endif
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Acta de Nacimiento:</td>
                    @if(!empty($alumno->acta_de_nacimiento_path))
                        <td>{{ link_to_route('document',"acta_de_nacimiento", ['file' => $alumno->acta_de_nacimiento_path]) }}</td>
                    @endif
                </tr>
                <tr>
                    <td class="col-md-2 text-right">CURP:</td>
                    @if(!empty($alumno->curp))
                        <td>{{ link_to_route('document',"curp", ['file' => $alumno->curp]) }}</td>
                    @endif
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Comprobande de Domicilio:</td>
                    @if(!empty($alumno->comprobande_de_domicilio))
                        <td>{{ link_to_route('document',"comprobande_de_domicilio", ['file' => $alumno->comprobande_de_domicilio]) }}</td>
                    @endif
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Certificado Parcial:</td>
                    @if(!empty($alumno->certificado_parcial))
                        <td>{{ link_to_route('document',"certificado_parcial", ['file' => $alumno->certificado_parcial]) }}</td>
                    @endif
                </tr>

            </table>

        </div>
    </div>
@endsection