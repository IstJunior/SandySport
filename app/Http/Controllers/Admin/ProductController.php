<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
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
        $category = Category::where
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
