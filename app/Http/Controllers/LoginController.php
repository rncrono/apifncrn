<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function logar(Request $request){
        $login = $request->post()['login'];
        $password = $request->post()['pass'];
        if (isset(User::where('login', $login)->get()[0])) {
            $user = User::where('login', $login)->get()[0];
            if (Hash::check($password, $user->password)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
        return false;
    }

    public function isLogado(){
        return response()->json(Auth::check());
    }
}
