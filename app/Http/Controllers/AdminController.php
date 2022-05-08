<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Models\Eventos;
use App\Models\Organizador;
use App\Models\Configuracoes;

class AdminController extends Controller
{
    public function index(){
        if (Auth::check()) {
            return redirect(route('dashboard'));
        } else {
            return view('admin.login');
        }
    }

    public function login(Request $request){
        $credentials = $request->only('login', 'senha');
        $retorno = LoginController::logar($credentials['login'], $credentials['senha']);
        if ($retorno) {
            Auth::login($retorno);
            return redirect(route("dashboard"));
        } else {
            return redirect(route("login"));
        }
    }

    public function dashboard(Request $request) {
        return view('admin.dashboard.index');
    }

    public function eventos(){
        // pegando eventos com nome do organizador 
        $eventos = Eventos::select(
                            'eventos.id as id', 
                            'eventos.name as evento_titulo', 
                            'eventos.data as data',
                            'users.name as organizador_nome')->join('organizador', 'organizador.id', '=', 'eventos.organizador_id')
                            ->join('users', 'users.id', '=', 'organizador.user_id')->get();

        // pegando os organizadores                           
        $organizadores = Organizador::join('users', 'users.id', '=', 'organizador.user_id')->get();

        return view("admin.dashboard.eventos.index", ['eventos' => $eventos, 'organizadores' => $organizadores]);
    }
    
    public function configuracoes(){
        $configuracoes = Configuracoes::all();
        $configs = [];
        foreach ($configuracoes as $key => $config) {
            if ($config['propriedade']=="patrocinadores") {
                $config['valor'] = explode(";", $config['valor']);
            }
            $configs += [$config['propriedade'] => ["id" => $config['id'], "valor" => $config['valor']]];
        }
        return view('admin.dashboard.configuracoes.index', ['configs' => $configs]);
    }

    public function save_configs(Request $request){
        $inputs_values = $request->post()['inputs_values'];
        $inputs_id = $request->post()['inputs_id'];
        $cont = 0;
        foreach ($inputs_values as $key => $value) {
            $config = Configuracoes::find($inputs_id[$key]);
            $config->valor = $value;
            $config->save();
        }
        print_r("sucesso");
    }

    public function adicionar_evento(Request $request){
        $evento = new Eventos();
        if ($request->post()!==null) {
            $evento->name = $request->post()['name']; 
            $evento->data = $request->post()['data']; 
            $evento->organizador_id = $request->post()['organizador']; 
            $evento->save();
            return redirect(route("eventos_message", 1));
        }else {
            return redirect(route("eventos_message", 0));
        }
    }

    public function delete_evento(Request $request){
        $evento = Eventos::find($request->post()['id']);
        if ($evento->delete()) {
            return 1;
        } else {
            return 0;
        }
    }
}
