<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('colors')->delete();
        
        \DB::table('colors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'White',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:07:00',
                'updated_at' => '2020-01-29 13:07:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Biscuit',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:07:01',
                'updated_at' => '2020-01-29 13:07:01',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'VeinCut Dune',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:08:28',
                'updated_at' => '2020-01-29 13:08:28',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'VeinCut Sandbar',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:08:30',
                'updated_at' => '2020-01-29 13:08:30',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'CrossCut Dune',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:08:35',
                'updated_at' => '2020-01-29 13:08:35',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'White Brick Tile',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:08:36',
                'updated_at' => '2020-01-29 13:08:36',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'VC-Sandbar / Sandbar',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:08:37',
                'updated_at' => '2020-01-29 13:08:37',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'VC-Dune / White',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:08:39',
                'updated_at' => '2020-01-29 13:08:39',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'VC-Dune / Biscuit',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:08:40',
                'updated_at' => '2020-01-29 13:08:40',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'VC-Sandbar / White',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:08:41',
                'updated_at' => '2020-01-29 13:08:41',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'VC-Sandbar / Biscuit',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:08:42',
                'updated_at' => '2020-01-29 13:08:42',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Sandbar',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:09:11',
                'updated_at' => '2020-01-29 13:09:11',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Dune',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:09:11',
                'updated_at' => '2020-01-29 13:09:11',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Bright Polished Silver',
                'is_metallic' => 1,
                'created_at' => '2020-01-29 13:09:12',
                'updated_at' => '2020-01-29 13:09:12',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Brushed Nickel',
                'is_metallic' => 1,
                'created_at' => '2020-01-29 13:09:13',
                'updated_at' => '2020-01-29 13:09:13',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Teak',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:09:54',
                'updated_at' => '2020-01-29 13:09:54',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Polished Chrome',
                'is_metallic' => 1,
                'created_at' => '2020-01-29 13:09:55',
                'updated_at' => '2020-01-29 13:09:55',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Clear',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:11:35',
                'updated_at' => '2020-01-29 13:11:35',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Frosted',
                'is_metallic' => 0,
                'created_at' => '2020-01-29 13:11:50',
                'updated_at' => '2020-01-29 13:11:50',
            ),
        ));
        
        
    }
}