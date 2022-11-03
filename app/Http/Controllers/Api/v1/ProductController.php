<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
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

    public function show($id)
    {
        if(!auth()->user()->tokenCan('basic')){
            abort(403, 'Unauthorized');
        }

        $product = Product::find($id);

        if($product){
            return response()->json(['data' => new ProductResource($product)]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
                'data' => null,
            ], 404);
        }

    }

    public function store(CreateProductRequest $request)
    {
        if(!auth()->user()->tokenCan('basic')){
            abort(403, 'Unauthorized');
        }

        $data = Product::create($request->validated());

        return response()->json([
            'status' => 200,
            'message' => 'Product created',
            'data' => $data,
        ], 201);
    }

    public function update(UpdateProductRequest $request)
    {
        if(!auth()->user()->tokenCan('basic')){
            abort(403, 'Unauthorized');
        }

        $data = Product::update($request->validated());

        return response()->json([
            'status' => 200,
            'message' => 'Product updated',
            'data' => $data,
        ]);

    }

    public function delete($id)
    {
        if(!auth()->user()->tokenCan('basic')){
            abort(403, 'Unauthorized');
        }

        $data = Product::find($id);

        if($data){
            $data->delete();

            return response()->json([
                'status' => true,
                'message' => 'Product deleted',
                'data' => null,
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
                'data' => null,
            ], 404);
        }
    }

}
