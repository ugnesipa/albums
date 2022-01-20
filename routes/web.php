<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AlbumController as UserAlbumController;
use App\Http\Controllers\Admin\AlbumController as AdminAlbumController;



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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');

Route::get('/user/albums/', [UserAlbumController::class, 'index'])->name('user.albums.index');
Route::get('/user/albums/{id}', [UserAlbumController::class, 'show'])->name('user.albums.show');

Route::get('/admin/albums/', [AdminAlbumController::class, 'index'])->name('admin.albums.index');
Route::get('/admin/albums/create', [AdminAlbumController::class, 'create'])->name('admin.albums.create');
Route::get('/admin/albums/{id}', [AdminAlbumController::class, 'show'])->name('admin.albums.show');
Route::post('/admin/albums/store', [AdminAlbumController::class, 'store'])->name('admin.albums.store');
Route::get('/admin/albums/{id}/edit', [AdminAlbumController::class, 'edit'])->name('admin.albums.edit');
Route::put('/admin/albums/{id}', [AdminAlbumController::class, 'update'])->name('admin.albums.update');
Route::delete('/admin/albums/{id}', [AdminAlbumController::class, 'destroy'])->name('admin.albums.destroy');
