<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('user.index', [
            'user' => $user,
            'profile' => $user->profile,
            'following' => auth()->user()?->following->contains('user_id', $user->id) ? true : false
        ]);
    }

    public function edit(Profile $profile)
    {
        return view('user.edit', [
            'profile' => $profile
        ]);
    }

    public function update(Profile $profile, Request $request)
    {
        $request->validate([
            'username'  => ['required'],
            'url'       => ['nullable', 'url'],
            'image'     => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
        ]);

        $profile->update([
            'username' => $request->input('username'),
            'url' => $request->input('url'),
            'description' => $request->input('description')
        ]);

        if($request->file('image')){
            !is_null($profile->image) ? Storage::disk('public')->delete($profile->image) : false;
            $profile->image = $request->file('image')?->store('profile');
            $profile->save();
        }

        return redirect()->route('profile.index', auth()->user()->id)->with('success', 'Profile updated');
    }
}
