<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortoDesain extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['images'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search)=>
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('category', 'like', '%' . $search . '%')
                  ->orWhere('slug', 'like', '%' . $search . '%')
        );
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
