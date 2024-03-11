<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HogeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// JSONのデータを返すルート。indexメソッドを呼び出す
Route::get('/hoge', [HogeController::class, 'index']);

// JSONのデータを追加するルート。storeメソッドにデータを渡す
Route::post('/hoge', [HogeController::class, 'store']);

// JSONのデータを更新するルート。updateメソッドにデータを渡す
Route::put('/hoge/{id}', [HogeController::class, 'update']);

// JSONのデータを削除するルート。destroyメソッドにデータを渡す
Route::delete('/hoge/{id}', [HogeController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
