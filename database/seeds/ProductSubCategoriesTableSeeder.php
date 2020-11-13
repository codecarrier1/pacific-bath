<?php

use Illuminate\Database\Seeder;

class ProductSubCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_sub_categories')->delete();
        
        \DB::table('product_sub_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Signature',
                'product_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Specialty ',
                'product_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Barrier Free',
                'product_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Wall Kit',
                'product_category_id' => 2,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Walls',
                'product_category_id' => 2,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Joints & Trim',
                'product_category_id' => 2,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Shower Seat',
                'product_category_id' => 3,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Main Unit',
                'product_category_id' => 3,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Secondary Unit',
                'product_category_id' => 3,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Curtain Rod',
                'product_category_id' => 3,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Shelving',
                'product_category_id' => 3,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Shower Locker',
                'product_category_id' => 3,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Grab Bar',
                'product_category_id' => 3,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Accessory',
                'product_category_id' => 3,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => '60" Wide Shower Door',
                'product_category_id' => 4,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => '48" Wide Shower Door',
                'product_category_id' => 4,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => '44" Wide Shower Door',
                'product_category_id' => 4,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => '36" Wide Shower Door',
                'product_category_id' => 4,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Entry Way Demo to Finish',
                'product_category_id' => 5,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Hot Water Heater',
                'product_category_id' => 5,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Drain/Plumbing',
                'product_category_id' => 5,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Eletrical Panel',
                'product_category_id' => 5,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Construction',
                'product_category_id' => 5,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Hydrotherapy',
                'product_category_id' => 6,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Soaker',
                'product_category_id' => 6,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'Archer',
                'product_category_id' => 7,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Expanse',
                'product_category_id' => 7,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Finesse',
                'product_category_id' => 8,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:46',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Fluence',
                'product_category_id' => 8,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:46',
            ),
        ));
        
        
    }
}