<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::withTranslation()
            ->translatedIn(app()->getLocale())
            ->latest()
            ->take(10)
            ->get();

        return view('categories/index', compact('categories'));
    }

    public  function show(Category $category)
    {
        $products = $category->products()->paginate(12);

        return view('products/index', compact('products', 'category'));
    }
}
