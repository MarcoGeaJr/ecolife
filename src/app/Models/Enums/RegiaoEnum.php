<?php

namespace App\Models\Enums;

abstract class RegiaoEnum {
    const COMUM = 1;
    const NOBRE = 2;

    public static function obterDescricao($value) {
        switch($value){
            case RegiaoEnum::COMUM:
                return "Comum";
            case RegiaoEnum::NOBRE:
                return "Nobre";
            default:
                return "Inválida";
        }
    }
}