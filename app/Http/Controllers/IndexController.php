<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Eventos;
use App\Models\Configuracoes;

class IndexController extends Controller
{
    public function index() {
        $eventos = Eventos::all();

        $configs = Configuracoes::getKeyToValues();

        return view("index", ['eventos' => $eventos, 'config' => $configs]);
    }
}
