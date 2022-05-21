<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class LoginController extends Controller
{
    public function logar(Request $request){
        $credentials = $request->only('login', 'password');
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('auth_token');
            return response()->json([
                'token' => $token->plainTextToken
            ]);
        } else {
            return response()->json([
                "token" => null
            ]);
        }
    }

    public function logout(Request $request) {
        $credentials = $request->only('login', 'password');
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->tokens()->delete();
            return response()->json([
                'token' => $token->plainTextToken
            ]);
        } else {
            return response()->json([
                "token" => null
            ]);
        }
    }

    public function isLogado(){
        return response()->json(Auth::check());
    }
}
