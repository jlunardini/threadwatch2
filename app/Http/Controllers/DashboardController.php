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
        $most_worn = Thread::orderBy('worn', 'desc')->take(5)->get();
        return Inertia::render('Dashboard', [
            'threads' => $most_worn,
        ]);
    }
}
