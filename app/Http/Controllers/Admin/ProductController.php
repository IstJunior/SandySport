<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('IsAdmin');
    }

    public function getHome()
    {
        return view('Admin.products.home');
    }

    public function getProductAdd(Request $request)
    {
        return view('Admin.products.add');
    }

    public function edit($id)
    {
        // Lógica para editar un producto
    }

    public function destroy($id)
    {
        // Lógica para eliminar un producto
    }
}
