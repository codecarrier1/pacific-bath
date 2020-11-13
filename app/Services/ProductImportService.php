<?php

namespace App\Services;

use App\Option;
use App\Product;

class ProductImportService
{
    protected $productData;
    protected $product;

    public function import($data)
    {
        $this->productData = $data;
        $this->createProduct();;
        $this->createOptions();
    }

    protected function createOptions()
    {
        $options = [];
        $now = now();
        foreach ($this->productData['options'] as $key => $value){
            $option = [];
            $option['key'] = $key;
            $option['value'] = $value;
            $option['product_id'] = $this->product->id;
            $option['created_at'] = $now;
            $option['updated_at'] = $now;
            $options[] = $option;
        }
        Option::insert($options);
    }

    protected function createProduct()
    {
        $this->product = Product::create([
            'sku' => $this->productData['sku'],
            'price' => $this->productData['price'],
            'product_category_id' => $this->productData['product_category_id'],
            'product_sub_category_id' => $this->productData['product_sub_category_id'],
        ]);
    }
}
