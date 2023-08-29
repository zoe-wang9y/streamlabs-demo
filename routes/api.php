<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\StatsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// api stubs
Route::get('events/', [EventsController::class, 'getEvents']);
Route::patch('events/{event_id}', [EventsController::class, 'markEvent']); 

Route::get('stats/{user_id}/follower', [StatsController::class, 'getFollowerStats']);
Route::get('stats/{user_id}/saleItems', [StatsController::class, 'getSaleItemStats']);
Route::get('stats/{user_id}/revenue',  [StatsController::class, 'getRevenueStats']);

