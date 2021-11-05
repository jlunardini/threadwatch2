<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\User;
use Inertia\Inertia;
use DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(User $user)
    {
        $user = auth()->user()->id;
        $most_worn = Thread::where('user_id', '=', $user)->orderBy('worn', 'desc')->take(5)->get();
        $thread_count_total = Thread::where('user_id', '=', $user)->count();
        $jeans = Thread::where('user_id', '=', $user)->where('category', '=', 'jeans')->count();
        $tops = Thread::where('user_id', '=', $user)->where('category', '=', 'tops')->count();
        $kicks = Thread::where('user_id', '=', $user)->where('category', '=', 'kicks')->count();
        return Inertia::render('Dashboard', [
            'threads' => $most_worn,
            'thread_count_total' => $thread_count_total,
            'jeans' => $jeans,
            'tops' => $tops,
            'kicks' => $kicks,
        ]);
    }
}
