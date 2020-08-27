<?php

use App\Http\Controllers\PacientesController;
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

// FOI COLOCADO O PROPRIO MÉTODO CHAMANDO A VIEW SEM CONTROLADOR
Route::get('/', function () { return view('welcome'); });

// Route::get('/inicio', function () {
//     return view('index');
// });

// PRIMEIRA PÁGINA
Route::get('/inicio', 'PacientesController@index');

// ROTA PAR A PAGINA DE CADATRO
// DEPOIS QUE CONFIGUREI O MODAL NÃO PRECISEI MAIS DESSA ROTA
// Route::get('/inicio/create', 'PacientesController@create');

// METODO "POST" USADO NO "FORMULÁRIO DE CADASTRO DO PACIENTE"
Route::post('/inicio', 'PacientesController@store');

// MOSTAR O PRONTUÁRIO DE UM PACIENTE
Route::get('/inicio/{id}', 'PacientesController@show');

//************************************************************************************ */

// DEPOIS QUE CONFIGUREI O MODAL NÃO PRECISEI MAIS DESSA ROTA
Route::get('/sintomas/create', 'SintomasController@create');

// PRECISEI CONFIGURAR ESSA ROTA PARA USAR O MÉTODO STORE (USAR NO FORMULARIO)
Route::post('/sintomas', 'SintomasController@store');


//************************************************************************************ */

// ABRE O "FORMULÁRIO DE CADASTRO/EDIÇÃO" JÁ PREENCHIDO PARA ATUALIZAR ( DEPOIS VAI PARA "UPDATE")
Route::get('/editar/{id}/edit', 'PacientesController@edit');
// FAZ A ATUALIZAÇÃO PROPRIANMENE DITA (ACTION DO FORMULÁRIO)
Route::put('/update/{id}', 'PacientesController@update');


//************************************************************************************ */

// EXCLUIR
Route::delete('/excluir/{id}', 'PacientesController@destroy');

Route::delete('/excluir_sintomas/{id}', 'SintomasController@destroy'); 

//************************************************************************************ */

// BUSCAR
Route::post('/buscar', 'BuscarController@buscar');
Route::get('/buscarp', 'BuscarController@buscarpagina');