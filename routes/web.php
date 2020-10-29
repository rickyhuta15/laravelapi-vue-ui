<?php

use App\Http\Controllers\LatihanController;
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

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/testing', function () {
    return view('testing');
});

Route::get('/testing/{no}', [LatihanController::class, 'testing']);

/*
|
// Setiap ada controller baru, maka harus ditambahkan use App/Http..... di bawah <?php
|
Route::get('/test', [LatihanController::class, 'index']);
Route::get('/test/{ke}', [LatihanController::class, 'urutan']);
*/
Route::get('', [LatihanController::class, 'index']);
Route::get('/friends', [LatihanController::class, 'index']);
Route::get('/friends/create', [LatihanController::class, 'create']);
Route::post('/friends', [LatihanController::class, 'store']);
Route::get('/friends/{id}', [LatihanController::class, 'show']);
Route::get('/friends/{id}/edit', [LatihanController::class, 'edit']);
Route::put('/friends/{id}', [LatihanController::class, 'update']);
Route::delete('/friends/{id}', [LatihanController::class, 'destroy']);