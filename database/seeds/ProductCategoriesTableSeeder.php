<?php

use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_categories')->delete();
        
        \DB::table('product_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Shower Pans',
                'created_at' => '2019-12-17 17:04:56',
                'updated_at' => '2019-12-17 17:04:56',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Walls, Joints & Trim',
                'created_at' => '2019-12-17 17:04:56',
                'updated_at' => '2019-12-17 17:04:56',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Fixtures & Accessories',
                'created_at' => '2019-12-17 17:04:56',
                'updated_at' => '2019-12-17 17:04:56',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Shower Doors',
                'created_at' => '2019-12-17 17:04:56',
                'updated_at' => '2019-12-17 17:04:56',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Construction & Additions',
                'created_at' => '2019-12-17 17:04:56',
                'updated_at' => '2019-12-17 17:04:56',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Walk in Baths',
                'created_at' => '2019-12-17 17:04:56',
                'updated_at' => '2019-12-17 17:04:56',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Bathtubs',
                'created_at' => '2019-12-17 17:04:56',
                'updated_at' => '2019-12-17 17:04:56',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Bathtub Doors',
                'created_at' => '2019-12-17 17:04:56',
                'updated_at' => '2019-12-17 17:04:56',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Shower Pan Drains',
                'created_at' => '2019-12-17 17:04:56',
                'updated_at' => '2019-12-17 17:04:56',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Bathtub Drains',
                'created_at' => '2019-12-17 17:04:56',
                'updated_at' => '2019-12-17 17:04:56',
            ),
        ));
        
        
    }
}