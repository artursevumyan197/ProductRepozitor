<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use Illuminate\Http\Request;



class ImageController extends ProductController
{

    public function create(CreateProductRequest $request):JsonResponse
    {

      $product =  Product::create([
           'name' => $request->name,
           'price' => $request->price,
           ]);

      $product
          ->addMedia($request->image)
          ->toMediaCollection();


        return response()->json(['success' => true]);

    }

}
