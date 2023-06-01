<?php

namespace App\Models\Enums;

use ReflectionClass;

class RegiaoEnum {
    const COMUM = 1;
    const NOBRE = 2;

    public static function obterRegioes() {
        $enum = new ReflectionClass(new RegiaoEnum);

        $enumValues = [];

        foreach ($enum->getConstants() as $value) {
            $enumValues[$value] = RegiaoEnum::obterDescricao($value);
        }

        return $enumValues;
    }

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