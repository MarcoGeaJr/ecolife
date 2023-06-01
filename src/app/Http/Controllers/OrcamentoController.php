<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orcamento;
use App\Models\Cliente;
use App\Models\Enums\SituacaoOrcamentoEnum;
use App\Models\Enums\RegiaoEnum;
use App\Models\Enums\TipoEmpreendimentoEnum;

class OrcamentoController extends Controller
{
    public function index(Request $dados){
        $orcamentos = [];
        $search = $dados->input('search');

        if (!empty($search)){
            $orcamentos = Orcamento::join('cliente', 'orcamento.cliente_id', '=', 'cliente.id')
                                    ->select('orcamento.*', 'cliente.nomeRazao as nome_cliente')
                                    ->where("orcamento.cidade", "LIKE", "%{$search}%")
                                    ->orWhere("orcamento.logradouro", "LIKE", "%{$search}%")
                                    ->orWhere("cliente.nomeRazao", "LIKE", "%{$search}%")
                                    ->orWhere("orcamento.id", "=", $search)
                                    ->orderBy("orcamento.created_at", "desc")
                                    ->get();
        } else{
            $orcamentos = Orcamento::join('cliente', 'orcamento.cliente_id', '=', 'cliente.id')
                                    ->select('orcamento.*', 'cliente.nomeRazao as nome_cliente')
                                    ->orderBy("orcamento.created_at", "desc")
                                    ->get();
        }

        foreach($orcamentos as $orcamento){
            $orcamento["valor"] = "R$ " . number_format($orcamento["valor"], 2, ',', '.');
            $orcamento["acao"] = $this->getAcao($orcamento["status"]);
            $orcamento["cancelar"] = $this->podeCancelar($orcamento["status"]);
            $orcamento["regiao"] = RegiaoEnum::obterDescricao($orcamento["regiao"]);
            $orcamento["status"] = SituacaoOrcamentoEnum::obterDescricao($orcamento["status"]);
        }

        return view('orcamentos.index', [
            "orcamentos" => $orcamentos
        ]);
    }

    private function getAcao($situacao) {
        switch($situacao){
            case SituacaoOrcamentoEnum::SOLICITADO:
                return ["Orçar" => "orcar"];
            case SituacaoOrcamentoEnum::APROVADO:
                return ["Finalizar" => "finalizar"];
            default:
                return ["Visualizar" => "visualizar"];
        }
    }

    private function podeCancelar($situacao) {
        if ($situacao == SituacaoOrcamentoEnum::CANCELADO) return FALSE;

        return TRUE;
    }

    public function novo(){
        $clientes = Cliente::select('cliente.id as id', 'cliente.nomeRazao as nomeRazao')
                            ->get();

        return view('orcamentos.novo', [
            "clientes" => $clientes,
            "tp_empreendimentos" => TipoEmpreendimentoEnum::obterTiposEmpeendimentos(),
            "regioes" => RegiaoEnum::obterRegioes()
        ]);
    }

    public function cancelar($id) {
        $orcamento = Orcamento::find($id);

        $orcamento["status"] = SituacaoOrcamentoEnum::CANCELADO;

        $orcamento->update();

        return redirect('/orcamentos');
    }
}
