<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VilleController;

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



Route::get('/', [EtudiantController::class , 'index'])->name('index');

Route::get('/create', [EtudiantController::class , 'create'])->name('create');

Route::get('/about', [EtudiantController::class , 'about'])->name('about');

Route::post('/store', [EtudiantController::class , 'store'])->name('store');

Route::get('/edit/{etudiant}', [EtudiantController::class , 'edit'])->name('edit');

Route::put('/edit/{etudiant}', [EtudiantController::class , 'update'])->name('update');

Route::get('/show/{etudiant}', [EtudiantController::class , 'show'])->name('show');

Route::delete('/delete/{etudiant}', [EtudiantController::class , 'destroy'])->name('delete');
