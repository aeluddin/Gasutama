<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Profile_proyek extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['category', 'images'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search)=>
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%')
        );

        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->Where('name', $category);
            });
        });
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
