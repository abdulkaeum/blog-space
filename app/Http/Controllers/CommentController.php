<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'body' => ['required']
        ]);

        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'body' => $request->input('body')
        ]);

        return back()->with('success', 'Thanks for participating!');
    }
}
