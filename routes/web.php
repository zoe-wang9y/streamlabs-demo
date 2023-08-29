<?php

use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', function() {
    // hard-code user_id as test user for now
    $user_id = 2;
    $user_name = 'Lily';
    
    // query some events to display when launching the UI
    // for now just read data from first page
    $page = 0;
    $controller = new EventsController();
    $events = $controller->getFormattedEvents($user_id, $page);

    return view('home')->with('user_id', $user_id)->with('user_name', $user_name)->with('events', $events);
});
