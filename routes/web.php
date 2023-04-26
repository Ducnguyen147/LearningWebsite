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
Route::get('/subjects', [SubjController::class,'index'])->middleware('auth'); //index function

Route::get('/contacts', [SubjController::class,'indexCont'])->name('contacts')->middleware('auth');

Route::get('/subjects/create', [SubjController::class,'create']) -> name("subjects.create")->middleware('auth');
Route::post('/subjects/create', [SubjController::class,'store'])->middleware('auth');

Route::get('/subjects/{subject}/edit',[SubjController::class,'edit'])->middleware('auth');
Route::put('/subjects/{subject}',[SubjController::class,'update'])->middleware('auth');

Route::get('/subjects/{subject}',[SubjController::class,'show'])->middleware('auth');
Route::delete('/subjects/{subject}',[SubjController::class,'destroy'])->middleware('auth');

Route::get('/subjects/{subject}/tasks', [SubjController::class,'showTask'])->name("subjects.show")->middleware('auth'); 

//Task
Route::get('/tasks/{task}',[TaskPrController::class,'show'])->name("subjects.tasks")->middleware('auth');

Route::get('/tasks/{task}/edit',[TaskPrController::class,'edit'])->middleware('auth');
Route::put('/tasks/{task}',[TaskPrController::class,'update'])->name("subjects.tasks.update")->middleware('auth');

Route::get('/subjects/{subject}/tasks/create',[TaskPrController::class,'create'])->middleware('auth');
Route::post('/subjects/{subject}/tasks/create',[TaskPrController::class,'store'])->name("subjects.tasks.store")->middleware('auth');

Route::delete('/tasks/{task}',[TaskPrController::class,'destroy'])->middleware('auth');



//Solution
// Route::get('/solutions/{solution}',[SolPrController::class,'show'])->name("subjects.tasks.solutions");

Route::get('/solutions/{solution}/edit',[SolPrController::class,'edit'])->middleware('auth');
Route::put('/solutions/{solution}/edit',[SolPrController::class,'update'])->name("subjects.tasks.solutions.update")->middleware('auth');

Route::get('/student/subjects/tasks/{task}', [SolPrController::class,'create']) -> name("subjects.create")->middleware('auth');
Route::post('/student/subjects/tasks/{task}', [SolPrController::class,'store'])->name("students.subjects.tasks.store")->middleware('auth');

//Student
Route::get('/student/subjects', [SubjController::class,'indexStudent'])->name('students')->middleware('auth'); //index function
Route::delete('/student/subjects/{subject}/deregister',[SubjController::class,'deregisterStudent'])->middleware('auth');

Route::get('/student/subjects/register', [SubjController::class, 'registerSubjects'])->middleware('auth');
Route::post('/student/subjects/{subject}/register', [SubjController::class, 'registerStudent'])->middleware('auth');

Route::get('/student/subjects/{subject}',[SubjController::class,'showStudent'])->middleware('auth');

Route::get('/student/subjects/{subject}/tasks', [SubjController::class,'showTaskStudent'])-> name("students.subjects.tasks")->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
