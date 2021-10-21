<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class TagController extends Controller
{
    public function index(Tag $tag)
    {
        return view('posts.index', [
            'posts' => new Paginator($tag->posts->where('status','live')->sortByDesc('created_at'), 10)
        ]);
    }
}
