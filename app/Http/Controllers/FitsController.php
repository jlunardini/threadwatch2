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
        $in_fit = Thread::where('in_fit', true)
            ->where('user_id', '=', $user)
            ->get();
        $fits = Fit::where('user_id', '=', $user)
            ->get()
            ->sortByDesc('created_at');
        return Inertia::render('Fits/Index', [
            'in_fit' => $in_fit,
            'all_fits' => $fits,
        ]);
    }

    public function store(User $user, Request $request)
    {
        $user = auth()->user()->id;
        $in_fit = Thread::where('in_fit', true)
            ->where('user_id', '=', $user)
            ->get();
        dd($request);
        Fit::create([
            'user_id' => $user,
            'fit' => $request->mappedFits,
        ]);

        foreach ($request->mappedFits as $fit) {
            $update_thread = Thread::where('id', $fit['id'])->update([
                'in_fit' => false,
                'worn_today' => Carbon::now()->toDateTimeString(),
            ]);
        }
        return redirect()
            ->back()
            ->with('successMessage', 'Fit was succesfully added');
    }
}
