@extends('connect.plantilla')

@section('title', 'Login')
@section('content')

    <div class="box box_login shadow">
        <div class="header">
            <a href=""><img src="{{url('/static/images/logo.png')}}" alt=""></a>
        </div>
        <div class="inside">
        {!! Form::open(['url' => '/login']) !!}
        <label for="email">Correo Electronico</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fa-solid fa-envelope"></i></div>
            </div>
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </div>
        <label class="mtop16" for="password">Contraseña</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <i class="fa-solid fa-lock"></i></div>
            </div>
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Ingresar', ['class' => 'btn btn-success mtop16']) !!}
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
            <a href="{{url('/register')}}">¿No tiene una cuenta? Registrese </a>
            <a href="{{url('/recover')}}">Olvide Contraseña</a>
        </div>
        </div>
    </div>
@stop
