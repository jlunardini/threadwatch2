<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\User;
use Inertia\Inertia;
use DB;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    // show user profiles
    public function profile(User $user, $profile)
    {
        $user = User::select('id')->where('username', $profile)->first();
        $threads = Thread::where('user_id', '=', $user->id)->get();
        return Inertia::render('Feed/Profile', [
            'threads' => $threads,
            'user' => $profile,
        ]);
    }

    public function feed(User $user) {
        $users = User::with('threads')->get();
        return Inertia::render('Feed/Index', [
            'users' => $users,
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('successMessage', "You're outta here!");
    }
}
