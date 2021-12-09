<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\User;
use App\Models\Fit;
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
        $most_worn = Thread::where('user_id', '=', $user)
            ->orderBy('worn', 'desc')
            ->take(6)
            ->get();
        $thread_count_total = Thread::where('user_id', '=', $user)->count();
        $jeans = Thread::where('user_id', '=', $user)
            ->where('category', '=', 'jeans')
            ->count();
        $tops = Thread::where('user_id', '=', $user)
            ->where('category', '=', 'tops')
            ->count();
        $kicks = Thread::where('user_id', '=', $user)
            ->where('category', '=', 'kicks')
            ->count();
        $fits = Fit::where('user_id', '=', $user)
            ->take(3)
            ->get();
        return Inertia::render('Dashboard', [
            'threads' => $most_worn,
            'thread_count_total' => $thread_count_total,
            'jeans' => $jeans,
            'tops' => $tops,
            'kicks' => $kicks,
            'all_fits' => $fits,
        ]);
    }
}
