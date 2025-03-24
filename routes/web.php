<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\ThreatController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\ObserverController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\ObservationController;
use App\Http\Controllers\PositionReliefController;
use App\Http\Controllers\UndesiredStateController;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/units', UnitController::class);
    Route::resource('/divisions', DivisionController::class);
    Route::resource('/observers', ObserverController::class);
    Route::resource('/programme', ProgrammeController::class);
    Route::resource('/ses', SessionController::class);
    Route::resource('/obs', ObservationController::class);
    Route::resource('/pr', PositionReliefController::class);
    Route::resource('/t', ThreatController::class);
    Route::resource('/e', ErrorController::class);
    Route::resource('/ud', UndesiredStateController::class);
    Route::get('/admin', function () {return view('admin.index');})->name('admin');
    Route::get('/noss', function () {return view('noss.index');})->name('noss');
});
