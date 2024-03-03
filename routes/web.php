<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\FotoSayaController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/addfoto', [FotoController::class, 'store'])->name('foto.store');
Route::get('/foto-saya', [FotoSayaController::class, 'index'])->name('foto-saya');
Route::get('detail-foto/{slug}', [FotoController::class, 'detailFoto'])->name('detail-foto');
Route::get('detail-foto-saya/{slug}', [FotoSayaController::class, 'detailFotoSaya'])->name('detail-foto-saya');
Route::get('/foto/{slug}/edit', [FotoController::class , 'editFoto'])->name('foto.edit');
Route::put('/foto/{slug}', [FotoController::class, 'updateFoto'])->name('foto.update');
Route::delete('/foto/{id}', [FotoController::class, 'delete'])->name('foto.delete');

Route::post('comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('comments/{id}', [CommentController::class, 'destroy'])->name('comments.delete');
Route::get('get-comments/{photoId}', [CommentController::class, 'getComments'])->name('comments.get');
Route::get('get-active-user-id', [CommentController::class, 'getActiveUserId'])->name('comments.getId');

Route::post('like-foto', [LikeController::class, 'LikePhoto']);

