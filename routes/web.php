<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::get('/threads', 'App\Http\Controllers\ThreadsController@index')->name('threads.index');
Route::get('/threads/create', 'App\Http\Controllers\ThreadsController@create')->name('threads.create');
Route::post('/threads', 'App\Http\Controllers\ThreadsController@store')->name('threads.store');
Route::get('/threads/{thread}/edit', 'App\Http\Controllers\ThreadsController@edit')->name('threads.edit');
Route::patch('/threads/{thread}', 'App\Http\Controllers\ThreadsController@update')->name('threads.update');
Route::delete('/threads/{thread}', 'App\Http\Controllers\ThreadsController@destroy')->name('threads.destroy');
