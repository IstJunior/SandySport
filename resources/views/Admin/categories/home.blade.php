@extends('Admin.plantilla')
@section('title', 'Categorias')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/categories') }}"><i class="fa-sharp fa-solid fa-tags"></i>Categorías</a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fa-sharp fa-solid fa-tags"></i>Agregar categorias</h2>
                    </div>
                    <div class="inside">
                        {!! Form::open(['url' => '/admin/category/add']) !!}
                        <label for="name">Nombre Categoria</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-sharp fa-solid fa-keyboard"></i>
                                </span>
                            </div>
                            {!! Form::text('name', null, ['class' => 'form-control', 'aria-describedby' => 'basic-addon1']) !!}
                        </div>

                        <label for="module" class="mtop16">Módulo</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-sharp fa-solid fa-keyboard"></i>
                                </span>
                            </div>
                            {{-- Incluir el campo de selección para el módulo --}}
                            {!! Form::select('module', getModuleOptions(), null, [
                                'class' => 'form-control',
                                'placeholder' => 'Seleccione un módulo',
                            ]) !!}
                        </div>

                        <label for="icon" class="mtop16">Icono</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-sharp fa-solid fa-keyboard"></i>
                                </span>
                            </div>
                            {{-- Incluir el campo para el icono --}}
                            {!! Form::text('icon', null, ['class' => 'form-control', 'aria-describedby' => 'basic-addon1']) !!}
                        </div>

                        <div class="row mtop16">
                            <div class="col-md-12">
                                {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fa-sharp fa-solid fa-tags"></i>Categorias</h2>
                    </div>
                    <div class="inside">
                        <nav class="nav nav-pills nav-fill">
                            @foreach (getModuleOptions() as $m => $k)
                                <a href="{{ url('/admin/categories/' . $m) }}" class="nav-link">
                                    {{ $k }}
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            @endforeach
                        </nav>

                        <table class="table mtop16">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Nombre</td>
                                    <td>Module</td>
                                    <td>Icono</td>
                                    <td>Acciones</td> <!-- Nueva columna para acciones -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cate as $categoria)
                                    <tr>
                                        <td>{{ $categoria->id }}</td>
                                        <td>{{ $categoria->name }}</td>
                                        <td>{{ $categoria->module }}</td>
                                        <td>{!! htmlspecialchars_decode($categoria->icon) !!}</td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit', ['id' => $categoria->id]) }}"
                                                class="btn btn-primary btn-sm">Editar</a>
                                            <a href="{{ route('admin.categories.delete', ['id' => $categoria->id]) }}"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('¿Estás seguro?')">Eliminar</a>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>

        </div>
    @endsection
