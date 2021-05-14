<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\AtividadeController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
/**
 * Rotas Projeto
 */
Route::get('/projeto', [App\Http\Controllers\ProjetoController::class, 'listar'])->name('/projeto');
Route::get('/projeto/listar', [App\Http\Controllers\ProjetoController::class, 'listar'])->name('/projeto/listar');
Route::get('/projeto/form', [App\Http\Controllers\ProjetoController::class, 'form'])->name('/projeto/form');
Route::post('/projeto/atualizar', [App\Http\Controllers\ProjetoController::class, 'atualizar'])->name('/projeto/atualizar');
/**
 * Rotas atividade
 */
Route::get('/atividade', [App\Http\Controllers\AtividadeController::class, 'listar'])->name('/atividade');
Route::get('/atividade/listar', [App\Http\Controllers\AtividadeController::class, 'listar'])->name('/atividade/listar');
Route::get('/atividade/form', [App\Http\Controllers\AtividadeController::class, 'form'])->name('/atividade/form');
Route::post('/atividade/atualizar', [App\Http\Controllers\AtividadeController::class, 'atualizar'])->name('/atividade/atualizar');
