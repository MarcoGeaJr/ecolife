<?php

namespace App\Models\Enums;

abstract class SituacaoOrcamentoEnum {
    const SOLICITADO = 1;
    const ORCADO = 2;
    const APROVADO = 3;
    const REJEITADO = 4;
    const FINALIZADO = 5;
    const CANCELADO = 6;

    public static function obterDescricao($value) {
        switch($value){
            case SituacaoOrcamentoEnum::SOLICITADO:
                return "Solicitado";
            case SituacaoOrcamentoEnum::ORCADO:
                return "Orçado";
            case SituacaoOrcamentoEnum::APROVADO:
                return "Aprovado";
            case SituacaoOrcamentoEnum::REJEITADO:
                return "Rejeitado";
            case SituacaoOrcamentoEnum::FINALIZADO:
                return "Finalziado";
            case SituacaoOrcamentoEnum::CANCELADO:
                return "Cancelado";
            default:
                return "Inválido";
        }
    }
}