<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\CreateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return new ProductCollection(Product::withTranslation()->paginate(10));
    }

    public function show(Product $product)
    {
        return response()->json(['data' => new ProductResource($product)]);
    }

    public function store(CreateProductRequest $request)
    {
        $data = Product::create($request->validated());

        return response()->json([
            'status' => 200,
            'message' => 'Product created',
            'data' => $data,
        ], 201);
    }
}
