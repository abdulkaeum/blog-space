<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'image'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false, fn($query, $search) =>
            $query->where('title', 'like' , '%'. $search .'%')
                ->orWhere('body', 'like' , '%'. $search .'%')
                ->orWhereHas('author', fn($query) =>
                    $query->where('name', 'like', '%'. $search .'%'))
                ->orWhereHas('tags', fn($query) =>
                    $query->where('name', 'like', '%'. $search.'%')
            )
        );
    }
}
