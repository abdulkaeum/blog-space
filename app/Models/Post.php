<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeFilter($query, array $filter)
    {
        $query->when($filter['search'] ?? false, fn($query, $search) =>
            $query->where('title', 'like' , '%'. $search .'%')
                ->orWhere('body', 'like' , '%'. $search .'%')
        );
    }
}
