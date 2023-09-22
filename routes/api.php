<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Clients
Route::get('/clients', 'App\Http\Controllers\ClientController@index');
Route::post('/clients', 'App\Http\Controllers\ClientController@store');
Route::get('/clients/{client}', 'App\Http\Controllers\ClientController@show');
Route::put('/clients/{client}', 'App\Http\Controllers\ClientController@update');
Route::delete('/clients/{client}', 'App\Http\Controllers\ClientController@destroy');

//Services
Route::get('/services', 'App\Http\Controllers\ServiceController@index');
Route::post('/services', 'App\Http\Controllers\ServiceController@store');
Route::get('/services/{service}', 'App\Http\Controllers\ServiceController@show');
Route::put('/services/{service}', 'App\Http\Controllers\ServiceController@update');
Route::delete('/services/{service}', 'App\Http\Controllers\ServiceController@destroy');

Route::post('/clients/services', 'App\Http\Controllers\ClientController@attach');
Route::post('/clients/services/detach', 'App\Http\Controllers\ClientController@detach');

Route::post('services/clients', 'App\Http\Controllers\ServiceController@clients');

//Cursos
Route::get('/cursos', 'App\Http\Controllers\CursosController@index');
Route::post('/cursos', 'App\Http\Controllers\CursosController@store');
Route::get('/cursos/{curso}', 'App\Http\Controllers\CursosController@show');
Route::get('/cursos/edit/{curso}', 'App\Http\Controllers\CursosController@edit');
Route::put('/cursos/{curso}', 'App\Http\Controllers\CursosController@update');
Route::delete('/cursos/{curso}', 'App\Http\Controllers\CursosController@destroy');

//SubCursos
Route::get('/cursos/{curso}/subcurso', 'App\Http\Controllers\SubCursoController@index');
Route::post('/cursos/subcurso', 'App\Http\Controllers\SubCursoController@store');
Route::get('/cursos/subcurso/{subcurso}', 'App\Http\Controllers\SubCursoController@show');