<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'image',
        'is_active',
        'sort',
    ];
    public function blogs()
    {
        return $this->belongsToMany(Blogs::class, 'blog_category', 'category_id', 'blog_id');
    }
 
}

