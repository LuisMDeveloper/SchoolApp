@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">Usuarios</div>

        <div class="panel-body">
            <table class="table">
                <tr>
                    <td class="col-md-2 text-right">ID:</td> <td class="col-md-10">{{ $user->id }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Nombre:</td> <td class="col-md-10">{{ $user->name }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Email:</td> <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td class="col-md-2 text-right">Tipo:</td> <td>{{ $user->loggable_type }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection