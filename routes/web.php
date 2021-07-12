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

Route::get('/', 'principalController@principal')->name ('site.index');

Route::get('/sobreNos', 'sobreNosController@sobreNos')-> name('site.sobreNos');

Route::get('/contato', 'contatoController@contato')->name ('site.contato');

Route::get('/login', function () {return 'login';})-> name ('site.login');

Route::prefix ('/app')->group (function () {

    Route::get('/clientes', function () {return 'Clientes';})-> name ('app.clientes');

    Route::get('/fornecedores', function () {return 'Fornecedores';})->name('app.fornecedores');

    Route::get('/produtos', function () {return 'Produtos';})->name ('app.produtos');

});

