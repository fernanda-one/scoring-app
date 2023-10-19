<?php

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

//Route::get('/', function () {
//    return view('login');
//});

Route::get('/score', function (){
    return view('scoring');
});

Route::post('/score-event', function (\Illuminate\Http\Request $request){
    event(new \App\Events\Scoring($request->message));
    return null;
});
Route::post('/score-update', function (\Illuminate\Http\Request $request){
    event(new \App\Events\ScoringUpdate($request->message));
    return null;
});
Route::post('/drop-verification', function (\Illuminate\Http\Request $request){
    event(new \App\Events\DropVerification($request->message));
    return null;
});
Route::get('/test',function (){
    return view('test');
});

Route::get('/register',[\App\Http\Controllers\UserController::class, 'index']);
Route::post('/register',[\App\Http\Controllers\UserController::class, 'create']);

Route::get('admin',[\App\Http\Controllers\Admin::class, 'index']);
Route::get('admin/users',[\App\Http\Controllers\Admin::class, 'getUser']);
Route::get('admin/users/{user:id}/edit',[\App\Http\Controllers\UserController::class, 'edit']);
Route::delete('admin/users/{user:id}',[\App\Http\Controllers\UserController::class, 'destroy']);

//
Route::get('/',[\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/login',[\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login',[\App\Http\Controllers\AuthController::class, 'authenticate']);
Route::get('/logout',[\App\Http\Controllers\AuthController::class, 'logout']);

Route::get('/management',[\App\Http\Controllers\UserController::class, 'index'])->middleware('auth');
Route::post('/create-user',[\App\Http\Controllers\UserController::class,'create']);
Route::put('/edit-user/{id}',[\App\Http\Controllers\UserController::class,'edit']);
Route::delete('/delete-user/{id}',[\App\Http\Controllers\UserController::class,'destroy']);

Route::get('/management/pertandingan',[\App\Http\Controllers\PartaiController::class, 'index'])->middleware('auth');
Route::post('/create-pertandingan',[\App\Http\Controllers\PartaiController::class, 'create']);
Route::put('/edit-pertandingan/{id}',[\App\Http\Controllers\PartaiController::class, 'edit']);
Route::delete('/delete-pertandingan/{id}',[\App\Http\Controllers\PartaiController::class, 'destroy']);
Route::post('/management/import-pertandingan',[\App\Http\Controllers\PartaiController::class, 'import']);

Route::get('/management/gelanggang',[\App\Http\Controllers\GelanggangController::class, 'index'])->middleware('auth');
Route::post('/management/create-gelanggang',[\App\Http\Controllers\GelanggangController::class, 'create']);
Route::put('/management/edit-gelanggang/{id}',[\App\Http\Controllers\GelanggangController::class, 'edit']);
Route::delete('/management/delete-gelanggang/{id}',[\App\Http\Controllers\GelanggangController::class, 'destroy']);

Route::get('/management/history',[\App\Http\Controllers\HistoryController::class, 'index'])->middleware('auth');

Route::get('/juri',[\App\Http\Controllers\JuriController::class, 'index']);

Route::get('/dewan',[\App\Http\Controllers\DewanController::class, 'index']);

Route::get('/papan_score',[\App\Http\Controllers\PapanScoreController::class, 'index']);

Route::get('/ketua_pertandingan',[\App\Http\Controllers\KetuaPertandingaController::class, 'index']);

Route::get('/operator',[\App\Http\Controllers\OperatorController::class, 'index']);
