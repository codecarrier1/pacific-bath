<?php

namespace App\Interfaces;

use App\Traits\ProductImporterTrait;

interface ProductImporter
{

    /**
     * @return mixed
     */
    public function createProducts();

    /**
     * @return mixed
     * Same as create products, but job creating product options is
     * executed immediately instead of being pushed onto the queue
     */
    public function createProductsNow();

}
