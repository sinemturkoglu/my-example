<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
 
use App\Models\Blogs;
use App\Models\Category;
 

class DashboardController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $blogCount = Blogs::count();
        return view('Admin.template.dashboard' , compact('categoryCount' , 'blogCount' )  );
    }
     
}
