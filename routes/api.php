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





Route::post('get_project', [App\Http\Controllers\ProjectController::class, 'show']);
Route::get('/projects/all', [App\Http\Controllers\ProjectController::class, 'index']);
Route::post('get_milestones', [App\Http\Controllers\MilestoneController::class, 'show']);
Route::post('get_tasks', [App\Http\Controllers\TaskController::class, 'index']);
Route::post('save_task', [App\Http\Controllers\TaskController::class, 'save']);