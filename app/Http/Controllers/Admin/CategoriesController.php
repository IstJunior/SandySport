<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('IsAdmin');
    }

    public function getHome($module)
    {
        $categorias = Category::where('module', $module)->orderBy('name', 'Asc')->get();
        $data = ['cate' => $categorias];
        return view('admin.categories.home', $data);
    }


    public function postCategoryAdd(Request $request)
    {

        // Validaciones
        $rules = [
            'name' => 'required|min:3|max:20',
            'module' => 'required',
            'icon' => 'required',
        ];

        $messages = [
            'name.required' => 'El nombre de la categoría es obligatorio.',
            'module.required' => 'Seleccione un módulo.',
            'icon.required' => 'El campo de icono es obligatorio.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/admin/categories/home')
                ->withErrors($validator)
                ->withInput()
                ->with('typealert', 'danger');
        }

        // Guardar la nueva categoría
        $category = new Category;
        $category->name = $request->input('name');
        $category->module = $request->input('module');
        $category->slug = Str::slug($request->input('name'));
        $category->icon = e($request->input('icon'));

        if ($category->save()) {
            return back()
                ->with('message', 'La categoría se ha agregado correctamente')
                ->with('typealert', 'success');
        } else {
            return back()
                ->with('message', 'Ha habido un error')
                ->with('typealert', 'danger');
        }
    }


    public function getEditCategory($id)
    {
        // Obtén la categoría por su ID
        $category = Category::find($id);

        // Verifica si la categoría existe
        if (!$category) {
            return redirect('/admin/categories/home')
                ->with('message', 'La categoría no existe')
                ->with('typealert', 'danger');
        }

        // Renderiza la vista de edición con la categoría
        return view('admin.categories.edit', ['category' => $category]);
    }
    public function postEditCategory(Request $request, $id)
    {
        $rules = [
            'name' => 'required|min:3|max:20',
            'module' => 'required',
            'icon' => 'required'
        ];
        $message = [
            'name.required' => 'El nombre es obligatorio',
            'module.required' => 'El módulo es obligatorio',
            'icon.required' => 'El icono es obligatorio'
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return back()->withErrors($validator)->with('message', 'Error en el formulario')->with('typealert', 'danger');
        } else {
            $c = Category::find($id);
            $c->name = e($request->input('name'));
            $c->module = e($request->input('module'));
            $c->icon = e($request->input('icon'));

            if ($c->save()) {
                return back()->with('message', 'Se ha editado correctamente')->with('typealert', 'success');
            } else {
                return back()->with('message', 'Hubo un problema al editar la categoría')->with('typealert', 'danger');
            }
        }
    }


    public function getDeleteCategory($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect('/admin/categories/home')
                ->with('message', 'La categoría no existe')
                ->with('typealert', 'danger');
        }

        // Elimina la categoría
        $category->delete();

        return redirect('/admin/categories/' . $id)
            ->with('message', 'La categoría se ha eliminado correctamente')
            ->with('typealert', 'success');
    }
}
