<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();

        return view('admin.blog.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.blog.category.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());

        return redirect('admin/blog/category')->with('success', 'Successfully added');;
    }

    public function show(Category $category)
    {
        return view('admin.blog.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.blog.category.edit', compact('category'));
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $category->update($request->validated());

        return back()->with('success', 'Successfully Updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success', 'Deleted successfully');
    }
}
