<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
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

    public function show($id)
    {
        if(!auth()->user()->tokenCan('basic')){
            abort(403, 'Unauthorized');
        }

        $category = Category::find($id);

        if($category){
            return response()->json(['data' => new CategoryResource($category)]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Category not found',
                'data' => null,
            ],404);
        }
    }

    public function store(CreateCategoryRequest $request)
    {
        if(!auth()->user()->tokenCan('basic')){
            abort(403, 'Unauthorized');
        }

        $data = Category::create($request->validated());

        return response()->json([
           'status' => 200,
           'message' => 'Category created',
           'data' => $data,
        ], 201);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        if(!auth()->user()->tokenCan('basic')){
            abort(403, 'Unauthorized');
        }

        $data = Category::find($id);
        if($data){
            $data->update($request->validated());

            return response()->json([
                'status' => 200,
                'message' => 'Category updated',
                'data' => $data,
            ]);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Category not found',
                'data' => null,
            ],404);
        }
    }

    public function delete($id)
    {
        if(!auth()->user()->tokenCan('basic')){
            abort(403, 'Unauthorized');
        }

        $data = Category::find($id);

        if($data){
            $data->delete();

            return response()->json([
                'status' => true,
                'message' => 'Category deleted',
                'data' => null,
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Category not found',
                'data' => null,
            ], 404);
        }
    }


}
