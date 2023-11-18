@extends('Admin.plantilla')
@section('title', 'Usuarios')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/users') }}"><i class="fa-sharp fa-solid fa-users"></i>Usuarios</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title"><i class="fa-sharp fa-solid fa-users"></i>Usuarios</h2>
            </div>
            <div class="inside">
                <table class="table">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Email</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="opts">
                                    <a href="{{ url('/admin/user/' . $user->id . '/edit') }}">
                                        <i class="fa-regular fa-pen-to-square" data-toggle="tooltip" data-placement="top" title="Editar"></i>
                                    
                                        <a href="{{ url('/admin/user/' . $user->id . '/delete') }}">
                                            <i class="fa-sharp fa-regular fa-trash-can" data-toggle="tooltip" data-placement="top" title="Eliminar"></i>
                                        </a>
                                    </div>
                                </td>
                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
