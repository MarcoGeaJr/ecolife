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



        altualizar_valor_orcamento($item->orcamento_id);

        return redirect('/orcamentos/orcar/{id}');
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



        altualizar_valor_orcamento($item->orcamento_id);

        return redirect('/orcamentos/orcar/{id}');
    }

    public function remover($id)
    {
        $item = OrcamentoItens::find($id);

        $item->delete();

        altualizar_valor_orcamento($item->orcamento_id);

        return redirect('/orcamentos/orcar/' . $item->orcamento_id);
    }

    private function altualizar_valor_orcamento($id){
        $orcamento = Orcamento::find($id);
        $orcamento->valor_total = 0;

        //obter itens
        $itens = obter_itens($id);

        foreach($itens as $item){
            $orcamento->valor_total += $item->valor_total;
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