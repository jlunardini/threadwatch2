<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Thread;

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


Route::get('/test-create', function () {
    Thread::create([
        'year' => '2021',
        'brand' => 'Levis',
        'size' => '30'
    ]);
});

Route::get('/threads', function () {
    $threads = Thread::all();
    return Inertia::render('Threads', [
        'threads' => $threads
    ]);
})->name('threads');

Route::get('/threads/{id}', function ($id) {
    $thread = Thread::where('id', $id)->first();
    return Inertia::render('Thread', [
        'thread' => $thread
    ]);
})->name('threads.single');

Route::post('/threads', function () {
    return 'creating a thread';
});
