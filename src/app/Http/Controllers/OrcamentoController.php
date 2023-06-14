<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orcamento;
use App\Models\OrcamentoItens;
use App\Models\Cliente;
use App\Models\Obra;
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
            $orcamento["valor"] = "R$ " . number_format($orcamento["valor_orcamento"], 2, ',', '.');
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
            case SituacaoOrcamentoEnum::REJEITADO:
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

    public function cadastrar(Request $dados){
        $orcamento = new Orcamento;

        $orcamento->cliente_id = $dados->input('cliente');
        $orcamento->tipo_empreendimento = $dados->input('tipo_empreendimento');
        $orcamento->cep = $dados->input('cep');
        $orcamento->cidade = $dados->input('cidade');
        $orcamento->logradouro = $dados->input('logradouro');
        $orcamento->numero = $dados->input('numero');
        $orcamento->regiao = $dados->input('regiao');
        $orcamento->tamanho_terreno = $dados->input('tamanho');
        $orcamento->palavra_segura = $dados->input('palavra_segura');
        $orcamento->valor_orcamento = 0;
        $orcamento->status = SituacaoOrcamentoEnum::SOLICITADO;

        $orcamento->save();

        return redirect('/orcamentos');
    }

    public function solicitar(Request $dados){
        $cliente = new Cliente;

        $cliente->nomeRazao = $dados->input('nomeRazao');
        $cliente->apelidoFantasia = $dados->input('apelidoFantasia');
        $cliente->cpfCnpj = $dados->input('cpfCnpj');
        $cliente->email = $dados->input('email');
        $cliente->telefone = $dados->input('telefone');
        $cliente->cep = $dados->input('cep');

        $cliente->save();
        
        $orcamento = new Orcamento;

        $orcamento->cliente_id = $cliente->id;
        $orcamento->tipo_empreendimento = $dados->input('tipo_empreendimento');
        $orcamento->cep = $dados->input('cep');
        $orcamento->cidade = $dados->input('cidade');
        $orcamento->logradouro = $dados->input('logradouro');
        $orcamento->numero = $dados->input('numero');
        $orcamento->regiao = $dados->input('regiao');
        $orcamento->tamanho_terreno = $dados->input('tamanho');
        $orcamento->palavra_segura = $dados->input('palavra_segura');
        $orcamento->valor_orcamento = 0;
        $orcamento->status = SituacaoOrcamentoEnum::SOLICITADO;

        $orcamento->save();

        return redirect('/');
    }

    private function obter($id){
        $orcamento = Orcamento::find($id);
        $cliente = Cliente::find($orcamento->cliente_id);

        $orcamento->cliente = $cliente->nomeRazao;
        $orcamento->valor_total = number_format($orcamento->valor_orcamento, 2, ',', '.');
        $orcamento->regiao = RegiaoEnum::obterDescricao($orcamento->regiao);
        $orcamento->status = SituacaoOrcamentoEnum::obterDescricao($orcamento->status);
        $orcamento->empreendimento = TipoEmpreendimentoEnum::obterDescricao($orcamento->tipo_empreendimento);

        $itens = OrcamentoItens::query()
                                ->where('orcamento_id', '=', $id)
                                ->orderBy('id')
                                ->get();

        foreach($itens as $item){
            $item["valor_total"] = "R$ " . number_format($item["valor_total"], 2, ',', '.');
        }

        if ($orcamento->status == "Orçado"){
            $aprovar = 1;
        }
        else {
            $aprovar = 0;
        }

        return [
            "orcamento" => $orcamento,
            "itens" => $itens,
            "aprovar" =>  $aprovar
        ];
    }

    public function obter_aprovar($id){
        return view('orcamentos.aprovar', $this->obter($id));
    }

    public function orcar($id){
        return view('orcamentos.orcar', $this->obter($id));
    }

    public function visualizar($id){
        return view('orcamentos.visualizar', $this->obter($id));
    }

    public function orcado(Request $dados){
        $orcamento = Orcamento::find($dados->input('id'));

        $orcamento->status = SituacaoOrcamentoEnum::ORCADO;

        $orcamento->update();

        // enviar o e-mail para o cliente

        return redirect('/orcamentos');
    }

    public function aprovar($id){
        $orcamento = Orcamento::find($id);

        $orcamento->status = SituacaoOrcamentoEnum::APROVADO;

        $orcamento->update();

        return redirect('/orcamentos');
    }

    public function rejeitar($id){
        $orcamento = Orcamento::find($id);

        $orcamento->status = SituacaoOrcamentoEnum::REJEITADO;

        $orcamento->update();

        return redirect('/orcamentos');
    }

    public function finalizar($id){
        $orcamento = Orcamento::find($id);

        return view('orcamentos.finalizar', [
            "orcamento" => $orcamento
        ]);
    }

    public function finalizado(Request $dados){
        $orcamento = Orcamento::find($dados->input('orcamento_id'));
        $orcamento->status = SituacaoOrcamentoEnum::FINALIZADO;
        $orcamento->update();

        // Cadastrar obra
        $obra = new Obra;

        $obra->orcamento_id = $orcamento->id;
        $obra->nome_empreendimento = $dados->input('nome_empreendimento');
        $obra->cep = $orcamento->cep;
        $obra->cidade = $orcamento->cidade;
        $obra->logradouro = $orcamento->logradouro;
        $obra->numero = $orcamento->numero;
        $obra->data_entrega = $dados->input('data_entrega');

        // resto mokado
        $obra->link_gmaps = "";
        $obra->imgHorizontal = $dados->input('imgHorizontal');
        $obra->imgVertical1 = "";
        $obra->imgVertical2 = "";

        $obra->save();

        // enviar e-mail para o cliente

        return redirect('/orcamentos');
    }

    public function cancelar($id) {
        $orcamento = Orcamento::find($id);

        $orcamento["status"] = SituacaoOrcamentoEnum::CANCELADO;

        $orcamento->update();

        // enviar e-mail para o cliente

        return redirect('/orcamentos');
    }
}
