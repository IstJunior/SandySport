@extends('Admin.plantilla')
@section('title', 'Products')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/products')}}"><i class="fa-sharp fa-solid fa-boxes-stacked"></i>Productos</a>
    </li>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="panel shadow">
            <div class="header">
                <h2 class="title"><i class="fa-sharp fa-solid fa-boxes-stacked"></i>Productos</h2>
            </div>
            <div class="inside">
                <div class="btns">
                    <a href="{{url('admin/product/add')}}"><i class="fa-sharp fa-solid fa-plus btn btn-primary"></i>Agregar Producto</a>
                </div>
                <table class="table">
                    
                </table>
            </div>
        </div>
    </div>
@endsection