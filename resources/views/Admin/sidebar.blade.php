<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{ url('static/images/logo.png')}}" class="img-fluid" alt="">
        </div>
        <div class="user">
            <span class="subtitle">Hola: </span>
            <div class="name">
                {{ Auth::user()->name}} {{Auth::user()->last_name }}
                <a href="{{url('/logout')}}" data-toggle="tooltip" data-placement="top" title="Salir">
                    <i class="fa-sharp fa-solid fa-door-open"></i>
                </a>
            </div>
            <div class="email">{{ Auth::user()->email }}</div>
        </div>
    </div>
    <div class="main">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin')}}"><i class="fa-sharp fa-solid fa-house"></i>Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/products')}}"><i class="fa-sharp fa-solid fa-boxes-stacked"></i>Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/categories/1')}}"><i class="fa-sharp fa-solid fa-tags"></i>Categorías</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin/users')}}"><i class="fa-sharp fa-solid fa-users"></i>Usuarios</a>
            </li>
        </ul>
    </div>
</div>
