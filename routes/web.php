<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/buku', [BookController::class, 'index'])->name('buku');
Route::get('/tambahbuku', [BookController::class, 'tambah'])->name('tambahbuku');
Route::post('/insertdata', [BookController::class, 'insert'])->name('insertdata');

Route::get('/editdata/{id}', [BookController::class, 'edit'])->name('editdata');
Route::post('/updatedata/{id}', [BookController::class, 'update'])->name('updatedata');

Route::get('/delete/{id}', [BookController::class, 'delete'])->name('delete');
