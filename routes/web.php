<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PlayerController;

Route::get('/', function () {
    return view('auth.login');
});

/*Route::get('/empleado', function () {
    return view('empleado.index');
});
Route::get('/empleado/create', [EmpleadoController::class, 'create']);
*/
Route::resource('empleado', EmpleadoController::class)->middleware('auth');

Auth::routes(['register'=>true, 'reset'=>false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::resource('player', PlayerController::class)->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [PlayerController::class, 'index'])->name('home');
});
