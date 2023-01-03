<?php

use App\Http\Controllers\Contato;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Middleware\LogAcessoMiddleware;
use App\Models\Fornecedor;

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

Route::get('/login/{erro?}',[LoginController::class,'create'])->name('login.create');
Route::post('/login',[LoginController::class,'store'])->name('login.store');

/**refatorando as rotas */






Route::middleware('autenticacao')->prefix('/app')->group(function(){
    Route::get('/home',[HomeController::class,'home'])->name('app.home');
    Route::get('/sair',[LoginController::class,'home'])->name('app.sair');
    Route::get('/cliente',[ClienteController::class,'home'])->name('app.cliente');

    /**Forncedor */
    Route::get('/fornecedor',[FornecedorController::class,'index'])->name('app.fornecedor');
    Route::get('/fornecedor/adicionar',[FornecedorController::class,'adicionar'])->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar',[FornecedorController::class,'adicionar'])->name('app.fornecedor.adicionar');
    /**Consultar todos os Fornecedor*/
    Route::get('/fornecedor/lista',[FornecedorController::class,'listar'])->name('app.fornecedor.lista');
    Route::post('/fornecedor/lista',[FornecedorController::class,'listar'])->name('app.fornecedor.lista');
    /**Editar Fornecedor */
    Route::get('/fornecedor/editar/{id}',[FornecedorController::class,'editar'])->name('app.fornecedor.editar');
    /**Deletar Fornecedor*/
    Route::get('/fornecedor/delete/{id}',[FornecedorController::class,'destroy'])->name('app.fornecedor.delete');
    
    /**Produto */
    Route::resource('produto',ProdutoController::class);
});