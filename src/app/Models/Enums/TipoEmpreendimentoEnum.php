<?php

namespace App\Models\Enums;

use ReflectionClass;

class TipoEmpreendimentoEnum {
    const CASA = 1;
    const EDIFICIO_RESIDENCIAL = 2;
    const EDIFICIO_COMERCIAL = 3;
    const LOTEAMENTO_RESIDENCIAL = 4;
    const CONDOMINIO_PRIVADO = 5;

    public static function obterTiposEmpeendimentos() {
        $enum = new ReflectionClass(new TipoEmpreendimentoEnum);

        $enumValues = [];

        foreach ($enum->getConstants() as $value) {
            $enumValues[$value] = TipoEmpreendimentoEnum::obterDescricao($value);
        }

        return $enumValues;
    }

    public static function obterDescricao($value) {
        switch($value){
            case TipoEmpreendimentoEnum::CASA:
                return "Casa";
            case TipoEmpreendimentoEnum::EDIFICIO_RESIDENCIAL:
                return "Edifício residencial";
            case TipoEmpreendimentoEnum::EDIFICIO_COMERCIAL:
                return "Edifício comercial";
            case TipoEmpreendimentoEnum::LOTEAMENTO_RESIDENCIAL:
                return "Loteamento residencial";
            case TipoEmpreendimentoEnum::CONDOMINIO_PRIVADO:
                return "Condomínio privado";
            default:
                return "Inválido";
        }
    }
}