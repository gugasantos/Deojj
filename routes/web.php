<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TurmaController;
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


Route::middleware('auth')->group(function () {

    Route::resource('alunos', AlunosController::class);
    Route::get('/check_up/{id}', [AulaController::class, 'check_up'])->name('check_up');
    Route::redirect('/', '/aula'); // Redireciona a rota de origem para 'aulas'
    Route::resource('aula', AulaController::class);
    Route::resource('turma', TurmaController::class);

    Route::resource('dashboard', DashboardController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



});

require __DIR__.'/auth.php';
