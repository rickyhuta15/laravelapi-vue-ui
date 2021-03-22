<?php

use App\Http\Controllers\LatihanController;
use App\Http\Controllers\GroupsController;
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
//Route::get('/friends', [LatihanController::class, 'index']);
//Route::get('/friends/create', [LatihanController::class, 'create']);
//Route::post('/friends', [LatihanController::class, 'store']);
//Route::get('/friends/{id}', [LatihanController::class, 'show']);
//Route::get('/friends/{id}/edit', [LatihanController::class, 'edit']);
//Route::put('/friends/{id}', [LatihanController::class, 'update']);
//Route::delete('/friends/{id}', [LatihanController::class, 'destroy']);

//Route::resource('friends', LatihanController::class);

//route resource di atas bisa digunakan untuk mewakili semua route yang telah dicoba sebelumnya
//dari index sampai destroy, tapi hanya satu controller, untuk >1 controller maka seperti ini :
//untuk membuat controller secara instan bisa menggunakan terminal dengan perintah :
// php artisan make:controller namacontroller --resource
Route::resources([
    'friends' => LatihanController::class,
    'groups' => GroupsController::class,
]);

Route::get('/groups/addmember/{group}', [GroupsController::class, 'addmember']);
Route::put('/groups/updatemember/{group}', [GroupsController::class, 'updatemembers']);
Route::put('/groups/deletemember/{group}', [GroupsController::class, 'deletemembers']);
