<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use Inertia\Inertia;
use DB;

class ThreadsController extends Controller
{

    // view all threads
    public function index()
    {
        $threads = Thread::all();

        return Inertia::render('Threads/Index', [
            'threads' => $threads,
        ]);
    }

    // create new thread
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
            'brand' => $request->brand,
            'size' => $request->size,
            'purchased' => $request->purchased,
            'style' => $request->style,
            'worn' => $request->worn,
            'washed' => $request->washed,
        ]);

        return redirect()->route('threads.index')->with('successMessage', 'Thread was succesfully added');
    }


    // edit existing
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
            'purchased' => $request->purchased,
            'style' => $request->style,
            'worn' => $request->worn,
            'washed' => $request->washed,
        ]);

        return redirect()->route('threads.index')->with('successMessage', 'Thread was successfully updated!');
    }

    // add to Wore column
    public function woreToday(Thread $thread) {
        $thread->update([
           'worn' => DB::raw('worn + 1'),
        ]);
        return redirect()->route('threads.index')->with('successMessage', 'Look at you, wearing pants today');
    }

    // add to Washed column
    public function washedToday(Thread $thread) {
        $thread->update([
           'washed' => DB::raw('washed + 1'),
        ]);
        return redirect()->route('threads.index')->with('successMessage', 'Clean bb');
    }

    // delete existing thread
    public function destroy(Thread $thread)
    {
        $thread->delete();

        return redirect()->route('threads.index')->with('successMessage', 'Thread was successfully deleted!');
    }
}
