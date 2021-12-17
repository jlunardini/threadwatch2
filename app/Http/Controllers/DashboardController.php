<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\User;
use App\Models\Fit;
use App\Models\Category;
use Inertia\Inertia;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Arr;

class DashboardController extends Controller
{
    public function index(User $user)
    {
        $user = auth()->user()->id;
        $most_worn_total = Thread::where('user_id', '=', $user)
            ->orderBy('worn', 'desc')
            ->take(5)
            ->get();

        $most_worn_last_month = Thread::where(
            DB::raw('MONTH(created_at)'),
            '=',
            date('n')
        )->get();

        $thread_count_total = Thread::where('user_id', '=', $user)->count();

        $fits = Fit::with('tags')
            ->where('user_id', $user)
            ->get()
            ->groupBy(function ($date) {
                return \Carbon\Carbon::parse($date->created_at)->format('m/d/y');
            });

        $categories = Category::with('threads')->get();
        return Inertia::render('Dashboard', [
            'threads' => $most_worn_total,
            'thread_count_total' => $thread_count_total,
            'thread_categories' => $categories,
            'all_fits' => $fits,
        ]);
    }
}
