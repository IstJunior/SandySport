@extends('Admin.plantilla')
@section('title', 'Agregar producto')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/products') }}"><i class="fa-sharp fa-solid fa-boxes-stacked"></i>Productos</a>
    </li>

@endsection

@section('content')

    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title"><i class="fa-sharp fa-solid fa-boxes-stacked"></i>Productos</h2>
            </div>
            <div class="inside">
                {!! Form::open(['url' => 'admin/product/add', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre del producto</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="fa-sharp fa-solid fa-keyboard"></i>
                                    </span>
                                </div>
                                {!! Form::text('name', null, ['class' => 'form-control', 'aria-describedby' => 'basic-addon1']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="category">Categoría</label>
                            {{-- {!! Form::text('category', null, ['class' => 'form-control']) !!} --}}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="image">Imagen</label>
                        <div class="custom-file">
                            {!! Form::file('img', ['class' => 'custom-file-input', 'id' => 'customFile']) !!}
                            <label class="custom-file-label" for="customFile">Seleccionar</label>
                        </div>
                    </div>

                </div>
                <div class="row mtop16">
                    <div class="col-md-3">
                        <label for="price">Precio $</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-sharp fa-solid fa-keyboard"></i>
                                </span>
                            </div>
                            {!! Form::number('price', null, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="indiscount"> En Descuento $</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-sharp fa-solid fa-keyboard"></i>
                                </span>
                            </div>
                            {!! Form::select('indiscount', ['0' => 'No', '1' => 'Si'], 0, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="discount">Descuento $</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fa-sharp fa-solid fa-keyboard"></i>
                                </span>
                            </div>
                            {!! Form::number('discount', 0.0, ['class' => 'form-control', 'min' => '0.00', 'step' => 'any']) !!}
                        </div>
                    </div>
                </div>

                <div class="row mtop16">
                    <div class="col-md-12 ">
                        <label for="descripcion">Descripción</label>
                        {!! Form::textarea('content', null, ['class' => 'form-control custom-textarea', 'id' => 'editor']) !!}

                    </div>
                </div>

                <div class="row mtop16">
                    <div class="col-md-12">
                        {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
            <script>
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .catch(error => {
                        console.error('Error durante la inicialización de CKEditor', error);
                    });
            </script>
        @endsection
