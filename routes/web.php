<?php

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


Route::get('/', [App\Http\Controllers\AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums', [App\Http\Controllers\AlbumController::class, 'index'])->name('albums.index');
Route::get('/albums/create', [App\Http\Controllers\AlbumController::class, 'create'])->name('albums.create');
Route::post('/albums/store', [App\Http\Controllers\AlbumController::class, 'store'])->name('albums.store');
Route::get('/albums/{id}', [App\Http\Controllers\AlbumController::class, 'edit'])->name('albums.edit');
Route::post('/albums/update/{id}', [App\Http\Controllers\AlbumController::class, 'update'])->name('albums.update'); 
Route::get('/albums/destroy/{id}', [App\Http\Controllers\AlbumController::class, 'destroy'])->name('albums.destroy');
Route::get('/albums/move/{from_id}/{to_id}', [App\Http\Controllers\AlbumController::class, 'move'])->name('albums.move');

//pictures  
Route::get('/pictures/{album_id}', [App\Http\Controllers\PictureController::class, 'index'])->name('pictures');
Route::get('/pictures/create/{album_id}', [App\Http\Controllers\PictureController::class, 'create'])->name('pictures.create');
Route::post('/pictures/store/{album_id}', [App\Http\Controllers\PictureController::class, 'store'])->name('pictures.store');
Route::get('/pictures/destroy/{id}', [App\Http\Controllers\PictureController::class, 'destroy'])->name('pictures.destroy');
