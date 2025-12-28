<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function create()
    {
        return view('Admin.template.Category.create');
    }
    
    public function store(CategoriesRequest $request)
    {
         $data = $request->validated();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
       
        if ($request->hasFile('image')) {
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/category'), $imageName);

            $data['image'] = $imageName;
        }
        Category::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Kategori eklendi'
        ]);
    }

    public function index()
    {
        $categories = Category::latest()->paginate(15);
        return view('Admin.template.Category.index' , compact('categories'));
    }


    public function destroy(Category $category)
    {
        $category->delete();

         return redirect()->route('categories.index')
                    ->with('success', 'Kategori başarıyla silindi.');
    }


    public function edit(Category $category)
    {  
        return view('Admin.template.Category.edit', compact('category'));
    }

    public function update(CategoriesRequest $request, Category $category)
    {
        $data = $request->validated();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
        if ($request->hasFile('image')) {
            if ($category->image && file_exists(public_path('uploads/category/'.$category->image))) {
                unlink(public_path('uploads/category/'.$category->image));
            }
            $imageName = time().'_'.$request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/category'), $imageName);
            $data['image'] = $imageName;
        }

        $category->update($data);
   
        return response()->json([
            'status' => true,
            'message' => 'Kategori güncellendi.'
        ]);
 
    }

    public function status(Request $request)
    {   
        $validated = $request->validate([
            'id' => 'required|exists:categories,id',
            'status' => 'required'
        ]);

        Category::findOrFail($validated['id'])
            ->update(['is_active' => $validated['status']]);

        return response()->json([
            'success' => true,
            'message' => 'Kategori durumu güncellendi.'
        ]);

    }
}
