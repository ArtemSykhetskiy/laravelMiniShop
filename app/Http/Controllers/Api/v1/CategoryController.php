<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        if(!auth()->user()->tokenCan('basic')){
            abort(403, 'Unauthorized');
        }

        return new CategoryCollection(Category::withTranslation()->paginate(10));
    }

    public function show(Category $category)
    {
        if(!auth()->user()->tokenCan('basic')){
            abort(403, 'Unauthorized');
        }

        return response()->json(['data' => new CategoryResource($category)]);
    }

    public function store(CreateCategoryRequest $request)
    {
        $data = Category::create($request->validated());

        return response()->json([
           'status' => 200,
           'message' => 'Category created',
           'data' => $data,
        ], 201);
    }


}
