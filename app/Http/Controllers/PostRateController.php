<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostRateController extends Controller
{
    public function store(Post $post, $star)
    {
        $field = 'r_'.$star;
        $post->$field += 1;
        $post->save();

        return back()->with('success', 'Thanks!');
    }
}
