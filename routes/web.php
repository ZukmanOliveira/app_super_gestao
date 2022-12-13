<?php

use App\Http\Controllers\Contato;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\PrincipalController;
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

Route::get('/',[PrincipalController::class,'principal'])->name('site.index');
Route::get('/sobre-nos',[SobreNosController::class,'sobreNos'])->name('site.sobrenos');
Route::post('/contato',[ContatoController::class,'store'])->name('site.store');
Route::get('/contato',[ContatoController::class,'create'])->name('site.create');
Route::get('/login', function(){return'Login';});

Route::prefix('/app')->group(function(){
    Route::get('/',[Controller::class,'principal']);
    Route::get('sobre-nos',[Controller::class,'sobreNos']);
    Route::get('contato',[Controller::class,'contato']);

});

//ROTAS COM PARAMETRO
Route::get('/teste/{p1}/{p2}',[TesteController::class,'teste'])->name('teste');

