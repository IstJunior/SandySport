<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ConnectController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['getLogout']);
    }
    public function getLogin(Request $request)
    {
        return view('connect.login');
    }

    public function getRegister(Request $request)
    {
        return view('connect.register');
    }
    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Si las credenciales son válidas, el usuario ha iniciado sesión con éxito
            return redirect('/');
        } else {
            // Si las credenciales no son válidas, muestra un mensaje de error
            return redirect('/login')
                ->with('message', 'El email o la contraseña son incorrectos.')
                ->with('typealert', 'danger');
        }
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

    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }
}
