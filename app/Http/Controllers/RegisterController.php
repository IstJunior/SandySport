<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{

    public function getLogin(Request $request)
    {
        return view('connect.login');
    }

    public function getRegister(Request $request)
    {
        return view('connect.register');
    }

    public function postRegister(Request $request)
    {
        $rules = [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users', // Verifica si el email es único en la tabla users
            'password' => 'required|min:8', // Verifica que la contraseña tenga al menos 8 caracteres
            'password_confirmation' => 'required|same:password', // Verifica que la confirmación de contraseña sea igual a la contraseña
        ];

        // Crea un objeto Validator
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)->with('message', 'Se ha producido un error en el registro')->with('typealert', 'danger');
        } else {
            $user = new User();
            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password')); // Hashear la contraseña antes de guardarla

            if ($user->save()) {
                return redirect('/login')->with('message', 'Cuenta creada correctamente')->with('typealert', 'success');
            } else {
                return back()
                    ->with('message', 'Se ha producido un error al guardar el registro')->with('typealert', 'danger');
            }
        }
    }
}
