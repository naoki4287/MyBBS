<?php

use App\Http\Controllers\BoardController;
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

Route::get('/', [BoardController::class, 'home'])->name('home');
Route::post('/post', [BoardController::class, 'post'])->name('post');
Route::get('/edit/{id}', [BoardController::class, 'edit'])->name('edit');
Route::post('/update', [BoardController::class, 'update'])->name('update');
Route::post('/delete', [BoardController::class, 'delete'])->name('delete');
Route::get('/reply/{id}', [BoardController::class, 'reply'])->name('reply');
Route::post('/response', [BoardController::class, 'response'])->name('response');
Route::get('/replied/{id}', [BoardController::class, 'replied'])->name('replied');

require __DIR__.'/auth.php';
