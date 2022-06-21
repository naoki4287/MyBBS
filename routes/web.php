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

require __DIR__.'/auth.php';
