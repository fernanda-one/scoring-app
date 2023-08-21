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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-event', function () {
    event(new \App\Events\ChatMessageEvent('tes'));
//    broadcast(new \App\Events\helloEvent());
});

Route::get('/ws', function (){
    return view('websocket');
});

Route::post('/chat-message', function (\Illuminate\Http\Request $request){
    event(new \App\Events\ChatMessageEvent($request->message));
    return null;
});

Route::get('/score', function (){
    return view('scoring');
});

Route::post('/score-event', function (\Illuminate\Http\Request $request){
    event(new \App\Events\Scoring($request->message));
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
Route::get('/login',[\App\Http\Controllers\AuthController::class, 'index']);
Route::post('/login',[\App\Http\Controllers\AuthController::class, 'authenticate']);

Route::get('/management',[\App\Http\Controllers\UserController::class, 'index']);

Route::get('/management/peserta',[\App\Http\Controllers\PesertaController::class, 'index']);

Route::get('/management/pertandingan',[\App\Http\Controllers\PertandinganController::class, 'index']);
