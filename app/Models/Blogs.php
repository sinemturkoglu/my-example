<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blogs extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content', 'is_active', 'sort'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_category', 'blog_id', 'category_id');
    }
}