<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\GetProductRequest;
use App\Http\Requests\Products\PatchProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function create(CreateProductRequest $request) {


        $validator = $request->getValidationInstance();
        if ($validator->fails()) {
            return response()->json(['error_message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST);
        }

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->save();

        return response()->json(['product' => $product], Response::HTTP_CREATED);
    }

    public function update($id, PatchProductRequest $request) {


        $validator = $request->getValidationInstance();
        if ($validator->fails()) {
            return response()->json(['error_message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST);
        }

        $product = Product::where('id', $id)->first();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->save();

        return response()->json(['product' => $product], Response::HTTP_OK);
    }

    public function getProduct($id, GetProductRequest $request) {

        $validator = $request->getValidationInstance();
        if ($validator->fails()) {
            return response()->json(['error_message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST);
        }

        $product = Product::where('id', $id)->first();
        return response()->json(['product' => $product], Response::HTTP_OK);
    }

    public function getAllProducts() {
        $products = Product::all();
        return response()->json(['products' => $products], Response::HTTP_OK);
    }

    public function delete($id, GetProductRequest $request) {

        $validator = $request->getValidationInstance();
        if ($validator->fails()) {
            return response()->json(['error_message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST);
        }

        Product::where('id', $id)->delete();
        return response()->json([], Response::HTTP_OK);
    }
}
