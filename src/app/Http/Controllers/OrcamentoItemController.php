<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Orcamento;
use App\Models\OrcamentoItens;

class OrcamentoItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function novo($id){
        return view('orcamentoitens.novo', [
            "orcamento_id" => $id
        ]);
    }

    public function cadastrar(Request $dados)
    {
        $item = new OrcamentoItens;

        $item->orcamento_id = $dados->input('orcamento_id');
        $item->descricao_item = $dados->input('descricao_item');
        $item->observacao_item = " " .$dados->input('observacao_item');
        $item->quantidade = $dados->input('quantidade');
        $item->valor_unitario = $dados->input('valor_unitario');
        $item->valor_total = $item->quantidade * $item->valor_unitario;

        $item->save();

        $this->altualizar_valor_orcamento($item->orcamento_id);

        return redirect('/orcamentos/orcar/' . $item->orcamento_id);
    }

    public function editar($id){
        $item = OrcamentoItens::find($id);

        return view('orcamentoitens.editar', [
            "item" => $item
        ]);
    }

    public function alterar(Request $dados)
    {
        $item = OrcamentoItens::find($dados->input('id'));

        $item->orcamento_id = $item->orcamento_id;

        $item->descricao_item = $dados->input('descricao_item');
        $item->observacao_item = " " .$dados->input('observacao_item');
        $item->quantidade = $dados->input('quantidade');
        $item->valor_unitario = $dados->input('valor_unitario');
        $item->valor_total = $item->quantidade * $item->valor_unitario;

        $item->update();

        $this->altualizar_valor_orcamento($item->orcamento_id);

        return redirect('/orcamentos/orcar/' . $item->orcamento_id);
    }

    public function remover($id)
    {
        $item = OrcamentoItens::find($id);

        $item->delete();

        $this->altualizar_valor_orcamento($item->orcamento_id);

        return redirect('/orcamentos/orcar/' . $item->orcamento_id);
    }

    private function altualizar_valor_orcamento($id){
        $orcamento = Orcamento::find($id);
        $orcamento->valor_orcamento = 0;

        //obter itens
        $itens = $this->obter_itens($id);

        foreach($itens as $item){
            $orcamento->valor_orcamento += $item->valor_total;
        }

        $orcamento->update();
    }

    private function obter_itens($id){
        return OrcamentoItens::query()
                            ->where('orcamento_id', '=', $id)
                            ->orderBy('id')
                            ->get();
    }
}