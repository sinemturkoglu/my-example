<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Category;

class BlogController extends Controller
{
    
    public function index($link)
    {
        $category = Category::where('slug', $link)
            ->where('is_active', 1)
            ->firstOrFail();

        $blogs = $category->blogs()
            ->where('is_active', 1)
            ->orderBy('sort')
            ->paginate(25);
 
        return view('Front.template.Blog.index'  , compact('category', 'blogs') );
    }

    public function detail(Category $category, Blogs $blog)
    {
        return view('Front.template.Blog.detail', [ 'category' => $category, 'blog' => $blog ]);
    }
    
}
