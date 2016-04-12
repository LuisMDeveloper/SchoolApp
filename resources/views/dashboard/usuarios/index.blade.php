@extends('dashboard.layout')

@section('content-panel')
    <div class="panel panel-default">
        <div class="panel-heading">Usuarios</div>

        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Tipo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ URL::to('usuarios/' . $user->id) }}">{{ $user->name }}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->loggable_type }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <a class="btn btn-primary" href="{{ URL::to('usuarios/create') }}" role="button">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Crear Usuario
            </a>
        </div>
    </div>
@endsection