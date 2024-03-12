<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

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
    return view('welcome');
});

// personsのpageを表示する
Route::get('/persons', [PersonController::class, 'index']);

// personsの新規登録画面を表示する
Route::get('/persons/create', [PersonController::class, 'create'])->name('persons.create');

// personsの新規登録処理をする
Route::post('/persons', [PersonController::class, 'store'])->name('persons.store');

// personsの編集画面を表示する
Route::get('/persons/{id}/edit', [PersonController::class, 'edit'])->name('persons.edit');

// 更新の処理をする
Route::put('/persons/{id}', [PersonController::class, 'update'])->name('persons.update');

// personsの削除処理をする
Route::delete('/persons/{id}', [PersonController::class, 'destroy'])->name('persons.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
