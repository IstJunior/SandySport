@extends('connect.plantilla')

@section('title', 'Register')
@section('content')

    <div class="box box_register shadow">
        <div class="header">
            <a href=""><img src="{{ url('/static/images/logo.png') }}" alt=""></a>
        </div>
        <div class="inside">
            {!! Form::open(['url' => '/register']) !!}

            <label for="name">Nombre</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <label for="last_name" class="mtop16">Apellidos</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
                {!! Form::text('last_name', null, ['class' => 'form-control', 'required' => true]) !!}
            </div>

            <label for="email" class="mtop16">Correo Electrónico</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                </div>
                {!! Form::email('email', null, ['class' => 'form-control', 'required' => true]) !!}
            </div>

            {{-- <label for="documento" class="mtop16">Documento</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa-solid fa-id-card"></i>
                    </div>
                </div>
                {!! Form::text('documento', null, ['class' => 'form-control', 'required' => true, 'pattern' => '\d{7,}']) !!}
            </div> --}}

            <label for="password" class="mtop16">Contraseña</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                </div>
                {!! Form::password('password', ['class' => 'form-control', 'required' => true]) !!}
            </div>

            <label for="password_confirmation" class="mtop16">Confirmar Contraseña</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                </div>
                {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => true]) !!}
            </div>

            {!! Form::submit('Registrarse', ['class' => 'btn btn-success mtop16']) !!}
            {!! Form::close() !!}

            @if (Session::has('message'))
                <div class="container mtop16">
                    <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
                        {{ Session::get('message') }}
                        @if ($errors->any())
                            <ul>
                                @foreach ($errors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <script>
                            $('.alert').slideDown();
                            setTimeout(function() {
                                $('.alert').slideUp();
                            }, 100000);
                        </script>
                    </div>
                </div>

            @endif
            <div class="footer mtop16">
                <a href="{{ url('/login') }}">¿Ya tienes una cuenta? Ingresa</a>
                <a href="{{ url('/recover') }}">Olvidé Contraseña</a>
            </div>
        </div>
    </div>



@stop
