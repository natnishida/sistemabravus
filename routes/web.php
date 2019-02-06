<?php

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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/date', 'SistemaController@date')->name('home')->middleware('auth');




// CRUD de Prospects
Route::get('/prospects', 'SistemaController@listaProspects')->middleware('auth');

Route::get('/cadastro_prospect', 'SistemaController@inserirProspect')->middleware('auth');
Route::post('/cadastro_prospect', 'SistemaController@inserirProspect')->middleware('auth');

Route::get('/atualizacao_prospect/{id}', 'SistemaController@atualizarProspect')->middleware('auth');
Route::post('/atualizacao_prospect/{id}', 'SistemaController@atualizarProspect')->middleware('auth');

// CRUD de Free Pass
Route::get('/freepass', 'SistemaController@listaFreepass')->middleware('auth');

Route::get('/cadastro_freepass', 'SistemaController@inserirFreePass')->middleware('auth');
Route::post('/cadastro_freepass', 'SistemaController@inserirFreePass')->middleware('auth');

Route::get('/freepass/{id}', 'SistemaController@listaFreepassCliente')->middleware('auth');
Route::post('/freepass/{id}', 'SistemaController@listaFreepassCliente')->middleware('auth');

Route::get('/freepassdia', 'SistemaController@listaFreepassDia')->middleware('auth');
Route::post('/freepassdia', 'SistemaController@listaFreepassDia')->middleware('auth');

Route::get('/atualizacao_freepass/{id}', 'SistemaController@atualizarFreePass')->middleware('auth');
Route::post('/atualizacao_freepass/{id}', 'SistemaController@atualizarFreePass')->middleware('auth');

// CRUD de Acoes CRM
Route::get('/acoescrm', 'SistemaController@listaAcoes')->middleware('auth');

Route::get('/atualizacao_acoes/{id}', 'SistemaController@atualizarAcoes')->middleware('auth');
Route::post('/atualizacao_acoes/{id}', 'SistemaController@atualizarAcoes')->middleware('auth');
