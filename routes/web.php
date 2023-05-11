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
