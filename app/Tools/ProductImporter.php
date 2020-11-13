<?php

namespace App\Tools;

use App\Color;
use App\Jobs\CreateProductOptions;
use App\Product;
use App\ProductCategory;
use App\ProductSubCategory;
use App\Traits\ProductImporterTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use League\Csv\Reader;

class ProductImporter
{
    protected $products;

    protected $data;

    protected $productCategoryId;

    protected $subCategories = [];


    public function setCsv($csvPath)
    {
        $this->data = Reader::createFromPath($csvPath);
        $this->data->setHeaderOffset(0);
        return $this;
    }

    public function setCategory($productCategoryId)
    {
        $this->productCategoryId = $productCategoryId;
        return $this;
    }


    protected function createOptions()
    {
        foreach($this->products as [$product, $row]){
            CreateProductOptions::dispatch($product, $row);
        }
    }

    protected function createOptionsNow()
    {
        foreach($this->products as [$product, $row]){
            CreateProductOptions::dispatchNow($product, $row);
        }
    }


    public function createProducts()
    {
        $this->doProductCreation();
        $this->createOptions();
    }

    public function createProductsNow()
    {
        $this->doProductCreation();
        $this->createOptionsNow();
    }


    protected function doProductCreation()
    {
        foreach($this->data as $row){

            $productData = [
                'sku' => trim($row['sku']),
                'price' => trim($row['price']),
                'product_category_id' => $this->productCategoryId,
            ];
            if(array_key_exists('subcategory', $row)){
                if(!array_key_exists($row['subcategory'], $this->subCategories)){
                    try{
                        $subCategory = ProductSubCategory::where('name', trim($row['subcategory']))->firstOrFail();
                    } catch (ModelNotFoundException $exception){
                        $subCategory = ProductSubCategory::create([
                            'name' => $row['subcategory'],
                            'product_category_id' => $this->productCategoryId,
                        ]);
                    }
                    $this->subCategories[trim($subCategory->name)] = $subCategory->id;
                }
                try {
                    $productData['product_sub_category_id'] = $this->subCategories[trim($row['subcategory'])];
                } catch (\Throwable $exception){
                    dump($this->subCategories);
                    dump($row['subcategory']);
                    dd($exception->getMessage());
                }
            }

            $product = Product::create($productData);
            unset($row['price']);
            unset($row['sku']);
            unset($row['subcategory']);
            $this->products[] = [$product, $row];
        }
    }





}
