<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/logout', function (Request $request) {
    auth()->user()->tokens()->delete();
    return response()->json([
        'message' => true
    ]);
});

Route::post("/logar", [LoginController::class, "logar"])->name('login');

Route::get('/configs', [ApiController::class, 'getConfigs'])->name("configs");

Route::get('/noticias', [ApiController::class, 'getNoticias'])->name("noticias");

Route::get('/empresas-parceiras', [ApiController::class, 'getEmpresasParceiras'])->name("empresas-parceiras");

Route::get('/getimagens', [ApiController::class, 'getImagens'])->name('getImagens');

Route::middleware('auth:sanctum')->post('/setImage', [ApiController::class, 'setImage'])->name('setImage');