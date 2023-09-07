<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareaController;
use Illuminate\Support\Facades\Route;
use App\Models\Tarea;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*Route::get('/', function () {
    return view('tareas');
});*/

Route::get('/', function () {
    $tareas = Tarea::all();
    return view('tareas', ['tareas' => $tareas]);
   })->name('tareas');

Route::post(
    '/tareas',
    [TareaController::class, 'create']
   )->name('tarea.create');
Route::delete(
    '/tarea/{id}',
    [TareaController::class, 'delete']
   )->name('tarea.delete');


Route::get('/privado', function () {
    return view('privado');
})->middleware(['auth', 'verified'])->name('privado');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
