<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Landing;
use App\Models\Obra;
use App\Models\Enums\RegiaoEnum;
use App\Models\Enums\TipoEmpreendimentoEnum;

class LandingController extends Controller
{
    public function index(){
        $landing = Landing::first();
        $obras = Obra::all();

        return view('landing.index', [
            "landing" => $landing,
            "obras" => $obras,
            "tp_empreendimentos" => TipoEmpreendimentoEnum::obterTiposEmpeendimentos(),
            "regioes" => RegiaoEnum::obterRegioes()
        ]);
    }

    public function editar(){
        $landing = Landing::first();

        return view('landing.alterar', [
            "landing" => $landing
        ]);
    }

    public function alterar(Request $dados){
        $landing = Landing::first();

        // if ($landing->imgBackground != $dados->input("imgBackground")){
        //     $landing->imgBackground = $dados->input("imgBackground");
        // }        

        // if ($landing->imgVertical1 != $dados->input("imgVertical1")){
        //     $landing->imgVertical1 = $dados->input("imgVertical1");
        // }
        // $landing->imgVertical2 = $dados->input("imgVertical2");

        $landing->quemSomos = $dados->input("quemSomos");

        $landing->update();

        return redirect('/painel');
    }
}
