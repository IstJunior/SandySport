<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{ url('static/images/logo.png')}}" class="img-fluid" alt="">
        </div>
        <div class="user">
            <spam class="subtitle">Hola: </spam>
            <div class="name">
                {{ Auth::user()->name}} {{Auth::user()->last_name }}
                <a href="{{url('/logout')}}"><i class="fa-sharp fa-solid fa-door-open" data-toggle="tooltip" data-placement="top" title="Salir"></i>
                </a>
            </div>
            <div class="email">{{ Auth::user()->email }}</div>
        </div>
    </div>
    <div class="main">
        <ul>
            <li>
                <a href="{{ url('/admin')}}"><i class="fa-sharp fa-solid fa-house"></i>Dashboard</a>
            </li>
            <li>
                <a href="{{ url('/admin/products')}}"><i class="fa-sharp fa-solid fa-boxes-stacked"></i></i>Productos</a>
            </li>
            <li>
                <a href="{{ url('/admin/users')}}"><i class="fa-sharp fa-solid fa-users"></i>Usuarios</a>
            </li>
        </ul>
    </div>
</div>