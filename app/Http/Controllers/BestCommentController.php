<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class BestCommentController extends Controller
{
    public function store(Comment $comment)
    {
        $this->authorize('bestComment', $comment->post);

        $comment->post->best_comment_id = $comment->id;
        $comment->post->save();

        return back()->with('info','Best comment saved');
    }
}
