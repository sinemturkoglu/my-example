<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
    
    public function index()
    {
        $categories = Category::query()
            ->where('is_active' , 1)
            ->orderBy('sort', 'asc')
            ->paginate(15);  

        return view('Front.template.index'  , compact('categories') );
    }
    
}
