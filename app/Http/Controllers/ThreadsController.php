<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\User;
use Inertia\Inertia;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        $categories = Thread::select('category')
            ->where('user_id', $user)
            ->groupBy('category')
            ->get();
        return Inertia::render('Threads/Index', [
            'threads' => $threads,
            'categories' => $categories,
        ]);
    }

    public function category(User $user, Request $request, $category)
    {
        $user = auth()->user()->id;
        $threads = Thread::where('user_id', '=', $user)
            ->where('category', '=', $category)
            ->get();
        $categories = Thread::select('category')
            ->where('user_id', $user)
            ->groupBy('category')
            ->get();
        return Inertia::render('Threads/Index', [
            'threads' => $threads,
            'categories' => $categories,
        ]);
    }

    // create new thread
    public function create()
    {
        $user = auth()->user()->id;
        $categories = Thread::select('category')
            ->where('user_id', '=', $user)
            ->groupBy('category')
            ->get();
        return Inertia::render('Threads/Create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'brand' => 'required',
        ]);
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $category = $request->category;
        if ($category == 'add_new') {
            $category = $request->new_category;
        } else {
            $category = $request->category;
        }
        Thread::create([
            'brand' => $request->brand,
            'size' => $request->size,
            'purchased' => $request->purchased,
            'style' => $request->style,
            'worn' => $request->worn,
            'washed' => $request->washed,
            'category' => $category,
            'user_id' => $user_id,
            'denim_weight' => $request->denim_weight + 'OZ',
            'web_link' => $request->web_link,
        ]);

        return redirect()
            ->route('threads.category', $request->category)
            ->with('successMessage', 'Thread was succesfully added');
    }

    // edit existing
    public function edit(Thread $thread)
    {
        $user = auth()->user()->id;
        $categories = Thread::select('category')
            ->where('user_id', $user)
            ->groupBy('category')
            ->get();
        return Inertia::render('Threads/Edit', [
            'threads' => $thread,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Thread $thread)
    {
        $request->validate([
            'brand' => 'required',
        ]);

        $category = $request->category;
        if ($category == 'add_new') {
            $category = $request->new_category;
        } else {
            $category = $request->category;
        }

        $thread->update([
            'brand' => $request->brand,
            'size' => $request->size,
            'purchased' => $request->purchased,
            'style' => $request->style,
            'worn' => $request->worn,
            'washed' => $request->washed,
            'category' => $category,
            'denim_weight' => $request->denim_weight . 'OZ',
            'web_link' => $request->web_link,
        ]);

        return redirect()
            ->route('threads.category', $thread->category)
            ->with('successMessage', 'Thread was successfully updated!');
    }

    // add to Wore column
    public function woreToday(Thread $thread)
    {
        $timestamp = Carbon::now()->toDateTimeString();
        $thread->update([
            'worn' => DB::raw('worn + 1'),
            'worn_today' => $timestamp,
        ]);
        return redirect()
            ->back()
            ->with('successMessage', 'Look at you, wearing pants today');
    }

    // add to Washed column
    public function washedToday(Thread $thread)
    {
        $thread->update([
            'washed' => DB::raw('washed + 1'),
        ]);
        return redirect()
            ->back()
            ->with('successMessage', 'Clean bb');
    }

    // delete existing thread
    public function destroy(Thread $thread)
    {
        $thread->delete();

        return redirect()
            ->route('threads.index')
            ->with('successMessage', 'Thread was successfully deleted!');
    }
}
