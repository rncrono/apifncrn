<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuracoes;
use App\Models\Imagem;

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
        $url_imagem = Imagem::select('id', 'valor', 'referencia')->where('id_referencia', $empresas->id)->get();    
        return response()->json([
            $url_imagem
        ]);
    }

    public function getConfiguracoes(Request $request) {
        $configs_imagens = Configuracoes::where('valor', 'imagem')->get();
        $imagens = [];
        foreach ($configs_imagens as $key => $imagem) {
            $url_imagem = Imagem::select('id', 'valor', 'referencia', 'tipo')->where('id_referencia', $imagem->id)->get();
            $imagens += [$url_imagem[0]['referencia'] => $url_imagem];
        }
        return response()->json([
            $imagens
        ]);
    }

    public function setImage(Request $request) {
        $id = $request->post()['id'];
        $valor = $request->post()['valor'];
        $tipo = $request->post()['tipo'];
        $imagem = Imagem::where('id', $id)->get()[0];
        $imagem->valor = $valor;
        $imagem->tipo = $tipo;
        if ($imagem->save()) {
            return response()->json([
                'situation' => true,
                'url' => $valor
            ]);
        } else {
            return response()->json([
                'situation' => false,
                'url' => null
             ]);
        }
    }
}
