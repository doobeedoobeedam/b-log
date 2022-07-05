<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = [ 'id' ];

    public function getRouteKeyName() { return 'slug'; }

    public function scopeFilter($query, array $filters) {

        $query->when(isset($filters['search']) ? $filters['search'] : false, function($query, $search) {
            return $query->where('title', 'like', '%'. $search .'%')
                ->orWhere('content', 'like', '%' . $search . '%');
        });

        $query->when(isset($filters['category']) ? $filters['category'] : false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when(isset($filters['author']) ? $filters['author'] : false, function($query, $author) {
            return $query->whereHas('author', function($query) use ($author) {
                $query->where('username', $author);
            });
        });
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}