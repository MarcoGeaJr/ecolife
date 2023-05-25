<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $clientes = Cliente::all();

        return view('clientes.index', [
            "clientes" => $clientes
        ]);
    }

    public function novo(){
        return view('clientes.cadastrar');
    }

    public function editar($id){
        $cliente = Cliente::find($id);

        return view('clientes.alterar', [
            "cliente" => $cliente
        ]);
    }

    public function cadastrar(Request $dados){
        $cliente = new Cliente;

        $cliente->nomeRazao = $dados->input('nomeRazao');
        $cliente->apelidoFantasia = $dados->input('apelidoFantasia');
        $cliente->cpfCnpj = $dados->input('cpfCnpj');
        $cliente->email = $dados->input('email');
        $cliente->telefone = $dados->input('telefone');
        $cliente->cep = $dados->input('cep');

        $cliente->save();

        return redirect('clientes');
    }

    public function alterar(Request $dados){
        $cliente = Cliente::find($dados->input('id'));

        $cliente->nomeRazao = $dados->input('nomeRazao');
        $cliente->apelidoFantasia = $dados->input('apelidoFantasia');
        $cliente->cpfCnpj = $dados->input('cpfCnpj');
        $cliente->email = $dados->input('email');
        $cliente->telefone = $dados->input('telefone');
        $cliente->cep = $dados->input('cep');

        $cliente->update();

        return redirect('clientes');
    }

    public function excluir($id){
        $cliente = Cliente::find($id);

        $cliente->delete();

        return redirect('clientes');
    }
}
