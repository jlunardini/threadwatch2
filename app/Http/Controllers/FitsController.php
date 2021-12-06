<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fit;
use App\Models\Thread;
use App\Models\User;
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
        $threads = Thread::whereDate('worn_today', Carbon::today())
            ->where('user_id', '=', $user)
            ->get();
        $fits = Fit::where('user_id', '=', $user)
            ->get()
            ->sortBy('created_at');
        return Inertia::render('Fits/Index', [
            'threads' => $threads,
            'all_fits' => $fits,
        ]);
    }

    public function store(User $user, Request $request)
    {
        $user = auth()->user()->id;
        $threads = Thread::whereDate('updated_at', Carbon::today())
            ->where('user_id', '=', $user)
            ->get();
        Fit::create([
            'user_id' => $user,
            'fit' => $threads,
        ]);
        return redirect()
            ->back()
            ->with('successMessage', 'Fit was succesfully added');
    }
}
