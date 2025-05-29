<?php

namespace App\Services;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentService
{
    public function add(CommentRequest $request)
    {
        return Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $request->get('post_id'),
            'content' => $request->get('content')
        ]);
    }
}
