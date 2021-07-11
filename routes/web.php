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

Route::get('/', 'principalController@principal');

Route::get('/sobreNos', 'sobreNosController@sobreNos');

Route::get('/contato', 'contatoController@contato');

Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem}', function (string $nome, string $categoria, string $assunto, string $mensagem) {

    echo "estamos aqui: .$nome - .$categoria - .$assunto - .$mensagem";

});
