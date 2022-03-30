<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// MYTASKS ALL ROUTE
Route::get('mytasks', [TodoController::class, 'index'])->name('mytasks.index');
Route::get('mytasks/create', [TodoController::class, 'create'])->name('mytasks.create');
Route::post('mytasks/store', [TodoController::class, 'store'])->name('mytasks.store');
Route::get('mytasks/edit/{todo}', [TodoController::class, 'edit'])->name('mytasks.edit');
Route::post('mytasks/update/{todo}', [TodoController::class, 'update'])->name('mytasks.update');
Route::get('mytasks/delete/{todo}', [TodoController::class, 'destroy'])->name('mytasks.delete');

// SEARCH ALL TODOS
Route::get('/findtodos/', [TodoController::class, 'find'])->name('find');

