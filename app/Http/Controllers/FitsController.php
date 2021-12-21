<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fit;
use App\Models\Thread;
use App\Models\User;
use App\Models\Tag;
use Inertia\Inertia;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FitsController extends Controller
{
    // show today's fit
    public function index(User $user)
    {
        $user = auth()->user()->id;
        $in_fit = Thread::where('in_fit', true)
            ->where('user_id', '=', $user)
            ->get();
        $fits = Fit::with('tags')
            ->get()
            ->groupBy(function ($date) {
                return \Carbon\Carbon::parse($date->created_at)->format('m/d/y');
            });
        $tags = Tag::all();
        return Inertia::render('Fits/Index', [
            'in_fit' => $in_fit,
            'all_fits' => $fits,
            'tags' => $tags,
        ]);
    }

    public function store(User $user, Request $request)
    {
        $user = auth()->user()->id;
        $request->validate([
            '*tag.newTag' => 'unique:tags,name',
        ]);
       
        if ($request->tag['selectedTag'] == 'add_new') {
            $tag = Tag::create([
                'name' => $request->tag['newTag'],
            ]);
            Fit::create([
                'user_id' => $user,
                'fit' => $request->current_fit,
            ])->tags()->attach($tag);
        }
        
        else {
            $tag = Tag::where('name', $request->tag)->get()->first();     
            Fit::create([
                'user_id' => $user,
                'fit' => $request->current_fit,
            ])->tags()->attach($tag);
        }
        
        foreach ($request->current_fit as $fit) {
            $update_thread = Thread::find($fit['id']);
            $today = Carbon::today()->format('m/d/y');
            if ($update_thread->worn_today === null) {
                $update_thread2 = $update_thread->update([
                    'in_fit' => false,
                    'worn_today' => Carbon::now(),
                    'worn' => DB::raw('worn + 1'),
                ]);
            } elseif (
                \Carbon\Carbon::parse($update_thread->worn_today)->format('m/d/y') ===
                $today
            ) {
                $update_thread2 = $update_thread->update([
                    'in_fit' => false,
                    'worn_today' => Carbon::now(),
                ]);
            } else {
                $update_thread2 = $update_thread->update([
                    'in_fit' => false,
                    'worn_today' => Carbon::now(),
                    'worn' => DB::raw('worn + 1'),
                ]);
            }
        }
        return redirect()
            ->back()
            ->with('successMessage', 'Added');
    }
}
