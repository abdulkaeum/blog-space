<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class BookmarkController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => new Paginator(auth()->user()->bookmarks, 10)
        ]);
    }

    public function store(Post $post)
    {
        if (auth()->user()->bookmarks->where('id', $post->id)->count()) {
            auth()->user()->bookmarks()->detach($post->id);
            return back()->with('success', 'Bookmark removed');
        } else {
            auth()->user()->bookmarks()->attach($post->id);
            return back()->with('success', 'Post Bookmarked');
        }
    }
}
