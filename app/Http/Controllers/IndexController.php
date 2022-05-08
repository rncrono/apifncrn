<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Eventos;
use App\Models\Configuracoes;

class IndexController extends Controller
{

    public function index(Request $request) {
        $eventos = Eventos::all();

        $configs = Configuracoes::getKeyToValues();
        if (isset($configs['patrocinadores'])) {
            $configs['patrocinadores']['valor'] = explode(";", $configs["patrocinadores"]['valor']);
        }
        return view("index", ['eventos' => $eventos, 'configs' => $configs]);
    }
    
    public function eventos(){

        $configs = Configuracoes::getKeyToValues();
        
        return view("home.eventos", ['config' => $configs]);
    }
    
    public function estrada(){

        $configs = Configuracoes::getKeyToValues();

        return view('home.estrada', ['config' => $configs]);
    }

    public function mtb(){

        $configs = Configuracoes::getKeyToValues();

        return view('home.mtb', ['config' => $configs]);
    }
}
