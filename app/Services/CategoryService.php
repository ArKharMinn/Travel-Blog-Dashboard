<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryService
{
    public function index()
    {
        return Category::where('status', 'active')->get();
    }

    public function category(Request $request)
    {
        return Post::with('category')->where('category_id', $request->id)->get();
    }
}
