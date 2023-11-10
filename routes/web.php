<?php

use App\Http\Controllers\PuppeteerController;
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
Route::post('/operator-update', function (\Illuminate\Http\Request $request){
    event(new \App\Events\Operator($request->message));
    return null;
});
Route::post('/ketua-pertandingan-update', function (\Illuminate\Http\Request $request){
    event(new \App\Events\KetuaPertandingan($request->message));
    return null;
});
Route::post('/verif-update', function (\Illuminate\Http\Request $request){
    event(new \App\Events\Operator($request->message));
    return null;
});
Route::post('/penalty', function (\Illuminate\Http\Request $request){
    event(new \App\Events\IndicatorPelanggaran($request->message));
    return null;
});

Route::get('/capture-screenshot', [PuppeteerController::class, 'captureScreenshot']);
Route::get('/register',[\App\Http\Controllers\UserController::class, 'index']);
Route::post('/register',[\App\Http\Controllers\UserController::class, 'create']);

Route::get('admin',[\App\Http\Controllers\Admin::class, 'index'])->middleware('auth');
Route::get('admin/users',[\App\Http\Controllers\Admin::class, 'getUser'])->middleware('auth');
Route::get('admin/users/{user:id}/edit',[\App\Http\Controllers\UserController::class, 'edit'])->middleware('auth');
Route::delete('admin/users/{user:id}',[\App\Http\Controllers\UserController::class, 'destroy'])->middleware('auth');

Route::get('/',[\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/login',[\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login',[\App\Http\Controllers\AuthController::class, 'authenticate']);
Route::post('/logout',[\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::get('/management',[\App\Http\Controllers\UserController::class, 'index'])->middleware('auth');
Route::post('/create-user',[\App\Http\Controllers\UserController::class,'create'])->middleware('auth');
Route::put('/edit-user/{id}',[\App\Http\Controllers\UserController::class,'edit'])->middleware('auth');
Route::delete('/delete-user/{id}',[\App\Http\Controllers\UserController::class,'destroy'])->middleware('auth');

Route::get('/management/pertandingan',[\App\Http\Controllers\PartaiController::class, 'index'])->middleware('auth')->middleware('auth');
Route::post('/create-pertandingan',[\App\Http\Controllers\PartaiController::class, 'create'])->middleware('auth');
Route::put('/edit-pertandingan/{id}',[\App\Http\Controllers\PartaiController::class, 'edit'])->middleware('auth');
Route::delete('/delete-pertandingan/{id}',[\App\Http\Controllers\PartaiController::class, 'destroy'])->middleware('auth');
Route::post('/management/import-pertandingan',[\App\Http\Controllers\PartaiController::class, 'import'])->middleware('auth');

Route::get('/management/gelanggang',[\App\Http\Controllers\GelanggangController::class, 'index'])->middleware('auth')->middleware('auth');
Route::post('/management/create-gelanggang',[\App\Http\Controllers\GelanggangController::class, 'create'])->middleware('auth');
Route::put('/management/edit-gelanggang/{id}',[\App\Http\Controllers\GelanggangController::class, 'edit'])->middleware('auth');
Route::delete('/management/delete-gelanggang/{id}',[\App\Http\Controllers\GelanggangController::class, 'destroy'])->middleware('auth');

Route::get('/management/history',[\App\Http\Controllers\HistoryController::class, 'index'])->middleware('auth')->middleware('auth');
Route::post('/create-history',[\App\Http\Controllers\HistoryController::class, 'create'])->middleware('auth')->middleware('auth');

Route::get('/juri',[\App\Http\Controllers\JuriController::class, 'index'])->middleware('auth');

Route::get('/dewan',[\App\Http\Controllers\DewanController::class, 'index'])->middleware('auth');

Route::get('/papan_score',[\App\Http\Controllers\PapanScoreController::class, 'index'])->middleware('auth');

Route::get('/ketua_pertandingan',[\App\Http\Controllers\KetuaPertandingaController::class, 'index'])->middleware('auth');

Route::get('/operator',[\App\Http\Controllers\OperatorController::class, 'index'])->middleware('auth');

Route::get('/download/partai',[\App\Http\Controllers\Data::class,'getDownloadExcel']);
