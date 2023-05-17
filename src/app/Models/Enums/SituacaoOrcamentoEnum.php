<?php

namespace App\Models\Enums;

abstract class SituacaoOrcamentoEnum {
    const SOLICITADO = "Solicitado";
    const ORCADO = "Orçado";
    const APROVADO = "Aprovado";
    const REJEITADO = "Rejeitado";
    const FINALIZADO = "Finalizado";
    const CANCELADO = "Cancelado";
}