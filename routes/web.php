<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DocumentController;
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


// user 

Route::get('/login', [CustomAuthController::class, 'index'])->name('login');

Route::get('/createUsager', [CustomAuthController::class, 'create'])->name('createUsager');
Route::post('/store-user', [CustomAuthController::class , 'store'])->name('registration');
Route::post('/login', [CustomAuthController::class, 'authentification'])->name('authentification');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');




// etudiant

Route::get('/liste-etudiant', [EtudiantController::class , 'index'])->name('liste.etudiant')->middleware('auth');

Route::get('/create', [EtudiantController::class , 'create'])->name('create')->middleware('auth');

Route::get('/about', [EtudiantController::class , 'about'])->name('about');

Route::post('/store', [EtudiantController::class , 'store'])->name('store')->middleware('auth');

Route::get('/edit/{etudiant}', [EtudiantController::class , 'edit'])->name('edit')->middleware('auth');

Route::put('/edit/{etudiant}', [EtudiantController::class , 'update'])->name('update')->middleware('auth');

Route::get('/show/{etudiant}', [EtudiantController::class , 'show'])->name('show')->middleware('auth');

Route::delete('/delete/{etudiant}', [EtudiantController::class , 'destroy'])->name('delete')->middleware('auth');


// langue  

Route::get('/lang/{locale}', [LocalizationController::class, 'index'])->name('lang');


// article 

Route::get('/', [ArticleController::class, 'index'])->name('liste.article')->middleware('auth');

Route::get('/create-article', [ArticleController::class , 'create'])->name('create.article')->middleware('auth');

Route::delete('/delete.article/{article}', [ArticleController::class , 'destroy'])->name('delete.article');


Route::get('/edit-article/{article}', [ArticleController::class , 'edit'])->name('edit.article')->middleware('auth');

Route::put('/edit-article/{article}', [ArticleController::class , 'update'])->name('update.article');


Route::post('/store-article', [ArticleController::class , 'store'])->name('store.article');




// document 

Route::get('/liste-document', [DocumentController::class, 'index'])->name('document.liste')->middleware('auth');

Route::get('/create-document', [DocumentController::class , 'create'])->name('create.document')->middleware('auth');

Route::post('/store-document', [DocumentController::class , 'store'])->name('store.document')->middleware('auth');

Route::get('/download-document/{document}', [DocumentController::class , 'download'])->name('download.document')->middleware('auth');

Route::get('/edit-document/{document}', [DocumentController::class , 'edit'])->name('edit.document')->middleware('auth');

Route::put('/edit-document/{id}', [DocumentController::class , 'update'])->name('update.document')->middleware('auth');

Route::delete('/delete-document/{document}', [DocumentController::class , 'destroy'])->name('delete.document')->middleware('auth');
