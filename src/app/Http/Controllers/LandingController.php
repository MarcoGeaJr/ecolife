<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Landing;

class LandingController extends Controller
{
    public function index(){
        $landing = Landing::first();

        return view('landing', [
            "landing" => $landing
        ]);
    }

    public function alterar_landing(){
        $landing = Landing::first();

        return view('landing/alterar', [
            "landing" => $landing
        ]);
    }

    public function alterar(Request $dados){
        $landing = Landing::first();

        $landing->imgBackground = $dados->input("imgBackground");
        $landing->imgVertical1 = $dados->input("imgVertical1");
        $landing->imgVertical2 = $dados->input("imgVertical2");
        $landing->quemSomos = $dados->input("quemSomos");

        return redirect('/panel');
    }
}
