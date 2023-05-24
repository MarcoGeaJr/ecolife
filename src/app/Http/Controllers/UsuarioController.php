<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = User::all()->toArray();

        return view('usuarios.index', [
            "usuarios" => $usuarios
        ]);
    }

    public function novo(){
        return view('usuarios.cadastrar');
    }

    public function cadastrar(Request $data){
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return redirect('/usuarios');
    }

    public function excluir($id){
        $usuario = User::find($id);

        $usuario->delete();

        return redirect('/usuarios');
    }
}