@extends('Admin.plantilla')

@section('title', 'Editar Categoría')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/categories') }}"><i class="fa-sharp fa-solid fa-tags"></i>Categorías</a>
    </li>
    <li class="breadcrumb-item active">Editar Categoría</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="panel shadow">
                    <div class="header">
                        <h2 class="title"><i class="fa-sharp fa-solid fa-tags"></i>Editar Categoría</h2>
                    </div>
                    <div class="inside">
                        {!! Form::open(['url' => '/admin/category/' . $category->id . '/edit', 'method' => 'PUT']) !!}
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Nombre Categoría</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa-sharp fa-solid fa-keyboard"></i>
                                    </span>
                                </div>
                                {!! Form::text('name', $category->name, ['class' => 'form-control', 'aria-describedby' => 'basic-addon1']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="module" class="mtop16">Módulo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa-sharp fa-solid fa-keyboard"></i>
                                    </span>
                                </div>
                                {!! Form::select('module', getModuleOptions(), $category->module, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Seleccione un módulo',
                                ]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="icon" class="mtop16">Icono</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa-sharp fa-solid fa-keyboard"></i>
                                    </span>
                                </div>
                                {!! Form::text('icon', $category->icon, ['class' => 'form-control', 'aria-describedby' => 'basic-addon1']) !!}
                            </div>
                        </div>

                        <div class="row mtop16">
                            <div class="col-md-12">
                                {!! Form::submit('Guardar cambios', ['class' => 'btn btn-success']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
