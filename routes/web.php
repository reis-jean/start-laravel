<?php

use App\Http\Controllers\PrincipalController;
use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\PrincipalController@principal')->name('site.index');

//chamando o middleware
// Route::middleware(LogAcessoMiddleware::class)->get('/', 'App\Http\Controllers\PrincipalController@principal')->name('site.index');

//para criar o middleware execute: php artisan make:middleware LogAcessoMiddleware

// php artisan route:list para listar todas as routas da aplicação

Route::get('/sobre-nos', 'App\Http\Controllers\SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'App\Http\Controllers\ContatoController@contato')->name('site.contato');
Route::post('/contato', 'App\Http\Controllers\ContatoController@salvar')->name('site.contato');
Route::get('/login/{erro?}', 'App\Http\Controllers\LoginController@index')->name('site.login');
Route::post('/login', 'App\Http\Controllers\LoginController@autenticar')->name('site.login');


 //é possivel colocar o middlewate diretamente no grupo de routas
Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function(){
    
    // Route::middleware('autenticacao', 'log.acesso')->get('/clientes', function(){ return 'Clientes';})->name('app.clientes');    
    // Route::middleware('autenticacao', 'log.acesso')->get('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores'); 
    // Route::middleware('autenticacao', 'log.acesso')->get('/produtos', function(){ return 'Produtos';})->name('app.produtos');
    // Route::middleware('autenticacao')->get('/clientes', function(){ return 'Clientes';})->name('app.clientes');    
    // Route::middleware('autenticacao')->get('/fornecedores', [\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores'); 
    // Route::middleware('autenticacao')->get('/produtos', function(){ return 'Produtos';})->name('app.produtos');
   
    Route::get('/home','App\Http\Controllers\HomeController@index')->name('app.home');    
    Route::get('/sair', 'App\Http\Controllers\LoginController@sair')->name('app.sair');    
    Route::get('/cliente', 'App\Http\Controllers\ClienteController@index')->name('app.cliente');    
    Route::get('/produto', 'App\Http\Controllers\ProdutoController@index')->name('app.produto');
    
    Route::get('/fornecedor', 'App\Http\Controllers\FornecedorController@index')->name('app.fornecedor'); 
    Route::post('/fornecedor/listar', 'App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar'); 
    Route::get('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar'); 
    Route::post('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar'); 
    

});

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteController::class, 'teste'])->name('teste'); 

route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui para voltar a pagina principal</a> ';
});
