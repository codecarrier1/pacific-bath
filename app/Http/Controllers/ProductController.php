<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Lead;
use App\Option;
use App\Product;
use App\ProductInformation;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function store(CreateProductRequest $request)
    {
        $product = Product::create($request->except('options'));
        foreach ($request->input('options') as $key => $value) {
            Option::create(['key' => $key, 'value' => $value, 'product_id' => $product->id]);
        }
        $product->load('options');

        return response()->json($product, 201);
    }

}
