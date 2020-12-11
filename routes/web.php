<?php

use App\Http\Controllers\TodosController;
use App\Http\Livewire\Todo;
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

require __DIR__ . '/auth.php';

Route::get('/', fn () => view('welcome'));

Route::middleware('auth')->group(function () {
    Route::get('dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::get('livewire-todos', Todo::class);

    Route::get('todos', [TodosController::class, 'index']);
    Route::post('todos', [TodosController::class, 'store']);
    Route::get('todos/{id}/check', [TodosController::class, 'check']);
    Route::get('todos/{id}/delete', [TodosController::class, 'destroy']);
});
