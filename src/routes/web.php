<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Events\EventController;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'list']) ->name('main');

Route::prefix('events')->group(function () {
    Route::get('/', [EventController::class, 'list']) ->name('event.list');
    Route::get('/add', [EventController::class, 'add']) ->name('event.add');
    Route::post('/add', [EventController::class, 'addEvent']) ->name('add.event');
    Route::get('/assessment', [EventController::class, 'assessment']) ->name('event.assessment');
    Route::get('/{slug}', [EventController::class, 'show']) ->name('event.show');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



