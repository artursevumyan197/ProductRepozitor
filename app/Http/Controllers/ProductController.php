<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\DeleteProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\GetProductRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create(CreateProductRequest $request): JsonResponse
    {
        $product = Product::create([
            'name' => $request->getName(),
            'price' => $request->getPrice(),
        ]);

        foreach ($request->getImages() as $image) {
            $product
                ->addMedia($image)
                ->toMediaCollection();
        }

        return response()->json(['success' => true]);
    }

    public function update(UpdateProductRequest $request): JsonResponse
    {
        $product = Product::query()
            ->where('id', $request->getId())
            ->first();
        $product->name = $request->getName();
        $product->price = $request->getPrice();
        $product->save();
        $product->clearMediaCollection();

        foreach ($request->getImages() as $image) {
            $product
                ->addMedia($image)
                ->toMediaCollection();
        }

        return response()->json(['success' => true]);
    }

    public function delete(DeleteProductRequest $request): JsonResponse
    {
        Product::query()
            ->where('id', $request->getId())
            ->delete();

        return response()->json(['success' => true]);
    }

    public function show(GetProductRequest $request): ProductResource
    {

        $product = Product::query()
            ->where('id', $request->getId())
            ->first();

        return new ProductResource($product);

    }

    public function index(GetProductRequest $request): AnonymousResourceCollection
    {
        return ProductResource::collection(Product::query()->get());
    }


}
