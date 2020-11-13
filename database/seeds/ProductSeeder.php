<?php

use App\Product;
use App\ProductCategory;
use App\Tools\ShowerPanImporter;
use Illuminate\Database\Seeder;

/**
 * Class ProductSeeder
 */
class ProductSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ProductCategory::all();
        foreach ($categories as $category) {
           $slug = \Illuminate\Support\Str::slug($category->name);
           $csv = database_path('seeds/csv/' . $slug . '.csv');
           if(! file_exists($csv)){
               dump('csv doesnt exist for ' . $csv);
               die;
           }
           $importer = new \App\Tools\ProductImporter;
            $importer
                ->setCsv($csv)
                ->setCategory($category->id)
                ->createProductsNow();
        }
    }
}
