<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index', [
            'posts' => Post::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('settings.create', [
            'tags' => $this->getTags(),
            'users' => $this->getAuthors()
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'     => ['required', 'min:5', 'max:80', Rule::unique('posts', 'title')],
            'excerpt'   => ['required', 'min:5', 'max:300'],
            'body'      => ['required', 'min:5'],
            'thumbnail' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
            'tags'      => ['required', Rule::exists('tags','id')],
            'status'    => ['required', Rule::in('live','draft')],
            'author'    => ['required', Rule::exists('users', 'id')]
        ]);

        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['image'] = Str::slug($attributes['title']);
        $attributes['user_id'] = $attributes['author'];

        $post = Post::create(Arr::except($attributes, ['tags','thumbnail']));

        $post->tags()->attach($attributes['tags']);

        $post->image = $request->file('thumbnail')->store('thumbnail');
        $post->save();

        return redirect()->route('settings.index')->with('success', 'Post added');
    }

    public function edit(Post $post)
    {
        return view('settings.edit', [
            'post' => $post,
            'tags' => $this->getTags(),
            'postTags' => $post->tags->pluck('id')->toArray(),
            'users' => $this->getAuthors()
        ]);
    }

    public function update(Post $post, Request $request)
    {
        $attributes = $request->validate([
            'title'     => ['required', 'min:5', 'max:80', Rule::unique('posts', 'title')->ignore($post)],
            'excerpt'   => ['required', 'min:5', 'max:300'],
            'body'      => ['required', 'min:5'],
            'thumbnail' => ['image', 'mimes:jpg,png,jpeg,gif,svg'],
            'tags'      => ['required', Rule::exists('tags','id')],
            'status'    => ['required', Rule::in('live','draft')],
            'author'    => ['required', Rule::exists('users', 'id')]
        ]);

        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['user_id'] = $attributes['author'];

        $post->update($attributes);

        $post->tags()->sync($attributes['tags']);

        if($request->file('thumbnail')) {
            Storage::disk('public')->delete($post->image);
            $post->image = $request->file('thumbnail')?->store('thumbnail');
            $post->save();
        }

        return redirect()->route('settings.index')->with('success', 'Post updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('settings.index')->with('success', 'Post Deleted');
    }

    public function getTags()
    {
        return Tag::all()->sortBy('name');
    }

    public function getAuthors()
    {
        return User::select('name','id')->get();
    }
}
