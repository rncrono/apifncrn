<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuracoes;

class ApiController extends Controller
{
    public function index(Request $request){
        return response()->json([
            "message" => "tudo certo"
        ], 200);
    }

    public function getToken(Request $request) {
        return response()->json([
            "_token" => csrf_token()
        ], 200);
    }

    public function getConfigs(Request $request) {
        $configs = Configuracoes::getKeyToValues();
        return response()->json([
            $configs
        ]);
    }

    public function getNoticias(Request $request) {
        return response()->json([
            0 => [
                "title" => "Noticia1",
                "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbdtr3IlUj_bG19jHQtCZC8rYYczQty5q-QYvWTVfsEpFCxAPOfdOXBChdPKcY5QS-X44&usqp=CAU",
                "data" => "15/05/2022",
                "data_formatada" => "15/05",
                "texto" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos tempora saepe libero, qui placeat vitae magni maiores. Quibusdam enim, id repudiandae necessitatibus nam corrupti, ad perferendis eius eos temporibus placeat!"
            ],
            1 => [
                "title" => "Noticia2",
                "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbdtr3IlUj_bG19jHQtCZC8rYYczQty5q-QYvWTVfsEpFCxAPOfdOXBChdPKcY5QS-X44&usqp=CAU",
                "data" => "15/05/2022",
                "data_formatada" => "15/05",
                "texto" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos tempora saepe libero, qui placeat vitae magni maiores. Quibusdam enim, id repudiandae necessitatibus nam corrupti, ad perferendis eius eos temporibus placeat!"
            ],
            2 => [
                "title" => "Noticia3",
                "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbdtr3IlUj_bG19jHQtCZC8rYYczQty5q-QYvWTVfsEpFCxAPOfdOXBChdPKcY5QS-X44&usqp=CAU",
                "data" => "15/05/2022",
                "data_formatada" => "15/05",
                "texto" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos tempora saepe libero, qui placeat vitae magni maiores. Quibusdam enim, id repudiandae necessitatibus nam corrupti, ad perferendis eius eos temporibus placeat!"
            ]
        ]);
    }

    public function getEmpresasParceiras(Request $request) {
        $empresas = Configuracoes::find(2);
        return response()->json([
            $empresas
        ]);
    }

    public function getImagens(Request $request) {
        $imagens = Configuracoes::getKeyToValues();
        return response()->json([
            $imagens
        ]);
    }

    public function setImage(Request $request) {
        $i = $request->post()['id'];
        $propriedade = $request->post()['propriedade'];
        $config = Configuracoes::where('propriedade', $propriedade)->get()[0];
        if ($propriedade=="patrocinadores") {
            $array_patrocinadores = explode(";", $config->valor);
            $array_patrocinadores[$i] = $request->post()['valor'];
            $config->valor = implode(";", $array_patrocinadores);
        } else {
            $config->valor = $request->post()['valor'];
        }
        if ($config->save()) {
            return response()->json([
                'situation' => true,
                'url' => $request->post()['valor']
            ]);
        } else {
            return response()->json([
                'situation' => false,
                'url' => null
             ]);
        }
    }
}
