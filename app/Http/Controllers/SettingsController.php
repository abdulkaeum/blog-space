<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index', [
            'posts' => Post::paginate(10)
        ]);
    }

    public function create()
    {
        return view('settings.create', [
            'tags' => $this->getTags()
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'     => ['required', 'min:5', 'max:20', Rule::unique('posts', 'title')],
            'excerpt'   => ['required', 'min:5', 'max:20'],
            'body'      => ['required', 'min:5'],
            'thumbnail' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
            'tags'      => ['required', Rule::exists('tags','id')],
        ]);

        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['image'] = Str::slug($attributes['title']);

        $post = auth()->user()->posts()->create(
            Arr::except($attributes, ['tags','thumbnail'])
        );

        $post->tags()->attach($attributes['tags']);

        $post->image = $request->file('thumbnail')->store('thumbnail');
        $post->save();

        return redirect()->route('settings.index')->with('success', 'Post added');
    }

    public function edit(Post $post)
    {
        if(! Gate::allows('edit-post', $post)){
            abort(403);
        }

        return view('settings.edit', [
            'post' => $post,
            'tags' => $this->getTags(),
            'postTags' => $post->tags->pluck('id')->toArray()
        ]);
    }

    public function update(Post $post, Request $request)
    {
        $attributes = $request->validate([
            'title'     => ['required', 'min:5', 'max:20', Rule::unique('posts', 'title')->ignore($post)],
            'excerpt'   => ['required', 'min:5', 'max:20'],
            'body'      => ['required', 'min:5'],
            'thumbnail' => ['image', 'mimes:jpg,png,jpeg,gif,svg'],
            'tags'      => ['required', Rule::exists('tags','id')],
        ]);

        $attributes['slug'] = Str::slug($attributes['title']);

        $post->update($attributes);

        $post->tags()->sync($attributes['tags']);

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
}
