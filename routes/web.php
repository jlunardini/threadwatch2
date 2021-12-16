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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/threads', 'App\Http\Controllers\ThreadsController@index')->name(
        'threads.index'
    );
    Route::get('/threads/create', 'App\Http\Controllers\ThreadsController@create')->name(
        'threads.create'
    );
    Route::post('/threads', 'App\Http\Controllers\ThreadsController@store')->name(
        'threads.store'
    );
    Route::get(
        '/threads/{thread}/edit',
        'App\Http\Controllers\ThreadsController@edit'
    )->name('threads.edit');
    Route::patch(
        '/threads/{thread}',
        'App\Http\Controllers\ThreadsController@update'
    )->name('threads.update');
    Route::patch(
        '/threads/{thread}/woreToday',
        'App\Http\Controllers\ThreadsController@woreToday'
    )->name('threads.wore');
    Route::patch(
        '/threads/{thread}/addToFit',
        'App\Http\Controllers\ThreadsController@addToFit'
    )->name('threads.addToFit');
    Route::patch(
        '/threads/{thread}/removeFromFit',
        'App\Http\Controllers\ThreadsController@removeFromFit'
    )->name('threads.removeFromFit');
    Route::patch(
        '/threads/{thread}/washedToday',
        'App\Http\Controllers\ThreadsController@washedToday'
    )->name('threads.washed');
    Route::delete(
        '/threads/{thread}/delete',
        'App\Http\Controllers\ThreadsController@destroy'
    )->name('threads.destroy');

    // Categories
    Route::get(
        '/threads/categories/{category}',
        'App\Http\Controllers\ThreadsController@category'
    )->name('threads.category');

    //Social
    Route::get('/user/{profile}', 'App\Http\Controllers\SocialController@profile')->name(
        'social.profile'
    );
    Route::get('/feed', 'App\Http\Controllers\SocialController@feed')->name(
        'social.feed'
    );

    //Fits
    Route::get('/fits', 'App\Http\Controllers\FitsController@index')->name('fits.index');
    Route::post('/fits/save', 'App\Http\Controllers\FitsController@store')->name(
        'fits.store'
    );

    // ChangeLog
    Route::get('/changelog', function () {
        return Inertia::render('Changelog/Index');
    })->name('changelog.show');
});

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', 'App\Http\Controllers\DashboardController@index')
    ->name('dashboard');

Route::get('/logout', 'App\Http\Controllers\SocialController@logout')->name('logout');
