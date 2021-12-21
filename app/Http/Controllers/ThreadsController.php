<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\User;
use App\Models\Category;
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

    public function index(User $user, Request $request)
    {
        $user = auth()->user()->id;
        $threads = Thread::with('category')
            ->where('user_id', '=', $user)->when($request->term, function($query, $term) {
                $query->where('brand', 'LIKE', '%' . $term . '%')->orWhere('style', 'LIKE', '%' . $term . '%');
            })
            ->paginate(12);
        $categories = Category::all();
        return Inertia::render('Threads/Index', [
            'threads' => $threads,
            'categories' => $categories,
        ]);
    }

    public function category(User $user, Request $request, $category)
    {
        $user = auth()->user()->id;
        $category = Category::where('name', $category)
            ->get()
            ->pluck('id');
        $threads = Thread::where('user_id', '=', $user)
            ->where('category_id', '=', $category)
           ->when($request->term, function($query, $term) {
               $query->where('brand', 'LIKE', '%' . $term . '%')->orWhere('style', 'LIKE', '%' . $term . '%');
           })
           ->paginate(12);

        $categories = Category::all();
        return Inertia::render('Threads/Index', [
            'threads' => $threads,
            'categories' => $categories,
        ]);
    }

    // create new thread
    public function create()
    {
        $user = auth()->user()->id;
        $categories = Category::all();
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
            $category = Category::where('name', $request->category)->first();
        }
        Thread::create([
            'brand' => $request->brand,
            'size' => $request->size,
            'purchased' => $request->purchased,
            'style' => $request->style,
            'worn' => $request->worn,
            'washed' => $request->washed,
            'category_id' => $category->id,
            'user_id' => $user_id,
            'denim_weight' => $request->denim_weight,
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
        $categories = Category::all();
        return Inertia::render('Threads/Edit', [
            'threads' => Thread::with('category')->find($thread->id),
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $thread)
    {
        $request->validate([
            'brand' => 'required',
        ]);
        if ($request->category == 'add_new') {
            $category2 = $request->new_category;
        } else {
            $category2 = Category::where('name', $request->category)->first()->id;
        }
        Thread::where('id', $thread)->update([
            'brand' => $request->brand,
            'size' => $request->size,
            'purchased' => $request->purchased,
            'style' => $request->style,
            'worn' => $request->worn,
            'washed' => $request->washed,
            'category_id' => $category2,
            'denim_weight' => $request->denim_weight,
            'web_link' => $request->web_link,
        ]);

        return redirect()
            ->route('threads.category', $request->category)
            ->with('successMessage', 'Thread was successfully updated!');
    }

    // add to Wore column
    public function woreToday(Thread $thread)
    {
        $timestamp = Carbon::now();
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

    // Toggle In Fit to True
    public function addToFit(Thread $thread)
    {
        $thread->update([
            'in_fit' => true,
        ]);
        return redirect()
            ->back()
            ->with('successMessage', 'Added to Fit');
    }

    public function removeFromFit(Thread $thread)
    {
        $thread->update([
            'in_fit' => false,
        ]);
        return redirect()
            ->back()
            ->with('error', 'Removed from Fit');
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
