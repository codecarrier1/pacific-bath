<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\ProductSubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductSubCategoryRequest;

class ProductSubCategoryController extends Controller
{
    public function show(ProductCategory $productCategory)
    {
        return response()->json($productCategory->subCategories);
    }

    public function store(CreateProductSubCategoryRequest $request, $productCategory)
    {
        $input = $request->sanitizedAndValidated();
        if ($subCategory = ProductSubCategory::create(['name' => $input['name'], 'product_category_id' => $productCategory->id])
            ->addMediaFromRequest('image')
            ->toMediaCollection('subcategories')) {
            return response()->json($subCategory, 201);
        }
        abort(500, 'Color unable to be created.');
    }
}
