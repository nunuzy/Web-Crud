<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Models\Book;

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
    $jumlahbuku = Book::count();
    return view('welcome', compact('jumlahbuku'));
})->middleware('auth');

// Route::group(['middleware' => ['auth','hakakses:admin,user']]. function(){

// });

Route::get('/buku', [BookController::class, 'index'])->name('buku')->middleware('auth');
Route::get('/tambahbuku', [BookController::class, 'tambah'])->name('tambahbuku');
Route::post('/insertdata', [BookController::class, 'insert'])->name('insertdata');

Route::get('/editdata/{id}', [BookController::class, 'edit'])->name('editdata');
Route::put('/updatedata/{id}', [BookController::class, 'update'])->name('updatedata');

Route::get('/delete/{id}', [BookController::class, 'delete'])->name('delete');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
