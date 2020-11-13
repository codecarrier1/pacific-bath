<?php

use App\ProductCategory;
use App\ProductSubCategory;
use Illuminate\Database\Seeder;

class ProductSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductSubCategory::create([
            'name' => 'Signature',
            'product_category_id' => ProductCategory::SHOWER_PANS,
        ]);

        ProductSubCategory::create([
            'name' => 'Barrier Free',
            'product_category_id' => ProductCategory::SHOWER_PANS,
        ]);

        ProductSubCategory::create([
            'name' => 'Specialty',
            'product_category_id' => ProductCategory::SHOWER_PANS,
        ]);

        ProductSubCategory::create([
            'name' => 'Hydrotherapy',
            'product_category_id' => ProductCategory::WALK_IN_BATHS,
        ]);

        ProductSubCategory::create([
            'name' => 'Soaker',
            'product_category_id' => ProductCategory::WALK_IN_BATHS,
        ]);
        ProductSubCategory::create([
            'name' => 'Archer',
            'product_category_id' => ProductCategory::BATHTUBS,
        ]);
        ProductSubCategory::create([
            'name' => 'Expanse',
            'product_category_id' => ProductCategory::BATHTUBS,
        ]);

        ProductSubCategory::create([
            'name' => 'Wall Kit',
            'product_category_id' => ProductCategory::WALLS_JOINTS_TRIM,
        ]);

        ProductSubCategory::create([
            'name' => 'Walls',
            'product_category_id' => ProductCategory::WALLS_JOINTS_TRIM,
        ]);

        ProductSubCategory::create([
            'name' => 'Joints & Trim',
            'product_category_id' => ProductCategory::WALLS_JOINTS_TRIM,
        ]);
        ProductSubCategory::create([
            'name' => 'Shower Seat',
            'product_category_id' => ProductCategory::FIXTURES_ACCESSORIES,
        ]);
        ProductSubCategory::create([
            'name' => 'Main Unit',
            'product_category_id' => ProductCategory::FIXTURES_ACCESSORIES,
        ]);
        ProductSubCategory::create([
            'name' => 'Secondary Unit',
            'product_category_id' => ProductCategory::FIXTURES_ACCESSORIES,
        ]);
        ProductSubCategory::create([
            'name' => 'Accessory',
            'product_category_id' => ProductCategory::FIXTURES_ACCESSORIES,
        ]);
        ProductSubCategory::create([
            'name' => 'Shelving',
            'product_category_id' => ProductCategory::FIXTURES_ACCESSORIES,
        ]);
        ProductSubCategory::create([
            'name' => 'Entry Way Demo to Finish',
            'product_category_id' => ProductCategory::CONSTRUCTION_ADDITIONS,
        ]);
        ProductSubCategory::create([
            'name' => 'Hot Water Heater',
            'product_category_id' => ProductCategory::CONSTRUCTION_ADDITIONS,
        ]);
        ProductSubCategory::create([
            'name' => 'Drain/Plumbing',
            'product_category_id' => ProductCategory::CONSTRUCTION_ADDITIONS,
        ]);
        ProductSubCategory::create([
            'name' => 'Eletrical Panel',
            'product_category_id' => ProductCategory::CONSTRUCTION_ADDITIONS,
        ]);
        ProductSubCategory::create([
            'name' => 'Construction',
            'product_category_id' => ProductCategory::CONSTRUCTION_ADDITIONS,
        ]);
        ProductSubCategory::create([
            'name' => 'Shower Door Slider',
            'product_category_id' => ProductCategory::SHOWER_DOORS,
        ]);
        ProductSubCategory::create([
            'name' => 'Shower Door Pivot',
            'product_category_id' => ProductCategory::SHOWER_DOORS,
        ]);
        ProductSubCategory::create([
            'name' => 'Finesse',
            'product_category_id' => ProductCategory::BATHTUB_DOORS,
        ]);
        ProductSubCategory::create([
           'name' => 'Fluence',
            'product_category_id' => ProductCategory::BATHTUB_DOORS,
        ]);

    }
}
