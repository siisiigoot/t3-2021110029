<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

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

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/',[DashboardController::class, 'index'])->name('dashboard');
Route::get('/setNull',[DashboardController::class, 'setNull'])->name('setNull');
Route::get('/setAuthorId',[DashboardController::class, 'setAuthorId'])->name('setAuthorId');

Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
