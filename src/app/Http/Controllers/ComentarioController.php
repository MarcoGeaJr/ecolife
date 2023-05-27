<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    public function index(Request $dados){
        $comentarios = [];
        $search = $dados->input('search');
        if (!empty($search)){
            $comentarios = Comentario::join('obra', 'comentario.obra_id', '=', 'obra.id')
                                        ->select('comentario.*', 'obra.nome_empreendimento as obra')
                                        ->where("comentario.nome", "LIKE", "%{$search}%")
                                        ->orWhere("comentario.descricao", "LIKE", "%{$search}%")
                                        ->orderBy("comentario.created_at", "desc")
                                        ->get();
        } else{
            $comentarios = Comentario::join('obra', 'comentario.obra_id', '=', 'obra.id')
                                        ->select('comentario.*', 'obra.nome_empreendimento as obra')
                                        ->orderBy("comentario.created_at", "desc")
                                        ->get();
        }

        return view('comentarios.index', [
            "comentarios" => $comentarios
        ]);
    }

    public function cadastrar(Request $dados)
    {
        $comentario = new Comentario;

        $comentario->obra_id = $dados->input("obra_id");
        $comentario->nome = $dados->input("nome");
        $comentario->descricao = $dados->input("descricao");

        $comentario->save();

        return redirect("/obras?id=" . $comentario->obra_id);
    }

    public function remover($id)
    {
        $comentario = Comentario::find($id);
        $comentario->delete();

        return redirect("/comentarios");
    }
}
