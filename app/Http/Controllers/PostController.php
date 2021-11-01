<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => $this->getPosts()
        ]);
    }

    public function show(Post $post)
    {
        $post->views += 1;
        $post->save();

        return view('posts.show', [
            'profile' => auth()->user()->profile,
            'post' => $post->load(['tags']),
            'relatedPosts' => Post::whereHas('tags', fn($query) => $query->whereIn('tags.id', $post->tags->pluck('id')))
                ->where('posts.id', '!=', $post->id)
                ->where('status', 'live')
                ->orderByDesc('created_at')
                ->take(4)
                ->get()
        ]);
    }

    public function search(Request $request)
    {
        return view('posts.index', [
            'posts' => $this->getPosts(),
            'searchString' => $request->input('search')
        ]);
    }

    public function getPosts()
    {
        return Post::latest()
            ->filter(request(['search']))
            ->where('status', 'live')
            ->with(['tags', 'author'])
            ->paginate(10);
    }
}
