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
    $categories = \App\Models\EventCategory::all();
    $events = \App\Models\Event::orderBy('date')->take(6)->get();
    return view('index')->with(compact('categories', 'events'));
})->name('home');

Route::get('events/{category}', [\App\Http\Controllers\EventsController::class, 'index'])->name('events');
Route::get('event/{event}', [\App\Http\Controllers\EventsController::class, 'show'])->name('event');
Route::post('event/review/{event}', [\App\Http\Controllers\EventsController::class, 'storeReview'])->name('event.review');

Route::middleware('auth:admin')->prefix('admin')->as('admin.')->group(function (){
    Route::get('/dashboard', function (){
        return view('admin.index');
    });

//    Route::resource('events', 'Admin\EventsController');
});

Route::middleware('auth:agent')->prefix('agent')->as('agent.')->group(function (){
    Route::get('/dashboard', function (){
        return view('agent.index');
    })->name('dashboard');
    Route::resource('events', 'App\Http\Controllers\Agent\EventsController');
    Route::resource('questions', 'App\Http\Controllers\Agent\QuestionsController');
    Route::resource('ratings', 'App\Http\Controllers\Agent\RateController');
    Route::get('questions/create/{event}', [\App\Http\Controllers\Agent\QuestionsController::class, 'create'])->name('questions.create');
});

Route::middleware('auth')->group(function (){
    Route::get('/account', function (){
        return 'Account';
    });
});

Route::get('admin/login', [\App\Http\Controllers\AdminAuth\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [\App\Http\Controllers\AdminAuth\LoginController::class, 'login']);

Route::get('agent/login', [\App\Http\Controllers\AgentAuth\LoginController::class, 'showLoginForm'])->name('agent.login');
Route::post('agent/login', [\App\Http\Controllers\AgentAuth\LoginController::class, 'login']);

Auth::routes();

