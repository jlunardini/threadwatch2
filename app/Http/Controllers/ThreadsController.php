<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use Inertia\Inertia;

class ThreadsController extends Controller
{
    public function index()
    {
        $threads = Thread::all();

        return Inertia::render('Threads/Index', [
            'threads' => $threads,
         ]);
    }

    public function create()
    {
        return Inertia::render('Threads/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'brand' => 'required',
       ]);

        Thread::create([
           'brand'=>$request->brand,
           'size'=>$request->size,
           'year'=>$request->year,
       ]);

        return redirect()->route('threads.index')->with('successMessage', 'Thread was succesfully added');
    }

    public function edit(Thread $thread)
    {
        return Inertia::render('Threads/Edit', [
            'threads' => $thread,
        ]);
    }


    public function update(Request $request, Thread $thread)
    {
        $request->validate([
        'brand' => 'required',
    ]);

        $thread->update([
        'brand' => $request->brand,
        'size' => $request->size,
        'year' => $request->year,
    ]);

        return redirect()->route('threads.index')->with('successMessage', 'Thread was successfully updated!');
    }

    public function destroy(Thread $thread)
    {
        $thread->delete();

        return redirect()->route('threads.index')->with('successMessage', 'Thread was successfully deleted!');
    }
}
