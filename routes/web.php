<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('alunos', AlunosController::class);
Route::resource('aula', AulaController::class);
Route::resource('dashboard', DashboardController::class);


