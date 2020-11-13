<?php

use App\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaults = collect([
            'Shower Pans',
            'Walls, Joints & Trim',
            'Fixtures & Accessories',
            'Shower Doors',
            'Construction & Additions',
            'Walk in Baths',
            'Bathtubs',
            'Bathtub Doors',
            'Shower Pan Drains',
            'Bathtub Drains',
        ]);

        $defaults->each(function ($default) {
            ProductCategory::create(['name' => $default]);
        });
    }
}
