<?php

use App\Http\Controllers\Events\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([], static function (): void {
    Route::get('events', [EventController::class, 'list'])
        ->name('api.event.list');
    Route::get('events/{slug}', [EventController::class, 'show'])
        ->name('api.event.show');
});
