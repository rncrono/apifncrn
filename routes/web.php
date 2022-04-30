<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix("/")->group(function(){
    Route::get("/", [IndexController::class, "index"])->name("home");
});

Route::prefix("/admin")->group(function(){
    Route::get("/", [AdminController::class, "index"])->name("login");
    Route::post("/logar", [AdminController::class, "login"])->name("logar");
});


Route::prefix("/admin/dashboard")->group(function(){
    Route::get("/", [AdminController::class, "dashboard"])->middleware('auth')->name('dashboard');
    Route::get("/eventos", [AdminController::class, "eventos"])->middleware('auth')->name('eventos');
    Route::post("/delete_evento", [AdminController::class, "delete_evento"])->middleware('auth')->name('delete_evento');
    Route::post("/adicionar_evento", [AdminController::class, "adicionar_evento"])->middleware('auth')->name('adicionar_evento');
    Route::get("/configuracoes", [AdminController::class, "configuracoes"])->middleware('auth')->name('configuracoes');
    Route::post("/save_configs", [AdminController::class, "save_configs"])->middleware('auth')->name('salvar_configuracoes');
});
// Route::get('/', function () {
// Route::get('/', function () {
//     return view('index');
// });