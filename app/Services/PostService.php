<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\Request;

class PostService
{
    public function index()
    {
        return Post::where('status', 'active')->with('category')->get();
    }

    public function detail(Request $request)
    {
        return Post::with(['category', 'comments', 'comments.user'])->find($request->id);
    }

    public function search(Request $request)
    {
        return Post::with('category')->where('title', 'like', '%' . $request->search . '%');
    }

    public function about()
    {
        return Post::where('status', 'active')
            ->with('category')
            ->latest()
            ->take(3)
            ->get();
    }
}
