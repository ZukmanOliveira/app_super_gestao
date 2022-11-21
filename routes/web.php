<?php

use App\Http\Controllers\Controller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[Controller::class,'principal'])->name('principal');

Route::prefix('/app')->group(function(){
    Route::get('/',[Controller::class,'principal']);
    Route::get('sobre-nos',[Controller::class,'sobreNos']);
    Route::get('contato',[Controller::class,'contato']);

});

//ROTAS COM PARAMETRO
Route::get('/teste/{p1}/{p2}',[TesteController::class,'teste'])->name('teste');

