<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(User $user)
    {
        auth()->user()->following()->toggle($user->profile->id);

        return back();
    }
}
