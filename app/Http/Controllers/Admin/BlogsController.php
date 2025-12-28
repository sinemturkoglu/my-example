<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blogs;
use App\Models\Category;
use Illuminate\Validation\Rule;

class BlogsController extends Controller
{
    public function create()
    {
        $categories = Category::where( 'is_active' , 1)  
                          ->orderBy('id', 'asc')
                          ->get();
        return view('Admin.template.Blog.create' , compact("categories") );
    }
    public function store(Request $request)
    {  
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:blogs,slug|max:255',
            'content' => 'required|string',
            'sort' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
            'blog_category' => 'required|array|min:1',
            'blog_category.*' => 'exists:categories,id'
        ], [
          
            'title.required' => 'Başlık alanı zorunludur.',
            'slug.required' => 'Slug alanı zorunludur.',
            'slug.unique' => 'Bu slug daha önce kullanılmış.',
            'content.required' => 'Açıklama alanı zorunludur.',
            'blog_category.required' => 'En az bir kategori seçmelisiniz.',
            'blog_category.min' => 'En az bir kategori seçmelisiniz.',
            'blog_category.*.exists' => 'Seçilen kategori geçersiz.',
        ]);
        $blog = Blogs::create($validated);
        $blog->categories()->attach($request->blog_category);

      
        return response()->json([
            'status' => true,
            'message' => 'Blog eklendi'
        ]);
    }
    public function index()
    {
        $blogs = Blogs::with('categories') // Eager loading
              ->orderBy('sort', 'asc')
              ->paginate(10);
 
        return view('Admin.template.Blog.index' , compact('blogs'));
    }
    public function destroy(Blogs $blog)
    { 
        try {
            $blog->delete();
            return redirect()->route('blog.index')
                    ->with('success', 'Blog başarıyla silindi.');
        } catch (\Exception $e) {
            return redirect()->route('blog.index')
                    ->with('error', 'Blog silinirken hata oluştu: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {  
        $categories = Category::where( 'is_active' , 1)  
                          ->orderBy('id', 'asc')
                          ->get();
        $blog = Blogs::with('categories')->where('id', $id)->first();
        
        return view('Admin.template.Blog.edit', compact('blog' , 'categories'));
    }
    public function update(Request $request, $id)
    {  
         
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => [ 'required', 'string', 'max:255', Rule::unique('blogs', 'slug')->ignore($id), ],
            'content' => 'required|string',
            'sort' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
            'blog_category' => 'required|array|min:1',
            'blog_category.*' => 'exists:categories,id'
        ], [
          
            'title.required' => 'Başlık alanı zorunludur.',
            'slug.required' => 'Slug alanı zorunludur.',
            'slug.unique' => 'Bu slug daha önce kullanılmış.',
            'content.required' => 'Açıklama alanı zorunludur.',
            'blog_category.required' => 'En az bir kategori seçmelisiniz.',
            'blog_category.min' => 'En az bir kategori seçmelisiniz.',
            'blog_category.*.exists' => 'Seçilen kategori geçersiz.',
        ]);


        $blog = Blogs::findOrFail($id);

 
        $blog->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->content,
            'sort' => $request->sort ?? 0,
            'is_active' => $request->is_active ?? 0,
        ]);

 
        $blog->categories()->sync($request->blog_category);

        return response()->json([
            'status' => true,
            'message' => 'Blog güncellendi.'
        ]);
    }
    public function status(Request $request)
    {   
       $id = $request->input('id');
       $status = $request->input('status'); 

       $blog = Blogs::findOrFail($request->id);
       if(!empty($blog)){
            $blog->is_active = $request->status;
            $blog->save();
        if(!empty($blog)){
            return response()->json(['success' => true, 'message' => 'Blog durumu güncellendi.']);
        }else {
            return response()->json(['error' => true, 'message' => 'Beklenmedik hata oluştu.']);
        }
       } else {
        return response()->json(['error' => true, 'message' => 'Teknik bir sorun oluştu.']);
       }

    }
}
