<?php

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
    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', function () {
    //dd('WAMBA');
    return view('layouts.dashboard');
});
Route::post('logar', 'UtilizadorController@logar');
Route::get('logout', 'UtilizadorController@logout');

Route::get('listarDepartamentos','DefinicoesController@listarDepartamentos');
Route::get('registarDepartamento','DefinicoesController@registarDepartamento');
Route::get('registarDestino','DefinicoesController@registarDestino');
Route::get('registarCategoria','DefinicoesController@registarCategoria');

Route::get('listarFuncionarios','PessoaController@listarFuncionarios');
Route::post('registarFuncionario','PessoaController@registarFuncionario');

Route::get('marcacoesVisitantePage', function () {
    return view('pages.listarMarcacaoVisitante');
});
Route::get('listarMarcacaoVisitante','MarcacaoController@listarMarcacaoVisitante');
Route::post('registarMarcacao','MarcacaoController@registarMarcacao');
Route::get('verVisitante/{id}','MarcacaoController@verVisitante');
Route::get('listarMarcacaoAllVisita','MarcacaoController@getAllMarcacaoVisita');
Route::get('marcarSaida/{id}','MarcacaoController@marcarSaida');

Route::post('registarAtendimento','AtendimentoController@registarAtendimento');

Route::get('listarProdutosGeral','ProdutoController@listarProdutosGeral');
Route::post('registarProduto','ProdutoController@registarProduto');
Route::get('verProduto/{id}','ProdutoController@verProduto');
Route::post('registarSaida','ProdutoController@registarSaida');
Route::get('listarSaidasProduto/{idProduto}','ProdutoController@listarSaidasProduto');
Route::get('listarSaidas','ProdutoController@listarSaidas');
Route::get('verNotaEntrega','ProdutoController@verNotaEntrega');

Route::get('entregarProduto', function(){
    return view('pages.entregarProduto');
});




