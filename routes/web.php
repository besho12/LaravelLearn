<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropzoneController;

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

//// start dropzone////
Route::get('dropzone', [DropzoneController::class,'index'])->name('dropzone');
Route::post('dropzone/upload', [DropzoneController::class,'upload'])->name('dropzone.upload');
Route::get('dropzone/fetch', [DropzoneController::class,'fetch'])->name('dropzone.fetch');
Route::get('dropzone/delete', [DropzoneController::class,'delete'])->name('dropzone.delete');
//// end dropzone////

Route::get('{path}',[App\Http\Controllers\HomeController::class, 'index'])->where( 'path', '([A-z\d\-\/_.]+)?' );
