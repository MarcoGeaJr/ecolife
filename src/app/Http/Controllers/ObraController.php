<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;

class ObraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $obras = Obra::all()->toArray();

        return view('obras.index', [
            "obras" => $obras
        ]);
    }
}