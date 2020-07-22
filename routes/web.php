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

// Route::get('/{id}', 'appController@index');
// Route::get('/todos/{id}', 'appController@todos');
// Route::get('/proprietario/{numero}', 'appController@proprietario');

Route::get('/', 'geral@index');
Route::get('/apresentar_lista_clientes', 'geral@apresentarListaCliente');
Route::get('/apresentar_lista_compras', 'geral@apresentarListaCompras');

Route::get('/apresentar_cliente/{id}', 'geral@apresentarCliente');
Route::get('/apresentar_compra/{id}', 'geral@apresentarCompra');

//pesquisar cliente pelo nome (ou parte dele)
Route::get('/pesquisar_cliente/{pesquisa}', 'geral@pesquisarCliente');
