<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjController;
use App\Http\Controllers\TaskPrController;
use App\Http\Controllers\SolPrController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
});

//Subject
Route::get('/subjects', [SubjController::class,'index']); //index function

Route::get('/subjects/create', [SubjController::class,'create']) -> name("subjects.create");
Route::post('/subjects/create', [SubjController::class,'store']);

Route::get('/subjects/{subject}/edit',[SubjController::class,'edit']);
Route::put('/subjects/{subject}',[SubjController::class,'update']);

Route::get('/subjects/{subject}',[SubjController::class,'show']);
Route::delete('/subjects/{subject}',[SubjController::class,'destroy']);

Route::get('/subjects/{subject}/tasks', [SubjController::class,'showTask'])->name("subjects.show"); 

//Task
Route::get('/tasks/{task}',[TaskPrController::class,'show']);

Route::get('/tasks/{task}/edit',[TaskPrController::class,'edit']);
Route::put('/tasks/{task}',[TaskPrController::class,'update'])->name("subjects.tasks.update");

Route::get('/subjects/{subject}/tasks/create',[TaskPrController::class,'create']);
Route::post('/subjects/{subject}/tasks/create',[TaskPrController::class,'store'])->name("subjects.tasks.store");

Route::delete('/tasks/{task}',[TaskPrController::class,'destroy']);

//Solution
Route::get('/solutions/{solution}/edit',[SolPrController::class,'edit']);