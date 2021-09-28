<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'thumbnail', 'title', 'slug','content', 'published_at', 'category_id'
    ];
    protected $casts = [
        'published_at' => 'datetime',
    ];
    public function scopeFilter($query, array $filters) { // Post::newQuery()->first()
        $query->when($filters['search'] ?? false, fn($query, $search) => 
            $query
            ->where('title', 'like', '%'.$search.'%')
            ->orWhere('content', 'like', '%'.$search.'%'));

        $query->when($filters['category'] ?? false, fn($query,  $category) => 
            // $query
            // ->whereExists(fn($query) => 
            //     $query->from('categories')
            //         ->whereColumn('categories.id', 'posts.category_id')
            //         ->where('categories.slug', $category))
            // );
        $query->whereHas('category', fn ($query) => $query->where('slug', $category)));
        
        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn ($query) =>
                $query->where('username', $author)
            )
        );
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    // public function setPublishedAtAttribute() {
    //     $this->attributes['slug'] = now();
    // }

}
