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
    return view('welcome');
});

Route::get ('/contato' , 'ContatoController@index');
Route::post ('/contato/enviar', 'ContatoController@enviar');
 
Route::resource('/produtos', 'ProdutosController');//apontado para o controller produtos 
 Route::post('/produtos/busca', 'ProdutosController@busca');
Route::post('/produtos/ordem', 'ProdutosController@ordem');

Route::get('/produtos/classificar',"ProdutosController@classificar")->name('produto.classificar');

//para para poder linkar as rotas ja criadas
 Route::get('/backend', 'HomeController@index')->name('backend');

//         PARTE DO CARRINHO DE COMPRAS 
Route::get('/carrinho', 'CarrinhoController@index')->name('carrinho.index');//para o nome da rota
Route::get('/carrinho/adicionar', function() {//enviar um get e recebe um erro , ao invez vai para pagina inicial
    return redirect()->route('/produtos');//pagina inicial do projeto
});

Route::post('/carrinho/adicionar','CarrinhoController@adicionar')->name('carrinho.adicionar'); 
 Route::delete('/carrinho/remover', 'CarrinhoController@remover')->name('carrinho.remover');
  Route::post('/carrinho/concluir', 'CarrinhoController@concluir')->name('carrinho.concluir');
   Route::get('/carrinho/compras', 'CarrinhoController@compras')->name('carrinho.compras');
  Route::post('/carrinho/cancelar', 'CarrinhoController@cancelar')->name('carrinho.cancelar');
Route::post('/carrinho/desconto', 'CarrinhoController@desconto')->name('carrinho.desconto');



Auth::routes();

Route::get('/home', 'HomeController@init')->name('home');
