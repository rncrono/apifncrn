<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller
{
    public function logar($login, $password){
        if ($user = User::where('login', $login)->get()[0]) {
            if (Hash::check($password, $user->password)) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }   
}
