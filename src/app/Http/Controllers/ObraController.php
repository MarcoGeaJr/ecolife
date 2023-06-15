<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;
use App\Models\Comentario;

class ObraController extends Controller
{
    public function index()
    {
        $obras = Obra::all()->toArray();

        return view('obras.index', [
            "obras" => $obras
        ]);
    }

    public function visualizar($id){
        $obra = Obra::join("orcamento", "obra.orcamento_id", "=", "orcamento.id")
                    ->join("cliente", "orcamento.cliente_id", "=", "cliente.id")
                    ->select('obra.*', 'cliente.nomeRazao as nome_cliente')
                    ->where("obra.id", "=", $id)
                    ->first();

        $comentarios = Comentario::join('obra', 'comentario.obra_id', '=', 'obra.id')
                ->select('comentario.*', 'obra.nome_empreendimento as obra')
                ->orderBy("comentario.created_at", "desc")
                ->where("obra.id", "=", $id)
                ->get();

        return view('obras.visualizar', [
            "obra" => $obra,
            "comentarios" => $comentarios
        ]);
    }
}