<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\User;
use Inertia\Inertia;
use DB;
use Illuminate\Support\Facades\Auth;

class ThreadsController extends Controller
{
    // view all threads
//     public function index()
//     {
//         $user_id = auth()->user()->id;
//         $user = User::find($user_id);
//         dd($user);
    // //
    // //         return Inertia::render('Threads/Index', [
    // //             'threads' => $user,
    // //         ]);
//     }

    public function index(User $user)
    {
        $user = auth()->user()->id;
        $threads = Thread::where('user_id', '=', $user)->get();
        return Inertia::render('Threads/Index', [
            'threads' => $threads,
        ]);
    }

    public function category(User $user, Request $request, $category)
    {
        $user = auth()->user()->id;
        $threads = Thread::where('user_id', '=', $user)->where('category', '=', $category)->get();

        return Inertia::render('Threads/Index', [
            'threads' => $threads,
        ]);
    }


    // create new thread
    public function create()
    {
        return Inertia::render('Threads/Create');
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'brand' => 'required',
        ]);

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        Thread::create([
            'brand' => $request->brand,
            'size' => $request->size,
            'purchased' => $request->purchased,
            'style' => $request->style,
            'worn' => $request->worn,
            'washed' => $request->washed,
            'category' => $request->category,
            'user_id' => $user_id,
        ]);

        return redirect()->back()->with('successMessage', 'Thread was succesfully added');
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
            'category' => $request->category,
        ]);

        return redirect()->route('threads.category', $thread->category)->with('successMessage', 'Thread was successfully updated!');
    }

    // add to Wore column
    public function woreToday(Thread $thread)
    {
        $thread->update([
            'worn' => DB::raw('worn + 1'),
        ]);
        return redirect()->back()->with('successMessage', 'Look at you, wearing pants today');
    }

    // add to Washed column
    public function washedToday(Thread $thread)
    {
        $thread->update([
            'washed' => DB::raw('washed + 1'),
        ]);
        return redirect()->back()->with('successMessage', 'Clean bb');
    }

    // delete existing thread
    public function destroy(Thread $thread)
    {
        $thread->delete();

        return redirect()->route('threads.index')->with('successMessage', 'Thread was successfully deleted!');
    }
}
