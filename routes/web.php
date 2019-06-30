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
    return view('walder');
});

Route::get('/', 'WalderController@listaEspecialidade');
Route::get('testeapi', 'WalderController@testeAPI');
Route::get('especialidade','WalderController@listaEspecialidade');
Route::get('retornaProfissionalPorEspecialidade','WalderController@retornaProfissionalPorEspecialidade');
Route::post('agendar','AgendarController@show');
Route::post('confirmarAgendamento','AgendaController@store');
