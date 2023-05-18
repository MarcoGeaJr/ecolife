<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
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

        return redirect("/obras/editar?id=" . $comentario["obra_id"]);
    }
}
