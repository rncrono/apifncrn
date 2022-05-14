<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuracoes;

class ConfigController extends Controller
{
    public function configs(Request $request){
        $configs = Configuracoes::getKeyToValues();

        return request()->json($configs);
    }
}
