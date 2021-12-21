<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fit;
use App\Models\Thread;
use App\Models\User;
use App\Models\Tag;
use App\Models\Category;
use Inertia\Inertia;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CategoriesController extends Controller
{
    // show  all categories
    public function show(User $user)
    {
        $user = auth()->user()->id;
        $categories = Category::get();
        return Inertia::render('Categories/Index', [
            'categories' => $categories,
        ]);
    }

    public function store(User $user, Request $request)
    {
        $request->validate([
            'name' => 'unique:categories',
        ]);
        $user = auth()->user()->id;
        $newCategory = Category::create([
            'name' => $request->name,
        ]);
        return redirect()
            ->back()
            ->with('successMessage', 'Created');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);
        if ($category) {
            $category = Category::find($id)->delete();
        }

        return redirect()
            ->back()
            ->with('successMessage', 'Deleted');
    }
}
