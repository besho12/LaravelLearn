<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/teachers/all', [App\Http\Controllers\TeacherController::class, 'index']);
Route::post('add/teacher', [App\Http\Controllers\TeacherController::class, 'store'])->name('add_teacher');
Route::post('edit/teacher', [App\Http\Controllers\TeacherController::class, 'update'])->name('edit_teacher');
Route::post('get_teacher', [App\Http\Controllers\TeacherController::class, 'show']);