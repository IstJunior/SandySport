<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('IsAdmin');
    }

    public function getUsers(){
        $users = User::orderBy('id', 'asc')->get();
        $data = ['users' => $users];
        return view('Admin.users.home', $data);
    }
    public function getId(){

    }
}
