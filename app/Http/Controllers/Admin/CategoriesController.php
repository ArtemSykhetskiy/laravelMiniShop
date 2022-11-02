<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(10);

        return view('admin/categories/index', compact('categories'));
    }

    public function create()
    {
        return view('admin/categories/create');
    }


    public function store(CreateCategoryRequest $request)
    {
        DB::transaction(function () use ($request){
            $data = $request->validated();

            Category::create($data);
        });

        return redirect()->route('admin.categories.index')->with('success', 'Category successfully added');
    }

    public function edit(Category $category)
    {
        return view('admin/categories/edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        DB::transaction(function () use ($request, $category) {
            $data = $request->validated();
            $category->update($data);
        });

        return redirect()->route('admin.categories.index')->with('success', 'Category successfully updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category successfully deleted');
    }
}
