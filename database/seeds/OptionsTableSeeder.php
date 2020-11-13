<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('options')->delete();
        
        \DB::table('options')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:30',
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:30',
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:30',
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'depth',
                'value' => '42',
                'type' => 'decimal',
                'product_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:30',
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'wall_kit_available',
                'value' => '0',
                'type' => 'boolean',
                'product_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:30',
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 2,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:30',
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 2,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:30',
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 2,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:30',
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'depth',
                'value' => '42',
                'type' => 'decimal',
                'product_id' => 2,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:30',
            ),
            9 => 
            array (
                'id' => 10,
                'key' => 'wall_kit_available',
                'value' => '0',
                'type' => 'boolean',
                'product_id' => 2,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:30',
            ),
            10 => 
            array (
                'id' => 11,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:32',
            ),
            11 => 
            array (
                'id' => 12,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:32',
            ),
            12 => 
            array (
                'id' => 13,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:32',
            ),
            13 => 
            array (
                'id' => 14,
                'key' => 'depth',
                'value' => '34',
                'type' => 'decimal',
                'product_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:32',
            ),
            14 => 
            array (
                'id' => 15,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:32',
            ),
            15 => 
            array (
                'id' => 16,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 4,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:33',
            ),
            16 => 
            array (
                'id' => 17,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 4,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:33',
            ),
            17 => 
            array (
                'id' => 18,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 4,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:33',
            ),
            18 => 
            array (
                'id' => 19,
                'key' => 'depth',
                'value' => '34',
                'type' => 'decimal',
                'product_id' => 4,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:33',
            ),
            19 => 
            array (
                'id' => 20,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 4,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:33',
            ),
            20 => 
            array (
                'id' => 21,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 5,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:35',
            ),
            21 => 
            array (
                'id' => 22,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 5,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:35',
            ),
            22 => 
            array (
                'id' => 23,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 5,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:35',
            ),
            23 => 
            array (
                'id' => 24,
                'key' => 'depth',
                'value' => '32',
                'type' => 'decimal',
                'product_id' => 5,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:35',
            ),
            24 => 
            array (
                'id' => 25,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 5,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:35',
            ),
            25 => 
            array (
                'id' => 26,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 6,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:36',
            ),
            26 => 
            array (
                'id' => 27,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 6,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:36',
            ),
            27 => 
            array (
                'id' => 28,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 6,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:36',
            ),
            28 => 
            array (
                'id' => 29,
                'key' => 'depth',
                'value' => '32',
                'type' => 'decimal',
                'product_id' => 6,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:36',
            ),
            29 => 
            array (
                'id' => 30,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 6,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:36',
            ),
            30 => 
            array (
                'id' => 31,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 7,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:38',
            ),
            31 => 
            array (
                'id' => 32,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 7,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:38',
            ),
            32 => 
            array (
                'id' => 33,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 7,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:38',
            ),
            33 => 
            array (
                'id' => 34,
                'key' => 'depth',
                'value' => '32',
                'type' => 'decimal',
                'product_id' => 7,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:38',
            ),
            34 => 
            array (
                'id' => 35,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 7,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:38',
            ),
            35 => 
            array (
                'id' => 36,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 8,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:39',
            ),
            36 => 
            array (
                'id' => 37,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 8,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:39',
            ),
            37 => 
            array (
                'id' => 38,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 8,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:39',
            ),
            38 => 
            array (
                'id' => 39,
                'key' => 'depth',
                'value' => '32',
                'type' => 'decimal',
                'product_id' => 8,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:39',
            ),
            39 => 
            array (
                'id' => 40,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 8,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:39',
            ),
            40 => 
            array (
                'id' => 41,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 9,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:40',
            ),
            41 => 
            array (
                'id' => 42,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 9,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:41',
            ),
            42 => 
            array (
                'id' => 43,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 9,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:40',
            ),
            43 => 
            array (
                'id' => 44,
                'key' => 'depth',
                'value' => '30',
                'type' => 'decimal',
                'product_id' => 9,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:40',
            ),
            44 => 
            array (
                'id' => 45,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 9,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:41',
            ),
            45 => 
            array (
                'id' => 46,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 10,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:42',
            ),
            46 => 
            array (
                'id' => 47,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 10,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:42',
            ),
            47 => 
            array (
                'id' => 48,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 10,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:42',
            ),
            48 => 
            array (
                'id' => 49,
                'key' => 'depth',
                'value' => '30',
                'type' => 'decimal',
                'product_id' => 10,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:42',
            ),
            49 => 
            array (
                'id' => 50,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 10,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:42',
            ),
            50 => 
            array (
                'id' => 51,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 11,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:44',
            ),
            51 => 
            array (
                'id' => 52,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 11,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:44',
            ),
            52 => 
            array (
                'id' => 53,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 11,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:44',
            ),
            53 => 
            array (
                'id' => 54,
                'key' => 'depth',
                'value' => '30',
                'type' => 'decimal',
                'product_id' => 11,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:44',
            ),
            54 => 
            array (
                'id' => 55,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 11,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:44',
            ),
            55 => 
            array (
                'id' => 56,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 12,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:46',
            ),
            56 => 
            array (
                'id' => 57,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 12,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:46',
            ),
            57 => 
            array (
                'id' => 58,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 12,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:46',
            ),
            58 => 
            array (
                'id' => 59,
                'key' => 'depth',
                'value' => '30',
                'type' => 'decimal',
                'product_id' => 12,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:46',
            ),
            59 => 
            array (
                'id' => 60,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 12,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:46',
            ),
            60 => 
            array (
                'id' => 61,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 13,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:48',
            ),
            61 => 
            array (
                'id' => 62,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 13,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:48',
            ),
            62 => 
            array (
                'id' => 63,
                'key' => 'width',
                'value' => '48',
                'type' => 'decimal',
                'product_id' => 13,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:48',
            ),
            63 => 
            array (
                'id' => 64,
                'key' => 'depth',
                'value' => '42',
                'type' => 'decimal',
                'product_id' => 13,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:48',
            ),
            64 => 
            array (
                'id' => 65,
                'key' => 'wall_kit_available',
                'value' => '0',
                'type' => 'boolean',
                'product_id' => 13,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:48',
            ),
            65 => 
            array (
                'id' => 66,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 14,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:49',
            ),
            66 => 
            array (
                'id' => 67,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 14,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:49',
            ),
            67 => 
            array (
                'id' => 68,
                'key' => 'width',
                'value' => '48',
                'type' => 'decimal',
                'product_id' => 14,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:49',
            ),
            68 => 
            array (
                'id' => 69,
                'key' => 'depth',
                'value' => '42',
                'type' => 'decimal',
                'product_id' => 14,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:49',
            ),
            69 => 
            array (
                'id' => 70,
                'key' => 'wall_kit_available',
                'value' => '0',
                'type' => 'boolean',
                'product_id' => 14,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:49',
            ),
            70 => 
            array (
                'id' => 71,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 15,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:50',
            ),
            71 => 
            array (
                'id' => 72,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 15,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:50',
            ),
            72 => 
            array (
                'id' => 73,
                'key' => 'width',
                'value' => '48',
                'type' => 'decimal',
                'product_id' => 15,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:50',
            ),
            73 => 
            array (
                'id' => 74,
                'key' => 'depth',
                'value' => '34',
                'type' => 'decimal',
                'product_id' => 15,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:50',
            ),
            74 => 
            array (
                'id' => 75,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 15,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:50',
            ),
            75 => 
            array (
                'id' => 76,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 16,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:52',
            ),
            76 => 
            array (
                'id' => 77,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 16,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:52',
            ),
            77 => 
            array (
                'id' => 78,
                'key' => 'width',
                'value' => '48',
                'type' => 'decimal',
                'product_id' => 16,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:52',
            ),
            78 => 
            array (
                'id' => 79,
                'key' => 'depth',
                'value' => '34',
                'type' => 'decimal',
                'product_id' => 16,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:52',
            ),
            79 => 
            array (
                'id' => 80,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 16,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:52',
            ),
            80 => 
            array (
                'id' => 81,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 17,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:53',
            ),
            81 => 
            array (
                'id' => 82,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 17,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:53',
            ),
            82 => 
            array (
                'id' => 83,
                'key' => 'width',
                'value' => '48',
                'type' => 'decimal',
                'product_id' => 17,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:53',
            ),
            83 => 
            array (
                'id' => 84,
                'key' => 'depth',
                'value' => '32',
                'type' => 'decimal',
                'product_id' => 17,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:53',
            ),
            84 => 
            array (
                'id' => 85,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 17,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:53',
            ),
            85 => 
            array (
                'id' => 86,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 18,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:55',
            ),
            86 => 
            array (
                'id' => 87,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 18,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:55',
            ),
            87 => 
            array (
                'id' => 88,
                'key' => 'width',
                'value' => '48',
                'type' => 'decimal',
                'product_id' => 18,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:55',
            ),
            88 => 
            array (
                'id' => 89,
                'key' => 'depth',
                'value' => '32',
                'type' => 'decimal',
                'product_id' => 18,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:55',
            ),
            89 => 
            array (
                'id' => 90,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 18,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:55',
            ),
            90 => 
            array (
                'id' => 91,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 19,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:56',
            ),
            91 => 
            array (
                'id' => 92,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 19,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:56',
            ),
            92 => 
            array (
                'id' => 93,
                'key' => 'width',
                'value' => '48',
                'type' => 'decimal',
                'product_id' => 19,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:56',
            ),
            93 => 
            array (
                'id' => 94,
                'key' => 'depth',
                'value' => '32',
                'type' => 'decimal',
                'product_id' => 19,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:56',
            ),
            94 => 
            array (
                'id' => 95,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 19,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:56',
            ),
            95 => 
            array (
                'id' => 96,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 20,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:57',
            ),
            96 => 
            array (
                'id' => 97,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 20,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:57',
            ),
            97 => 
            array (
                'id' => 98,
                'key' => 'width',
                'value' => '48',
                'type' => 'decimal',
                'product_id' => 20,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:57',
            ),
            98 => 
            array (
                'id' => 99,
                'key' => 'depth',
                'value' => '32',
                'type' => 'decimal',
                'product_id' => 20,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:57',
            ),
            99 => 
            array (
                'id' => 100,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 20,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:57',
            ),
            100 => 
            array (
                'id' => 101,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 21,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:59',
            ),
            101 => 
            array (
                'id' => 102,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 21,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:59',
            ),
            102 => 
            array (
                'id' => 103,
                'key' => 'width',
                'value' => '36',
                'type' => 'decimal',
                'product_id' => 21,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:59',
            ),
            103 => 
            array (
                'id' => 104,
                'key' => 'depth',
                'value' => '42',
                'type' => 'decimal',
                'product_id' => 21,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:59',
            ),
            104 => 
            array (
                'id' => 105,
                'key' => 'wall_kit_available',
                'value' => '0',
                'type' => 'boolean',
                'product_id' => 21,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:59',
            ),
            105 => 
            array (
                'id' => 106,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 22,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:00',
            ),
            106 => 
            array (
                'id' => 107,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 22,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:00',
            ),
            107 => 
            array (
                'id' => 108,
                'key' => 'width',
                'value' => '36',
                'type' => 'decimal',
                'product_id' => 22,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:00',
            ),
            108 => 
            array (
                'id' => 109,
                'key' => 'depth',
                'value' => '42',
                'type' => 'decimal',
                'product_id' => 22,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:00',
            ),
            109 => 
            array (
                'id' => 110,
                'key' => 'wall_kit_available',
                'value' => '0',
                'type' => 'boolean',
                'product_id' => 22,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:00',
            ),
            110 => 
            array (
                'id' => 111,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 23,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:01',
            ),
            111 => 
            array (
                'id' => 112,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 23,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:01',
            ),
            112 => 
            array (
                'id' => 113,
                'key' => 'width',
                'value' => '36',
                'type' => 'decimal',
                'product_id' => 23,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:01',
            ),
            113 => 
            array (
                'id' => 114,
                'key' => 'depth',
                'value' => '34',
                'type' => 'decimal',
                'product_id' => 23,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:01',
            ),
            114 => 
            array (
                'id' => 115,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 23,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:01',
            ),
            115 => 
            array (
                'id' => 116,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 24,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:03',
            ),
            116 => 
            array (
                'id' => 117,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 24,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:03',
            ),
            117 => 
            array (
                'id' => 118,
                'key' => 'width',
                'value' => '36',
                'type' => 'decimal',
                'product_id' => 24,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:03',
            ),
            118 => 
            array (
                'id' => 119,
                'key' => 'depth',
                'value' => '34',
                'type' => 'decimal',
                'product_id' => 24,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:03',
            ),
            119 => 
            array (
                'id' => 120,
                'key' => 'wall_kit_available',
                'value' => '1',
                'type' => 'boolean',
                'product_id' => 24,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:03',
            ),
            120 => 
            array (
                'id' => 121,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 25,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:04',
            ),
            121 => 
            array (
                'id' => 122,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 25,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:04',
            ),
            122 => 
            array (
                'id' => 123,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 25,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:04',
            ),
            123 => 
            array (
                'id' => 124,
                'key' => 'depth',
                'value' => '36',
                'type' => 'decimal',
                'product_id' => 25,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:04',
            ),
            124 => 
            array (
                'id' => 125,
                'key' => 'wall_kit_available',
                'value' => '0',
                'type' => 'boolean',
                'product_id' => 25,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:04',
            ),
            125 => 
            array (
                'id' => 126,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 26,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:05',
            ),
            126 => 
            array (
                'id' => 127,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 26,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:05',
            ),
            127 => 
            array (
                'id' => 128,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 26,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:05',
            ),
            128 => 
            array (
                'id' => 129,
                'key' => 'depth',
                'value' => '36',
                'type' => 'decimal',
                'product_id' => 26,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:05',
            ),
            129 => 
            array (
                'id' => 130,
                'key' => 'wall_kit_available',
                'value' => '0',
                'type' => 'boolean',
                'product_id' => 26,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:05',
            ),
            130 => 
            array (
                'id' => 131,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 27,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:07',
            ),
            131 => 
            array (
                'id' => 132,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 27,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:07',
            ),
            132 => 
            array (
                'id' => 133,
                'key' => 'width',
                'value' => '48',
                'type' => 'decimal',
                'product_id' => 27,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:07',
            ),
            133 => 
            array (
                'id' => 134,
                'key' => 'depth',
                'value' => '36',
                'type' => 'decimal',
                'product_id' => 27,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:07',
            ),
            134 => 
            array (
                'id' => 135,
                'key' => 'wall_kit_available',
                'value' => '0',
                'type' => 'boolean',
                'product_id' => 27,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:07',
            ),
            135 => 
            array (
                'id' => 136,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 28,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:08',
            ),
            136 => 
            array (
                'id' => 137,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 28,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:08',
            ),
            137 => 
            array (
                'id' => 138,
                'key' => 'width',
                'value' => '48',
                'type' => 'decimal',
                'product_id' => 28,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:08',
            ),
            138 => 
            array (
                'id' => 139,
                'key' => 'depth',
                'value' => '36',
                'type' => 'decimal',
                'product_id' => 28,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:08',
            ),
            139 => 
            array (
                'id' => 140,
                'key' => 'wall_kit_available',
                'value' => '0',
                'type' => 'boolean',
                'product_id' => 28,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:08',
            ),
            140 => 
            array (
                'id' => 141,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 29,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:09',
            ),
            141 => 
            array (
                'id' => 142,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 29,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:09',
            ),
            142 => 
            array (
                'id' => 143,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 29,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:09',
            ),
            143 => 
            array (
                'id' => 144,
                'key' => 'depth',
                'value' => '30',
                'type' => 'decimal',
                'product_id' => 29,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:09',
            ),
            144 => 
            array (
                'id' => 145,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 29,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:09',
            ),
            145 => 
            array (
                'id' => 146,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 30,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:11',
            ),
            146 => 
            array (
                'id' => 147,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 30,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:11',
            ),
            147 => 
            array (
                'id' => 148,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 30,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:11',
            ),
            148 => 
            array (
                'id' => 149,
                'key' => 'depth',
                'value' => '30',
                'type' => 'decimal',
                'product_id' => 30,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:11',
            ),
            149 => 
            array (
                'id' => 150,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 30,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:11',
            ),
            150 => 
            array (
                'id' => 151,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 31,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:12',
            ),
            151 => 
            array (
                'id' => 152,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 31,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:12',
            ),
            152 => 
            array (
                'id' => 153,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 31,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:12',
            ),
            153 => 
            array (
                'id' => 154,
                'key' => 'depth',
                'value' => '32',
                'type' => 'decimal',
                'product_id' => 31,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:12',
            ),
            154 => 
            array (
                'id' => 155,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 31,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:12',
            ),
            155 => 
            array (
                'id' => 156,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 32,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:13',
            ),
            156 => 
            array (
                'id' => 157,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 32,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:13',
            ),
            157 => 
            array (
                'id' => 158,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 32,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:13',
            ),
            158 => 
            array (
                'id' => 159,
                'key' => 'depth',
                'value' => '32',
                'type' => 'decimal',
                'product_id' => 32,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:13',
            ),
            159 => 
            array (
                'id' => 160,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 32,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:13',
            ),
            160 => 
            array (
                'id' => 161,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 33,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:15',
            ),
            161 => 
            array (
                'id' => 162,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 33,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:15',
            ),
            162 => 
            array (
                'id' => 163,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 33,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:15',
            ),
            163 => 
            array (
                'id' => 164,
                'key' => 'depth',
                'value' => '34',
                'type' => 'decimal',
                'product_id' => 33,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:15',
            ),
            164 => 
            array (
                'id' => 165,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 33,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:15',
            ),
            165 => 
            array (
                'id' => 166,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 34,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:16',
            ),
            166 => 
            array (
                'id' => 167,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 34,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:16',
            ),
            167 => 
            array (
                'id' => 168,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 34,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:16',
            ),
            168 => 
            array (
                'id' => 169,
                'key' => 'depth',
                'value' => '34',
                'type' => 'decimal',
                'product_id' => 34,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:16',
            ),
            169 => 
            array (
                'id' => 170,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 34,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:16',
            ),
            170 => 
            array (
                'id' => 171,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 35,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:18',
            ),
            171 => 
            array (
                'id' => 172,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 35,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:18',
            ),
            172 => 
            array (
                'id' => 173,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 35,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:18',
            ),
            173 => 
            array (
                'id' => 174,
                'key' => 'depth',
                'value' => '36',
                'type' => 'decimal',
                'product_id' => 35,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:18',
            ),
            174 => 
            array (
                'id' => 175,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 35,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:18',
            ),
            175 => 
            array (
                'id' => 176,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 36,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:19',
            ),
            176 => 
            array (
                'id' => 177,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 36,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:19',
            ),
            177 => 
            array (
                'id' => 178,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 36,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:19',
            ),
            178 => 
            array (
                'id' => 179,
                'key' => 'depth',
                'value' => '36',
                'type' => 'decimal',
                'product_id' => 36,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:19',
            ),
            179 => 
            array (
                'id' => 180,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 36,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:19',
            ),
            180 => 
            array (
                'id' => 181,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 37,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:20',
            ),
            181 => 
            array (
                'id' => 182,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 37,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:20',
            ),
            182 => 
            array (
                'id' => 183,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 37,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:20',
            ),
            183 => 
            array (
                'id' => 184,
                'key' => 'depth',
                'value' => '42',
                'type' => 'decimal',
                'product_id' => 37,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:20',
            ),
            184 => 
            array (
                'id' => 185,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 37,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:20',
            ),
            185 => 
            array (
                'id' => 186,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 38,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:22',
            ),
            186 => 
            array (
                'id' => 187,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 38,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:22',
            ),
            187 => 
            array (
                'id' => 188,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 38,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:22',
            ),
            188 => 
            array (
                'id' => 189,
                'key' => 'depth',
                'value' => '42',
                'type' => 'decimal',
                'product_id' => 38,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:22',
            ),
            189 => 
            array (
                'id' => 190,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 38,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:22',
            ),
            190 => 
            array (
                'id' => 191,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 39,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:23',
            ),
            191 => 
            array (
                'id' => 192,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 39,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:23',
            ),
            192 => 
            array (
                'id' => 193,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 39,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:23',
            ),
            193 => 
            array (
                'id' => 194,
                'key' => 'depth',
                'value' => '48',
                'type' => 'decimal',
                'product_id' => 39,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:23',
            ),
            194 => 
            array (
                'id' => 195,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 39,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:23',
            ),
            195 => 
            array (
                'id' => 196,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 40,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:24',
            ),
            196 => 
            array (
                'id' => 197,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 40,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:24',
            ),
            197 => 
            array (
                'id' => 198,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 40,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:24',
            ),
            198 => 
            array (
                'id' => 199,
                'key' => 'depth',
                'value' => '48',
                'type' => 'decimal',
                'product_id' => 40,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:24',
            ),
            199 => 
            array (
                'id' => 200,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 40,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:24',
            ),
            200 => 
            array (
                'id' => 201,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 41,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:26',
            ),
            201 => 
            array (
                'id' => 202,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 41,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:26',
            ),
            202 => 
            array (
                'id' => 203,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 41,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:26',
            ),
            203 => 
            array (
                'id' => 204,
                'key' => 'depth',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 41,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:26',
            ),
            204 => 
            array (
                'id' => 205,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 41,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:41:26',
            ),
            205 => 
            array (
                'id' => 206,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 42,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:41:27',
            ),
            206 => 
            array (
                'id' => 207,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 42,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:41:27',
            ),
            207 => 
            array (
                'id' => 208,
                'key' => 'width',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 42,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:41:27',
            ),
            208 => 
            array (
                'id' => 209,
                'key' => 'depth',
                'value' => '60',
                'type' => 'decimal',
                'product_id' => 42,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:41:27',
            ),
            209 => 
            array (
                'id' => 210,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 42,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:41:27',
            ),
            210 => 
            array (
                'id' => 211,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 43,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:41:28',
            ),
            211 => 
            array (
                'id' => 212,
                'key' => 'pan_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 43,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:41:28',
            ),
            212 => 
            array (
                'id' => 213,
                'key' => 'width',
                'value' => '72',
                'type' => 'decimal',
                'product_id' => 43,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:41:28',
            ),
            213 => 
            array (
                'id' => 214,
                'key' => 'depth',
                'value' => '48',
                'type' => 'decimal',
                'product_id' => 43,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:41:28',
            ),
            214 => 
            array (
                'id' => 215,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 43,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:41:28',
            ),
            215 => 
            array (
                'id' => 216,
                'key' => 'plumbing_position',
                'value' => 'Center',
                'type' => 'string',
                'product_id' => 44,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            216 => 
            array (
                'id' => 217,
                'key' => 'pan_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 44,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            217 => 
            array (
                'id' => 218,
                'key' => 'width',
                'value' => '72',
                'type' => 'decimal',
                'product_id' => 44,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            218 => 
            array (
                'id' => 219,
                'key' => 'depth',
                'value' => '48',
                'type' => 'decimal',
                'product_id' => 44,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            219 => 
            array (
                'id' => 220,
                'key' => 'wall_kit_available',
                'value' => 'Sold Separately',
                'type' => 'boolean',
                'product_id' => 44,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            220 => 
            array (
                'id' => 221,
                'key' => 'description',
                'value' => '3 Walls, Monocolor + 2 Corner Joints',
                'type' => 'string',
                'product_id' => 45,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:32',
            ),
            221 => 
            array (
                'id' => 222,
                'key' => 'color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 45,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:32',
            ),
            222 => 
            array (
                'id' => 223,
                'key' => 'description',
                'value' => '3 Walls, Monocolor + 2 Corner Joints',
                'type' => 'string',
                'product_id' => 46,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:33',
            ),
            223 => 
            array (
                'id' => 224,
                'key' => 'color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 46,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:33',
            ),
            224 => 
            array (
                'id' => 225,
                'key' => 'description',
                'value' => '3 Walls, Monocolor + 2 Corner Joints',
                'type' => 'string',
                'product_id' => 47,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:34',
            ),
            225 => 
            array (
                'id' => 226,
                'key' => 'color_id',
                'value' => '3',
                'type' => 'App\\Color',
                'product_id' => 47,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:34',
            ),
            226 => 
            array (
                'id' => 227,
                'key' => 'description',
                'value' => '3 Walls, Monocolor + 2 Corner Joints',
                'type' => 'string',
                'product_id' => 48,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:35',
            ),
            227 => 
            array (
                'id' => 228,
                'key' => 'color_id',
                'value' => '4',
                'type' => 'App\\Color',
                'product_id' => 48,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:35',
            ),
            228 => 
            array (
                'id' => 229,
                'key' => 'description',
                'value' => '3 Walls, Monocolor + 2 Corner Joints',
                'type' => 'string',
                'product_id' => 49,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:36',
            ),
            229 => 
            array (
                'id' => 230,
                'key' => 'color_id',
                'value' => '5',
                'type' => 'App\\Color',
                'product_id' => 49,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:36',
            ),
            230 => 
            array (
                'id' => 231,
                'key' => 'description',
                'value' => '4 Walls, Monocolor + 2 Corner Joints',
                'type' => 'string',
                'product_id' => 50,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:37',
            ),
            231 => 
            array (
                'id' => 232,
                'key' => 'color_id',
                'value' => '6',
                'type' => 'App\\Color',
                'product_id' => 50,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:37',
            ),
            232 => 
            array (
                'id' => 233,
                'key' => 'description',
                'value' => '3 Walls, Multicolor + 2 Corner Joints',
                'type' => 'string',
                'product_id' => 51,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:37',
            ),
            233 => 
            array (
                'id' => 234,
                'key' => 'color_id',
                'value' => '7',
                'type' => 'App\\Color',
                'product_id' => 51,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:37',
            ),
            234 => 
            array (
                'id' => 235,
                'key' => 'description',
                'value' => '3 Walls, Multicolor + 2 Corner Joints',
                'type' => 'string',
                'product_id' => 52,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:38',
            ),
            235 => 
            array (
                'id' => 236,
                'key' => 'color_id',
                'value' => '8',
                'type' => 'App\\Color',
                'product_id' => 52,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:38',
            ),
            236 => 
            array (
                'id' => 237,
                'key' => 'description',
                'value' => '3 Walls, Multicolor + 2 Corner Joints',
                'type' => 'string',
                'product_id' => 53,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:38',
            ),
            237 => 
            array (
                'id' => 238,
                'key' => 'color_id',
                'value' => '9',
                'type' => 'App\\Color',
                'product_id' => 53,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:38',
            ),
            238 => 
            array (
                'id' => 239,
                'key' => 'description',
                'value' => '3 Walls, Multicolor + 2 Corner Joints',
                'type' => 'string',
                'product_id' => 54,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:39',
            ),
            239 => 
            array (
                'id' => 240,
                'key' => 'color_id',
                'value' => '10',
                'type' => 'App\\Color',
                'product_id' => 54,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:39',
            ),
            240 => 
            array (
                'id' => 241,
                'key' => 'description',
                'value' => '3 Walls, Multicolor + 2 Corner Joints',
                'type' => 'string',
                'product_id' => 55,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:40',
            ),
            241 => 
            array (
                'id' => 242,
                'key' => 'color_id',
                'value' => '11',
                'type' => 'App\\Color',
                'product_id' => 55,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:40',
            ),
            242 => 
            array (
                'id' => 243,
                'key' => 'description',
                'value' => '60 x 96" Wall',
                'type' => 'string',
                'product_id' => 56,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:41',
            ),
            243 => 
            array (
                'id' => 244,
                'key' => 'color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 56,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:41',
            ),
            244 => 
            array (
                'id' => 245,
                'key' => 'description',
                'value' => '60 x 96" Wall',
                'type' => 'string',
                'product_id' => 57,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:42',
            ),
            245 => 
            array (
                'id' => 246,
                'key' => 'color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 57,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:42',
            ),
            246 => 
            array (
                'id' => 247,
                'key' => 'description',
                'value' => '60 x 96" Wall',
                'type' => 'string',
                'product_id' => 58,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:44',
            ),
            247 => 
            array (
                'id' => 248,
                'key' => 'color_id',
                'value' => '3',
                'type' => 'App\\Color',
                'product_id' => 58,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:44',
            ),
            248 => 
            array (
                'id' => 249,
                'key' => 'description',
                'value' => '60 x 96" Wall',
                'type' => 'string',
                'product_id' => 59,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:46',
            ),
            249 => 
            array (
                'id' => 250,
                'key' => 'color_id',
                'value' => '4',
                'type' => 'App\\Color',
                'product_id' => 59,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:46',
            ),
            250 => 
            array (
                'id' => 251,
                'key' => 'description',
                'value' => '60 x 96" Wall',
                'type' => 'string',
                'product_id' => 60,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:48',
            ),
            251 => 
            array (
                'id' => 252,
                'key' => 'color_id',
                'value' => '5',
                'type' => 'App\\Color',
                'product_id' => 60,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:48',
            ),
            252 => 
            array (
                'id' => 253,
                'key' => 'description',
                'value' => '60 x 96" Wall',
                'type' => 'string',
                'product_id' => 61,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:50',
            ),
            253 => 
            array (
                'id' => 254,
                'key' => 'color_id',
                'value' => '6',
                'type' => 'App\\Color',
                'product_id' => 61,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:50',
            ),
            254 => 
            array (
                'id' => 255,
                'key' => 'description',
                'value' => '36 X 96" Wall',
                'type' => 'string',
                'product_id' => 62,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:51',
            ),
            255 => 
            array (
                'id' => 256,
                'key' => 'color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 62,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:51',
            ),
            256 => 
            array (
                'id' => 257,
                'key' => 'description',
                'value' => '36 X 96" Wall',
                'type' => 'string',
                'product_id' => 63,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:53',
            ),
            257 => 
            array (
                'id' => 258,
                'key' => 'color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 63,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:53',
            ),
            258 => 
            array (
                'id' => 259,
                'key' => 'description',
                'value' => '36 X 96" Wall',
                'type' => 'string',
                'product_id' => 64,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:54',
            ),
            259 => 
            array (
                'id' => 260,
                'key' => 'color_id',
                'value' => '3',
                'type' => 'App\\Color',
                'product_id' => 64,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:54',
            ),
            260 => 
            array (
                'id' => 261,
                'key' => 'description',
                'value' => '36 X 96" Wall',
                'type' => 'string',
                'product_id' => 65,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:57',
            ),
            261 => 
            array (
                'id' => 262,
                'key' => 'color_id',
                'value' => '4',
                'type' => 'App\\Color',
                'product_id' => 65,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:57',
            ),
            262 => 
            array (
                'id' => 263,
                'key' => 'description',
                'value' => '36 X 96" Wall',
                'type' => 'string',
                'product_id' => 66,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:59',
            ),
            263 => 
            array (
                'id' => 264,
                'key' => 'color_id',
                'value' => '5',
                'type' => 'App\\Color',
                'product_id' => 66,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:59',
            ),
            264 => 
            array (
                'id' => 265,
                'key' => 'description',
                'value' => '36 X 96" Wall',
                'type' => 'string',
                'product_id' => 67,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:01',
            ),
            265 => 
            array (
                'id' => 266,
                'key' => 'color_id',
                'value' => '6',
                'type' => 'App\\Color',
                'product_id' => 67,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:01',
            ),
            266 => 
            array (
                'id' => 267,
                'key' => 'description',
                'value' => '96" Edge Trim',
                'type' => 'string',
                'product_id' => 68,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:02',
            ),
            267 => 
            array (
                'id' => 268,
                'key' => 'color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 68,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:02',
            ),
            268 => 
            array (
                'id' => 269,
                'key' => 'description',
                'value' => '96" Edge Trim',
                'type' => 'string',
                'product_id' => 69,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:03',
            ),
            269 => 
            array (
                'id' => 270,
                'key' => 'color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 69,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:03',
            ),
            270 => 
            array (
                'id' => 271,
                'key' => 'description',
                'value' => '96" Edge Trim',
                'type' => 'string',
                'product_id' => 70,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:04',
            ),
            271 => 
            array (
                'id' => 272,
                'key' => 'color_id',
                'value' => '12',
                'type' => 'App\\Color',
                'product_id' => 70,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:04',
            ),
            272 => 
            array (
                'id' => 273,
                'key' => 'description',
                'value' => '96" Edge Trim',
                'type' => 'string',
                'product_id' => 71,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:05',
            ),
            273 => 
            array (
                'id' => 274,
                'key' => 'color_id',
                'value' => '13',
                'type' => 'App\\Color',
                'product_id' => 71,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:05',
            ),
            274 => 
            array (
                'id' => 275,
                'key' => 'description',
                'value' => '96" Edge Trim',
                'type' => 'string',
                'product_id' => 72,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:06',
            ),
            275 => 
            array (
                'id' => 276,
                'key' => 'color_id',
                'value' => '14',
                'type' => 'App\\Color',
                'product_id' => 72,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:06',
            ),
            276 => 
            array (
                'id' => 277,
                'key' => 'description',
                'value' => '96" Edge Trim',
                'type' => 'string',
                'product_id' => 73,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:06',
            ),
            277 => 
            array (
                'id' => 278,
                'key' => 'color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 73,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:06',
            ),
            278 => 
            array (
                'id' => 279,
                'key' => 'description',
                'value' => '96" Edge Trim with a 3/8" return',
                'type' => 'string',
                'product_id' => 74,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:08',
            ),
            279 => 
            array (
                'id' => 280,
                'key' => 'color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 74,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:08',
            ),
            280 => 
            array (
                'id' => 281,
                'key' => 'description',
                'value' => '96" Edge Trim with a 3/8" return',
                'type' => 'string',
                'product_id' => 75,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:09',
            ),
            281 => 
            array (
                'id' => 282,
                'key' => 'color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 75,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:09',
            ),
            282 => 
            array (
                'id' => 283,
                'key' => 'description',
                'value' => '96" Edge Trim with a 3/8" return',
                'type' => 'string',
                'product_id' => 76,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:11',
            ),
            283 => 
            array (
                'id' => 284,
                'key' => 'color_id',
                'value' => '12',
                'type' => 'App\\Color',
                'product_id' => 76,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:11',
            ),
            284 => 
            array (
                'id' => 285,
                'key' => 'description',
                'value' => '96" Edge Trim with a 3/8" return',
                'type' => 'string',
                'product_id' => 77,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:12',
            ),
            285 => 
            array (
                'id' => 286,
                'key' => 'color_id',
                'value' => '13',
                'type' => 'App\\Color',
                'product_id' => 77,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:12',
            ),
            286 => 
            array (
                'id' => 287,
                'key' => 'description',
                'value' => '96" Edge Trim with a 3/8" return',
                'type' => 'string',
                'product_id' => 78,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:14',
            ),
            287 => 
            array (
                'id' => 288,
                'key' => 'color_id',
                'value' => '14',
                'type' => 'App\\Color',
                'product_id' => 78,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:14',
            ),
            288 => 
            array (
                'id' => 289,
                'key' => 'description',
                'value' => '96" Edge Trim with a 3/8" return',
                'type' => 'string',
                'product_id' => 79,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:16',
            ),
            289 => 
            array (
                'id' => 290,
                'key' => 'color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 79,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:16',
            ),
            290 => 
            array (
                'id' => 291,
                'key' => 'description',
                'value' => '96" Inside Corner Joints',
                'type' => 'string',
                'product_id' => 80,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:17',
            ),
            291 => 
            array (
                'id' => 292,
                'key' => 'color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 80,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:17',
            ),
            292 => 
            array (
                'id' => 293,
                'key' => 'description',
                'value' => '96" Inside Corner Joints',
                'type' => 'string',
                'product_id' => 81,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:18',
            ),
            293 => 
            array (
                'id' => 294,
                'key' => 'color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 81,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:18',
            ),
            294 => 
            array (
                'id' => 295,
                'key' => 'description',
                'value' => '96" Inside Corner Joints',
                'type' => 'string',
                'product_id' => 82,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:20',
            ),
            295 => 
            array (
                'id' => 296,
                'key' => 'color_id',
                'value' => '12',
                'type' => 'App\\Color',
                'product_id' => 82,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:20',
            ),
            296 => 
            array (
                'id' => 297,
                'key' => 'description',
                'value' => '96" Inside Corner Joints',
                'type' => 'string',
                'product_id' => 83,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:22',
            ),
            297 => 
            array (
                'id' => 298,
                'key' => 'color_id',
                'value' => '13',
                'type' => 'App\\Color',
                'product_id' => 83,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:22',
            ),
            298 => 
            array (
                'id' => 299,
                'key' => 'description',
                'value' => '96" Inside Corner Joints',
                'type' => 'string',
                'product_id' => 84,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:23',
            ),
            299 => 
            array (
                'id' => 300,
                'key' => 'color_id',
                'value' => '14',
                'type' => 'App\\Color',
                'product_id' => 84,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:23',
            ),
            300 => 
            array (
                'id' => 301,
                'key' => 'description',
                'value' => '96" Inside Corner Joints',
                'type' => 'string',
                'product_id' => 85,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:25',
            ),
            301 => 
            array (
                'id' => 302,
                'key' => 'color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 85,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:25',
            ),
            302 => 
            array (
                'id' => 303,
                'key' => 'description',
                'value' => '96" Outside Corner Joints',
                'type' => 'string',
                'product_id' => 86,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:27',
            ),
            303 => 
            array (
                'id' => 304,
                'key' => 'color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 86,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:27',
            ),
            304 => 
            array (
                'id' => 305,
                'key' => 'description',
                'value' => '96" Outside Corner Joints',
                'type' => 'string',
                'product_id' => 87,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:28',
            ),
            305 => 
            array (
                'id' => 306,
                'key' => 'color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 87,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:28',
            ),
            306 => 
            array (
                'id' => 307,
                'key' => 'description',
                'value' => '96" Outside Corner Joints',
                'type' => 'string',
                'product_id' => 88,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:30',
            ),
            307 => 
            array (
                'id' => 308,
                'key' => 'color_id',
                'value' => '12',
                'type' => 'App\\Color',
                'product_id' => 88,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:30',
            ),
            308 => 
            array (
                'id' => 309,
                'key' => 'description',
                'value' => '96" Outside Corner Joints',
                'type' => 'string',
                'product_id' => 89,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:31',
            ),
            309 => 
            array (
                'id' => 310,
                'key' => 'color_id',
                'value' => '13',
                'type' => 'App\\Color',
                'product_id' => 89,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:31',
            ),
            310 => 
            array (
                'id' => 311,
                'key' => 'description',
                'value' => '96" Outside Corner Joints',
                'type' => 'string',
                'product_id' => 90,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:33',
            ),
            311 => 
            array (
                'id' => 312,
                'key' => 'color_id',
                'value' => '14',
                'type' => 'App\\Color',
                'product_id' => 90,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:33',
            ),
            312 => 
            array (
                'id' => 313,
                'key' => 'description',
                'value' => '96" Outside Corner Joints',
                'type' => 'string',
                'product_id' => 91,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            313 => 
            array (
                'id' => 314,
                'key' => 'color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 91,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            314 => 
            array (
                'id' => 315,
                'key' => 'fixture_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 92,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:37',
            ),
            315 => 
            array (
                'id' => 316,
                'key' => 'description',
                'value' => 'Freestanding Shower Seat',
                'type' => 'string',
                'product_id' => 92,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:37',
            ),
            316 => 
            array (
                'id' => 317,
                'key' => 'fixture_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 93,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:38',
            ),
            317 => 
            array (
                'id' => 318,
                'key' => 'description',
                'value' => 'Freestanding Shower Seat',
                'type' => 'string',
                'product_id' => 93,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:38',
            ),
            318 => 
            array (
                'id' => 319,
                'key' => 'fixture_color_id',
                'value' => '16',
                'type' => 'App\\Color',
                'product_id' => 94,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:39',
            ),
            319 => 
            array (
                'id' => 320,
                'key' => 'description',
                'value' => 'Mounted Shower Seat',
                'type' => 'string',
                'product_id' => 94,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:39',
            ),
            320 => 
            array (
                'id' => 321,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 95,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:40',
            ),
            321 => 
            array (
                'id' => 322,
                'key' => 'description',
                'value' => 'Alteo Shower Unit with Valve',
                'type' => 'string',
                'product_id' => 95,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:40',
            ),
            322 => 
            array (
                'id' => 323,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 96,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:42',
            ),
            323 => 
            array (
                'id' => 324,
                'key' => 'description',
                'value' => 'Alteo Shower Unit w/valve',
                'type' => 'string',
                'product_id' => 96,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:42',
            ),
            324 => 
            array (
                'id' => 325,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 97,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:43',
            ),
            325 => 
            array (
                'id' => 326,
                'key' => 'description',
                'value' => 'Devonshire Shower Unit w/valve',
                'type' => 'string',
                'product_id' => 97,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:43',
            ),
            326 => 
            array (
                'id' => 327,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 98,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:45',
            ),
            327 => 
            array (
                'id' => 328,
                'key' => 'description',
                'value' => 'Devonshire Shower Unit w/valve',
                'type' => 'string',
                'product_id' => 98,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:45',
            ),
            328 => 
            array (
                'id' => 329,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 99,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:47',
            ),
            329 => 
            array (
                'id' => 330,
                'key' => 'description',
                'value' => 'Hydorail-S Shower system w/valve & trim',
                'type' => 'string',
                'product_id' => 99,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:47',
            ),
            330 => 
            array (
                'id' => 331,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 100,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:49',
            ),
            331 => 
            array (
                'id' => 332,
                'key' => 'description',
                'value' => 'Hydorail-S Shower system w/valve & trim',
                'type' => 'string',
                'product_id' => 100,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:49',
            ),
            332 => 
            array (
                'id' => 333,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 101,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:51',
            ),
            333 => 
            array (
                'id' => 334,
                'key' => 'description',
                'value' => 'Slide Rail System with diverter & trim',
                'type' => 'string',
                'product_id' => 101,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:51',
            ),
            334 => 
            array (
                'id' => 335,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 102,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:53',
            ),
            335 => 
            array (
                'id' => 336,
                'key' => 'description',
                'value' => 'Slide Rail System with diverter & trim',
                'type' => 'string',
                'product_id' => 102,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:53',
            ),
            336 => 
            array (
                'id' => 337,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 103,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:54',
            ),
            337 => 
            array (
                'id' => 338,
                'key' => 'description',
                'value' => '10" Ceiling rainhead with diverter & trim',
                'type' => 'string',
                'product_id' => 103,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:54',
            ),
            338 => 
            array (
                'id' => 339,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 104,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:56',
            ),
            339 => 
            array (
                'id' => 340,
                'key' => 'description',
                'value' => '10" Ceiling rainhead with diverter & trim',
                'type' => 'string',
                'product_id' => 104,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:56',
            ),
            340 => 
            array (
                'id' => 341,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 105,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:58',
            ),
            341 => 
            array (
                'id' => 342,
                'key' => 'description',
                'value' => '72" Shower Tension Curtain Rod',
                'type' => 'string',
                'product_id' => 105,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:58',
            ),
            342 => 
            array (
                'id' => 343,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 106,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:00',
            ),
            343 => 
            array (
                'id' => 344,
                'key' => 'description',
                'value' => '72" Shower Tension Curtain Rod',
                'type' => 'string',
                'product_id' => 106,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:00',
            ),
            344 => 
            array (
                'id' => 345,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 107,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:01',
            ),
            345 => 
            array (
                'id' => 346,
                'key' => 'description',
                'value' => '24" Barre Shelf',
                'type' => 'string',
                'product_id' => 107,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:01',
            ),
            346 => 
            array (
                'id' => 347,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 108,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:03',
            ),
            347 => 
            array (
                'id' => 348,
                'key' => 'description',
                'value' => '24" Barre Shelf',
                'type' => 'string',
                'product_id' => 108,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:03',
            ),
            348 => 
            array (
                'id' => 349,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 109,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:05',
            ),
            349 => 
            array (
                'id' => 350,
                'key' => 'description',
                'value' => '36" Barre Shelf',
                'type' => 'string',
                'product_id' => 109,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:05',
            ),
            350 => 
            array (
                'id' => 351,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 110,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:07',
            ),
            351 => 
            array (
                'id' => 352,
                'key' => 'description',
                'value' => '36" Barre Shelf',
                'type' => 'string',
                'product_id' => 110,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:07',
            ),
            352 => 
            array (
                'id' => 353,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 111,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:09',
            ),
            353 => 
            array (
                'id' => 354,
                'key' => 'description',
                'value' => '54" Barre Shelf',
                'type' => 'string',
                'product_id' => 111,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:09',
            ),
            354 => 
            array (
                'id' => 355,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 112,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:11',
            ),
            355 => 
            array (
                'id' => 356,
                'key' => 'description',
                'value' => '54" Barre Shelf',
                'type' => 'string',
                'product_id' => 112,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:11',
            ),
            356 => 
            array (
                'id' => 357,
                'key' => 'fixture_color_id',
                'value' => '16',
                'type' => 'App\\Color',
                'product_id' => 113,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:12',
            ),
            357 => 
            array (
                'id' => 358,
                'key' => 'description',
                'value' => 'Teak soap & washcloth tray',
                'type' => 'string',
                'product_id' => 113,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:12',
            ),
            358 => 
            array (
                'id' => 359,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 114,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:14',
            ),
            359 => 
            array (
                'id' => 360,
                'key' => 'description',
                'value' => '7" Floating Soap Shelf',
                'type' => 'string',
                'product_id' => 114,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:14',
            ),
            360 => 
            array (
                'id' => 361,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 115,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:16',
            ),
            361 => 
            array (
                'id' => 362,
                'key' => 'description',
                'value' => '7" Floating Soap Shelf',
                'type' => 'string',
                'product_id' => 115,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:16',
            ),
            362 => 
            array (
                'id' => 363,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 116,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:18',
            ),
            363 => 
            array (
                'id' => 364,
                'key' => 'description',
                'value' => '14" Floating Shelf w/2 razor holes',
                'type' => 'string',
                'product_id' => 116,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:18',
            ),
            364 => 
            array (
                'id' => 365,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 117,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:20',
            ),
            365 => 
            array (
                'id' => 366,
                'key' => 'description',
                'value' => '14" Floating Shelf w/2 razor holes',
                'type' => 'string',
                'product_id' => 117,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:20',
            ),
            366 => 
            array (
                'id' => 367,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 118,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:21',
            ),
            367 => 
            array (
                'id' => 368,
                'key' => 'description',
                'value' => '21" Floating Shelf w/washcloth hole',
                'type' => 'string',
                'product_id' => 118,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:21',
            ),
            368 => 
            array (
                'id' => 369,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 119,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:23',
            ),
            369 => 
            array (
                'id' => 370,
                'key' => 'description',
                'value' => '21" Floating Shelf w/washcloth hole',
                'type' => 'string',
                'product_id' => 119,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:23',
            ),
            370 => 
            array (
                'id' => 371,
                'key' => 'fixture_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 120,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:25',
            ),
            371 => 
            array (
                'id' => 372,
                'key' => 'description',
                'value' => '9" Shower Locker',
                'type' => 'string',
                'product_id' => 120,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:25',
            ),
            372 => 
            array (
                'id' => 373,
                'key' => 'fixture_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 121,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:26',
            ),
            373 => 
            array (
                'id' => 374,
                'key' => 'description',
                'value' => '9" Shower Locker',
                'type' => 'string',
                'product_id' => 121,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:26',
            ),
            374 => 
            array (
                'id' => 375,
                'key' => 'fixture_color_id',
                'value' => '12',
                'type' => 'App\\Color',
                'product_id' => 122,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:28',
            ),
            375 => 
            array (
                'id' => 376,
                'key' => 'description',
                'value' => '9" Shower Locker',
                'type' => 'string',
                'product_id' => 122,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:28',
            ),
            376 => 
            array (
                'id' => 377,
                'key' => 'fixture_color_id',
                'value' => '13',
                'type' => 'App\\Color',
                'product_id' => 123,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:29',
            ),
            377 => 
            array (
                'id' => 378,
                'key' => 'description',
                'value' => '9" Shower Locker',
                'type' => 'string',
                'product_id' => 123,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:29',
            ),
            378 => 
            array (
                'id' => 379,
                'key' => 'fixture_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 124,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:31',
            ),
            379 => 
            array (
                'id' => 380,
                'key' => 'description',
                'value' => '14" Shower Locker',
                'type' => 'string',
                'product_id' => 124,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:31',
            ),
            380 => 
            array (
                'id' => 381,
                'key' => 'fixture_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 125,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:32',
            ),
            381 => 
            array (
                'id' => 382,
                'key' => 'description',
                'value' => '14" Shower Locker',
                'type' => 'string',
                'product_id' => 125,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:32',
            ),
            382 => 
            array (
                'id' => 383,
                'key' => 'fixture_color_id',
                'value' => '12',
                'type' => 'App\\Color',
                'product_id' => 126,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:34',
            ),
            383 => 
            array (
                'id' => 384,
                'key' => 'description',
                'value' => '14" Shower Locker',
                'type' => 'string',
                'product_id' => 126,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:34',
            ),
            384 => 
            array (
                'id' => 385,
                'key' => 'fixture_color_id',
                'value' => '13',
                'type' => 'App\\Color',
                'product_id' => 127,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:36',
            ),
            385 => 
            array (
                'id' => 386,
                'key' => 'description',
                'value' => '14" Shower Locker',
                'type' => 'string',
                'product_id' => 127,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:36',
            ),
            386 => 
            array (
                'id' => 387,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 128,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:37',
            ),
            387 => 
            array (
                'id' => 388,
                'key' => 'description',
                'value' => '18" Traditional Grab Bar',
                'type' => 'string',
                'product_id' => 128,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:37',
            ),
            388 => 
            array (
                'id' => 389,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 129,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:39',
            ),
            389 => 
            array (
                'id' => 390,
                'key' => 'description',
                'value' => '18" Traditional Grab Bar',
                'type' => 'string',
                'product_id' => 129,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:39',
            ),
            390 => 
            array (
                'id' => 391,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 130,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:41',
            ),
            391 => 
            array (
                'id' => 392,
                'key' => 'description',
                'value' => '24" Traditional Grab Bar',
                'type' => 'string',
                'product_id' => 130,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:41',
            ),
            392 => 
            array (
                'id' => 393,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 131,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:43',
            ),
            393 => 
            array (
                'id' => 394,
                'key' => 'description',
                'value' => '24" Traditional Grab Bar',
                'type' => 'string',
                'product_id' => 131,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:43',
            ),
            394 => 
            array (
                'id' => 395,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 132,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:45',
            ),
            395 => 
            array (
                'id' => 396,
                'key' => 'description',
                'value' => '36" Traditional Grab Bar',
                'type' => 'string',
                'product_id' => 132,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:45',
            ),
            396 => 
            array (
                'id' => 397,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 133,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:47',
            ),
            397 => 
            array (
                'id' => 398,
                'key' => 'description',
                'value' => '36" Traditional Grab Bar',
                'type' => 'string',
                'product_id' => 133,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:47',
            ),
            398 => 
            array (
                'id' => 399,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 134,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:48',
            ),
            399 => 
            array (
                'id' => 400,
                'key' => 'description',
                'value' => '12" Purist Straight Grab Bar',
                'type' => 'string',
                'product_id' => 134,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:48',
            ),
            400 => 
            array (
                'id' => 401,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 135,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:51',
            ),
            401 => 
            array (
                'id' => 402,
                'key' => 'description',
                'value' => '12" Purist Straight Grab Bar',
                'type' => 'string',
                'product_id' => 135,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:51',
            ),
            402 => 
            array (
                'id' => 403,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 136,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:52',
            ),
            403 => 
            array (
                'id' => 404,
                'key' => 'description',
                'value' => '18" Purist Straight Grab Bar',
                'type' => 'string',
                'product_id' => 136,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:52',
            ),
            404 => 
            array (
                'id' => 405,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 137,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:54',
            ),
            405 => 
            array (
                'id' => 406,
                'key' => 'description',
                'value' => '18" Purist Straight Grab Bar',
                'type' => 'string',
                'product_id' => 137,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:54',
            ),
            406 => 
            array (
                'id' => 407,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 138,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:56',
            ),
            407 => 
            array (
                'id' => 408,
                'key' => 'description',
                'value' => '24" Purist Straight Grab Bar',
                'type' => 'string',
                'product_id' => 138,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:56',
            ),
            408 => 
            array (
                'id' => 409,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 139,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:58',
            ),
            409 => 
            array (
                'id' => 410,
                'key' => 'description',
                'value' => '24" Purist Straight Grab Bar',
                'type' => 'string',
                'product_id' => 139,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:43:58',
            ),
            410 => 
            array (
                'id' => 411,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 140,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:44:00',
            ),
            411 => 
            array (
                'id' => 412,
                'key' => 'description',
                'value' => 'Shower Hook',
                'type' => 'string',
                'product_id' => 140,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:44:00',
            ),
            412 => 
            array (
                'id' => 413,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 141,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:44:02',
            ),
            413 => 
            array (
                'id' => 414,
                'key' => 'description',
                'value' => 'Shower Hook',
                'type' => 'string',
                'product_id' => 141,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:44:02',
            ),
            414 => 
            array (
                'id' => 415,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 142,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:44:04',
            ),
            415 => 
            array (
                'id' => 416,
                'key' => 'description',
                'value' => 'Handshower Cradel',
                'type' => 'string',
                'product_id' => 142,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:44:04',
            ),
            416 => 
            array (
                'id' => 417,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 143,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            417 => 
            array (
                'id' => 418,
                'key' => 'description',
                'value' => 'Handshower Cradel',
                'type' => 'string',
                'product_id' => 143,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            418 => 
            array (
                'id' => 419,
                'key' => 'with_bathtub',
                'value' => '0',
                'type' => NULL,
                'product_id' => 92,
                'created_at' => '2020-01-28 03:42:37',
                'updated_at' => '2020-01-28 03:42:37',
            ),
            419 => 
            array (
                'id' => 420,
                'key' => 'with_bathtub',
                'value' => '0',
                'type' => NULL,
                'product_id' => 93,
                'created_at' => '2020-01-28 03:42:38',
                'updated_at' => '2020-01-28 03:42:38',
            ),
            420 => 
            array (
                'id' => 421,
                'key' => 'with_bathtub',
                'value' => '0',
                'type' => NULL,
                'product_id' => 94,
                'created_at' => '2020-01-28 03:42:39',
                'updated_at' => '2020-01-28 03:42:39',
            ),
            421 => 
            array (
                'id' => 422,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 95,
                'created_at' => '2020-01-28 03:42:40',
                'updated_at' => '2020-01-28 03:42:40',
            ),
            422 => 
            array (
                'id' => 423,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 96,
                'created_at' => '2020-01-28 03:42:42',
                'updated_at' => '2020-01-28 03:42:42',
            ),
            423 => 
            array (
                'id' => 424,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 97,
                'created_at' => '2020-01-28 03:42:43',
                'updated_at' => '2020-01-28 03:42:43',
            ),
            424 => 
            array (
                'id' => 425,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 98,
                'created_at' => '2020-01-28 03:42:45',
                'updated_at' => '2020-01-28 03:42:45',
            ),
            425 => 
            array (
                'id' => 426,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 99,
                'created_at' => '2020-01-28 03:42:47',
                'updated_at' => '2020-01-28 03:42:47',
            ),
            426 => 
            array (
                'id' => 427,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 100,
                'created_at' => '2020-01-28 03:42:49',
                'updated_at' => '2020-01-28 03:42:49',
            ),
            427 => 
            array (
                'id' => 428,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 101,
                'created_at' => '2020-01-28 03:42:51',
                'updated_at' => '2020-01-28 03:42:51',
            ),
            428 => 
            array (
                'id' => 429,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 102,
                'created_at' => '2020-01-28 03:42:53',
                'updated_at' => '2020-01-28 03:42:53',
            ),
            429 => 
            array (
                'id' => 430,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 103,
                'created_at' => '2020-01-28 03:42:54',
                'updated_at' => '2020-01-28 03:42:54',
            ),
            430 => 
            array (
                'id' => 431,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 104,
                'created_at' => '2020-01-28 03:42:56',
                'updated_at' => '2020-01-28 03:42:56',
            ),
            431 => 
            array (
                'id' => 432,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 105,
                'created_at' => '2020-01-28 03:42:58',
                'updated_at' => '2020-01-28 03:42:58',
            ),
            432 => 
            array (
                'id' => 433,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 106,
                'created_at' => '2020-01-28 03:43:00',
                'updated_at' => '2020-01-28 03:43:00',
            ),
            433 => 
            array (
                'id' => 434,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 107,
                'created_at' => '2020-01-28 03:43:01',
                'updated_at' => '2020-01-28 03:43:01',
            ),
            434 => 
            array (
                'id' => 435,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 108,
                'created_at' => '2020-01-28 03:43:03',
                'updated_at' => '2020-01-28 03:43:03',
            ),
            435 => 
            array (
                'id' => 436,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 109,
                'created_at' => '2020-01-28 03:43:05',
                'updated_at' => '2020-01-28 03:43:05',
            ),
            436 => 
            array (
                'id' => 437,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 110,
                'created_at' => '2020-01-28 03:43:07',
                'updated_at' => '2020-01-28 03:43:07',
            ),
            437 => 
            array (
                'id' => 438,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 111,
                'created_at' => '2020-01-28 03:43:09',
                'updated_at' => '2020-01-28 03:43:09',
            ),
            438 => 
            array (
                'id' => 439,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 112,
                'created_at' => '2020-01-28 03:43:11',
                'updated_at' => '2020-01-28 03:43:11',
            ),
            439 => 
            array (
                'id' => 440,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 113,
                'created_at' => '2020-01-28 03:43:12',
                'updated_at' => '2020-01-28 03:43:12',
            ),
            440 => 
            array (
                'id' => 441,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 114,
                'created_at' => '2020-01-28 03:43:14',
                'updated_at' => '2020-01-28 03:43:14',
            ),
            441 => 
            array (
                'id' => 442,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 115,
                'created_at' => '2020-01-28 03:43:16',
                'updated_at' => '2020-01-28 03:43:16',
            ),
            442 => 
            array (
                'id' => 443,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 116,
                'created_at' => '2020-01-28 03:43:18',
                'updated_at' => '2020-01-28 03:43:18',
            ),
            443 => 
            array (
                'id' => 444,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 117,
                'created_at' => '2020-01-28 03:43:20',
                'updated_at' => '2020-01-28 03:43:20',
            ),
            444 => 
            array (
                'id' => 445,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 118,
                'created_at' => '2020-01-28 03:43:21',
                'updated_at' => '2020-01-28 03:43:21',
            ),
            445 => 
            array (
                'id' => 446,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 119,
                'created_at' => '2020-01-28 03:43:23',
                'updated_at' => '2020-01-28 03:43:23',
            ),
            446 => 
            array (
                'id' => 447,
                'key' => 'with_bathtub',
                'value' => '0',
                'type' => NULL,
                'product_id' => 120,
                'created_at' => '2020-01-28 03:43:25',
                'updated_at' => '2020-01-28 03:43:25',
            ),
            447 => 
            array (
                'id' => 448,
                'key' => 'with_bathtub',
                'value' => '0',
                'type' => NULL,
                'product_id' => 121,
                'created_at' => '2020-01-28 03:43:26',
                'updated_at' => '2020-01-28 03:43:26',
            ),
            448 => 
            array (
                'id' => 449,
                'key' => 'with_bathtub',
                'value' => '0',
                'type' => NULL,
                'product_id' => 122,
                'created_at' => '2020-01-28 03:43:28',
                'updated_at' => '2020-01-28 03:43:28',
            ),
            449 => 
            array (
                'id' => 450,
                'key' => 'with_bathtub',
                'value' => '0',
                'type' => NULL,
                'product_id' => 123,
                'created_at' => '2020-01-28 03:43:29',
                'updated_at' => '2020-01-28 03:43:29',
            ),
            450 => 
            array (
                'id' => 451,
                'key' => 'with_bathtub',
                'value' => '0',
                'type' => NULL,
                'product_id' => 124,
                'created_at' => '2020-01-28 03:43:31',
                'updated_at' => '2020-01-28 03:43:31',
            ),
            451 => 
            array (
                'id' => 452,
                'key' => 'with_bathtub',
                'value' => '0',
                'type' => NULL,
                'product_id' => 125,
                'created_at' => '2020-01-28 03:43:32',
                'updated_at' => '2020-01-28 03:43:32',
            ),
            452 => 
            array (
                'id' => 453,
                'key' => 'with_bathtub',
                'value' => '0',
                'type' => NULL,
                'product_id' => 126,
                'created_at' => '2020-01-28 03:43:34',
                'updated_at' => '2020-01-28 03:43:34',
            ),
            453 => 
            array (
                'id' => 454,
                'key' => 'with_bathtub',
                'value' => '0',
                'type' => NULL,
                'product_id' => 127,
                'created_at' => '2020-01-28 03:43:36',
                'updated_at' => '2020-01-28 03:43:36',
            ),
            454 => 
            array (
                'id' => 455,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 128,
                'created_at' => '2020-01-28 03:43:37',
                'updated_at' => '2020-01-28 03:43:37',
            ),
            455 => 
            array (
                'id' => 456,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 129,
                'created_at' => '2020-01-28 03:43:39',
                'updated_at' => '2020-01-28 03:43:39',
            ),
            456 => 
            array (
                'id' => 457,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 130,
                'created_at' => '2020-01-28 03:43:41',
                'updated_at' => '2020-01-28 03:43:41',
            ),
            457 => 
            array (
                'id' => 458,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 131,
                'created_at' => '2020-01-28 03:43:43',
                'updated_at' => '2020-01-28 03:43:43',
            ),
            458 => 
            array (
                'id' => 459,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 132,
                'created_at' => '2020-01-28 03:43:45',
                'updated_at' => '2020-01-28 03:43:45',
            ),
            459 => 
            array (
                'id' => 460,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 133,
                'created_at' => '2020-01-28 03:43:47',
                'updated_at' => '2020-01-28 03:43:47',
            ),
            460 => 
            array (
                'id' => 461,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 134,
                'created_at' => '2020-01-28 03:43:48',
                'updated_at' => '2020-01-28 03:43:48',
            ),
            461 => 
            array (
                'id' => 462,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 135,
                'created_at' => '2020-01-28 03:43:51',
                'updated_at' => '2020-01-28 03:43:51',
            ),
            462 => 
            array (
                'id' => 463,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 136,
                'created_at' => '2020-01-28 03:43:52',
                'updated_at' => '2020-01-28 03:43:52',
            ),
            463 => 
            array (
                'id' => 464,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 137,
                'created_at' => '2020-01-28 03:43:54',
                'updated_at' => '2020-01-28 03:43:54',
            ),
            464 => 
            array (
                'id' => 465,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 138,
                'created_at' => '2020-01-28 03:43:56',
                'updated_at' => '2020-01-28 03:43:56',
            ),
            465 => 
            array (
                'id' => 466,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 139,
                'created_at' => '2020-01-28 03:43:58',
                'updated_at' => '2020-01-28 03:43:58',
            ),
            466 => 
            array (
                'id' => 467,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 140,
                'created_at' => '2020-01-28 03:44:00',
                'updated_at' => '2020-01-28 03:44:00',
            ),
            467 => 
            array (
                'id' => 468,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 141,
                'created_at' => '2020-01-28 03:44:02',
                'updated_at' => '2020-01-28 03:44:02',
            ),
            468 => 
            array (
                'id' => 469,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 142,
                'created_at' => '2020-01-28 03:44:04',
                'updated_at' => '2020-01-28 03:44:04',
            ),
            469 => 
            array (
                'id' => 470,
                'key' => 'with_bathtub',
                'value' => '1',
                'type' => NULL,
                'product_id' => 143,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            470 => 
            array (
                'id' => 471,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 144,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:10',
            ),
            471 => 
            array (
                'id' => 472,
                'key' => 'door_type',
                'value' => 'Fluence',
                'type' => 'integer',
                'product_id' => 144,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:10',
            ),
            472 => 
            array (
                'id' => 473,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 144,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:11',
            ),
            473 => 
            array (
                'id' => 474,
                'key' => 'handles',
                'value' => 'Dual Towel Bars',
                'type' => 'string',
                'product_id' => 144,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:10',
            ),
            474 => 
            array (
                'id' => 475,
                'key' => 'glass_thickness',
                'value' => '3/8"',
                'type' => 'string',
                'product_id' => 144,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:10',
            ),
            475 => 
            array (
                'id' => 476,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 145,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:14',
            ),
            476 => 
            array (
                'id' => 477,
                'key' => 'door_type',
                'value' => 'Fluence',
                'type' => 'integer',
                'product_id' => 145,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:14',
            ),
            477 => 
            array (
                'id' => 478,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 145,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:14',
            ),
            478 => 
            array (
                'id' => 479,
                'key' => 'handles',
                'value' => 'Dual Towel Bars',
                'type' => 'string',
                'product_id' => 145,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:14',
            ),
            479 => 
            array (
                'id' => 480,
                'key' => 'glass_thickness',
                'value' => '3/8"',
                'type' => 'string',
                'product_id' => 145,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:14',
            ),
            480 => 
            array (
                'id' => 481,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 146,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:17',
            ),
            481 => 
            array (
                'id' => 482,
                'key' => 'door_type',
                'value' => 'Levity',
                'type' => 'integer',
                'product_id' => 146,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:17',
            ),
            482 => 
            array (
                'id' => 483,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 146,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:17',
            ),
            483 => 
            array (
                'id' => 484,
                'key' => 'handles',
                'value' => 'Blade Handles',
                'type' => 'string',
                'product_id' => 146,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:17',
            ),
            484 => 
            array (
                'id' => 485,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 146,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:17',
            ),
            485 => 
            array (
                'id' => 486,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 147,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:21',
            ),
            486 => 
            array (
                'id' => 487,
                'key' => 'door_type',
                'value' => 'Levity',
                'type' => 'integer',
                'product_id' => 147,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:21',
            ),
            487 => 
            array (
                'id' => 488,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 147,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:21',
            ),
            488 => 
            array (
                'id' => 489,
                'key' => 'handles',
                'value' => 'Blade Handles',
                'type' => 'string',
                'product_id' => 147,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:21',
            ),
            489 => 
            array (
                'id' => 490,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 147,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:21',
            ),
            490 => 
            array (
                'id' => 491,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 148,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:23',
            ),
            491 => 
            array (
                'id' => 492,
                'key' => 'door_type',
                'value' => 'Levity',
                'type' => 'integer',
                'product_id' => 148,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:23',
            ),
            492 => 
            array (
                'id' => 493,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 148,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:23',
            ),
            493 => 
            array (
                'id' => 494,
                'key' => 'handles',
                'value' => 'Blade Handles',
                'type' => 'string',
                'product_id' => 148,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:23',
            ),
            494 => 
            array (
                'id' => 495,
                'key' => 'glass_thickness',
                'value' => '1/4"',
                'type' => 'string',
                'product_id' => 148,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:23',
            ),
            495 => 
            array (
                'id' => 496,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 149,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:27',
            ),
            496 => 
            array (
                'id' => 497,
                'key' => 'door_type',
                'value' => 'Levity',
                'type' => 'integer',
                'product_id' => 149,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:27',
            ),
            497 => 
            array (
                'id' => 498,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 149,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:27',
            ),
            498 => 
            array (
                'id' => 499,
                'key' => 'handles',
                'value' => 'Blade Handles',
                'type' => 'string',
                'product_id' => 149,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:27',
            ),
            499 => 
            array (
                'id' => 500,
                'key' => 'glass_thickness',
                'value' => '1/4"',
                'type' => 'string',
                'product_id' => 149,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:27',
            ),
        ));
        \DB::table('options')->insert(array (
            0 => 
            array (
                'id' => 501,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 150,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:30',
            ),
            1 => 
            array (
                'id' => 502,
                'key' => 'door_type',
                'value' => 'Levity',
                'type' => 'integer',
                'product_id' => 150,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:30',
            ),
            2 => 
            array (
                'id' => 503,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 150,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:30',
            ),
            3 => 
            array (
                'id' => 504,
                'key' => 'handles',
                'value' => 'Dual Towel Bars',
                'type' => 'string',
                'product_id' => 150,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:30',
            ),
            4 => 
            array (
                'id' => 505,
                'key' => 'glass_thickness',
                'value' => '1/4"',
                'type' => 'string',
                'product_id' => 150,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:30',
            ),
            5 => 
            array (
                'id' => 506,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 151,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:34',
            ),
            6 => 
            array (
                'id' => 507,
                'key' => 'door_type',
                'value' => 'Levity',
                'type' => 'integer',
                'product_id' => 151,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:34',
            ),
            7 => 
            array (
                'id' => 508,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 151,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:34',
            ),
            8 => 
            array (
                'id' => 509,
                'key' => 'handles',
                'value' => 'Dual Towel Bars',
                'type' => 'string',
                'product_id' => 151,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:34',
            ),
            9 => 
            array (
                'id' => 510,
                'key' => 'glass_thickness',
                'value' => '1/4"',
                'type' => 'string',
                'product_id' => 151,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:34',
            ),
            10 => 
            array (
                'id' => 511,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 152,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:37',
            ),
            11 => 
            array (
                'id' => 512,
                'key' => 'door_type',
                'value' => 'Levity',
                'type' => 'integer',
                'product_id' => 152,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:37',
            ),
            12 => 
            array (
                'id' => 513,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 152,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:37',
            ),
            13 => 
            array (
                'id' => 514,
                'key' => 'handles',
                'value' => 'Dual Towel Bars',
                'type' => 'string',
                'product_id' => 152,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:37',
            ),
            14 => 
            array (
                'id' => 515,
                'key' => 'glass_thickness',
                'value' => '1/4"',
                'type' => 'string',
                'product_id' => 152,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:37',
            ),
            15 => 
            array (
                'id' => 516,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 153,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:41',
            ),
            16 => 
            array (
                'id' => 517,
                'key' => 'door_type',
                'value' => 'Levity',
                'type' => 'integer',
                'product_id' => 153,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:41',
            ),
            17 => 
            array (
                'id' => 518,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 153,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:41',
            ),
            18 => 
            array (
                'id' => 519,
                'key' => 'handles',
                'value' => 'Dual Towel Bars',
                'type' => 'string',
                'product_id' => 153,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:41',
            ),
            19 => 
            array (
                'id' => 520,
                'key' => 'glass_thickness',
                'value' => '1/4"',
                'type' => 'string',
                'product_id' => 153,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:41',
            ),
            20 => 
            array (
                'id' => 521,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 154,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:44',
            ),
            21 => 
            array (
                'id' => 522,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 154,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:44',
            ),
            22 => 
            array (
                'id' => 523,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 154,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:44',
            ),
            23 => 
            array (
                'id' => 524,
                'key' => 'handles',
                'value' => 'Knob & Towel Bar',
                'type' => 'string',
                'product_id' => 154,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:44',
            ),
            24 => 
            array (
                'id' => 525,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 154,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:44',
            ),
            25 => 
            array (
                'id' => 526,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 155,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:48',
            ),
            26 => 
            array (
                'id' => 527,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 155,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:48',
            ),
            27 => 
            array (
                'id' => 528,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 155,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:48',
            ),
            28 => 
            array (
                'id' => 529,
                'key' => 'handles',
                'value' => 'Knob & Towel Bar',
                'type' => 'string',
                'product_id' => 155,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:48',
            ),
            29 => 
            array (
                'id' => 530,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 155,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:48',
            ),
            30 => 
            array (
                'id' => 531,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 156,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:51',
            ),
            31 => 
            array (
                'id' => 532,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 156,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:51',
            ),
            32 => 
            array (
                'id' => 533,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 156,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:51',
            ),
            33 => 
            array (
                'id' => 534,
                'key' => 'handles',
                'value' => 'Knob & Towel Bar',
                'type' => 'string',
                'product_id' => 156,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:51',
            ),
            34 => 
            array (
                'id' => 535,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 156,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:51',
            ),
            35 => 
            array (
                'id' => 536,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 157,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:54',
            ),
            36 => 
            array (
                'id' => 537,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 157,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:54',
            ),
            37 => 
            array (
                'id' => 538,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 157,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:54',
            ),
            38 => 
            array (
                'id' => 539,
                'key' => 'handles',
                'value' => 'Knob & Towel Bar',
                'type' => 'string',
                'product_id' => 157,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:54',
            ),
            39 => 
            array (
                'id' => 540,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 157,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:54',
            ),
            40 => 
            array (
                'id' => 541,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 158,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:57',
            ),
            41 => 
            array (
                'id' => 542,
                'key' => 'door_type',
                'value' => 'Levity',
                'type' => 'integer',
                'product_id' => 158,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:57',
            ),
            42 => 
            array (
                'id' => 543,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 158,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:57',
            ),
            43 => 
            array (
                'id' => 544,
                'key' => 'handles',
                'value' => 'Blade Handles',
                'type' => 'string',
                'product_id' => 158,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:57',
            ),
            44 => 
            array (
                'id' => 545,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 158,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:57',
            ),
            45 => 
            array (
                'id' => 546,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 159,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:01',
            ),
            46 => 
            array (
                'id' => 547,
                'key' => 'door_type',
                'value' => 'Levity',
                'type' => 'integer',
                'product_id' => 159,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:01',
            ),
            47 => 
            array (
                'id' => 548,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 159,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:01',
            ),
            48 => 
            array (
                'id' => 549,
                'key' => 'handles',
                'value' => 'Blade Handles',
                'type' => 'string',
                'product_id' => 159,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:01',
            ),
            49 => 
            array (
                'id' => 550,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 159,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:01',
            ),
            50 => 
            array (
                'id' => 551,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 160,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:04',
            ),
            51 => 
            array (
                'id' => 552,
                'key' => 'door_type',
                'value' => 'Levity',
                'type' => 'integer',
                'product_id' => 160,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:04',
            ),
            52 => 
            array (
                'id' => 553,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 160,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:04',
            ),
            53 => 
            array (
                'id' => 554,
                'key' => 'handles',
                'value' => 'Blade Handles',
                'type' => 'string',
                'product_id' => 160,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:04',
            ),
            54 => 
            array (
                'id' => 555,
                'key' => 'glass_thickness',
                'value' => '1/4"',
                'type' => 'string',
                'product_id' => 160,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:04',
            ),
            55 => 
            array (
                'id' => 556,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 161,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:09',
            ),
            56 => 
            array (
                'id' => 557,
                'key' => 'door_type',
                'value' => 'Levity',
                'type' => 'integer',
                'product_id' => 161,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:09',
            ),
            57 => 
            array (
                'id' => 558,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 161,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:09',
            ),
            58 => 
            array (
                'id' => 559,
                'key' => 'handles',
                'value' => 'Blade Handles',
                'type' => 'string',
                'product_id' => 161,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:09',
            ),
            59 => 
            array (
                'id' => 560,
                'key' => 'glass_thickness',
                'value' => '1/4"',
                'type' => 'string',
                'product_id' => 161,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:09',
            ),
            60 => 
            array (
                'id' => 561,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 162,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:45:12',
            ),
            61 => 
            array (
                'id' => 562,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 162,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:12',
            ),
            62 => 
            array (
                'id' => 563,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 162,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:12',
            ),
            63 => 
            array (
                'id' => 564,
                'key' => 'handles',
                'value' => 'Knob & Towel Bar',
                'type' => 'string',
                'product_id' => 162,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:12',
            ),
            64 => 
            array (
                'id' => 565,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 162,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:12',
            ),
            65 => 
            array (
                'id' => 566,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 163,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:16',
            ),
            66 => 
            array (
                'id' => 567,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 163,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:16',
            ),
            67 => 
            array (
                'id' => 568,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 163,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:16',
            ),
            68 => 
            array (
                'id' => 569,
                'key' => 'handles',
                'value' => 'Knob & Towel Bar',
                'type' => 'string',
                'product_id' => 163,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:16',
            ),
            69 => 
            array (
                'id' => 570,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 163,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:16',
            ),
            70 => 
            array (
                'id' => 571,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 164,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:19',
            ),
            71 => 
            array (
                'id' => 572,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 164,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:19',
            ),
            72 => 
            array (
                'id' => 573,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 164,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:19',
            ),
            73 => 
            array (
                'id' => 574,
                'key' => 'handles',
                'value' => 'Knob & Towel Bar',
                'type' => 'string',
                'product_id' => 164,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:19',
            ),
            74 => 
            array (
                'id' => 575,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 164,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:19',
            ),
            75 => 
            array (
                'id' => 576,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 165,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:23',
            ),
            76 => 
            array (
                'id' => 577,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 165,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:23',
            ),
            77 => 
            array (
                'id' => 578,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 165,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:23',
            ),
            78 => 
            array (
                'id' => 579,
                'key' => 'handles',
                'value' => 'Knob & Towel Bar',
                'type' => 'string',
                'product_id' => 165,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:23',
            ),
            79 => 
            array (
                'id' => 580,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 165,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:23',
            ),
            80 => 
            array (
                'id' => 581,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 166,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:26',
            ),
            81 => 
            array (
                'id' => 582,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 166,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:26',
            ),
            82 => 
            array (
                'id' => 583,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 166,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:26',
            ),
            83 => 
            array (
                'id' => 584,
                'key' => 'handles',
                'value' => 'Blade Handle',
                'type' => 'string',
                'product_id' => 166,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:26',
            ),
            84 => 
            array (
                'id' => 585,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 166,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:26',
            ),
            85 => 
            array (
                'id' => 586,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 167,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:30',
            ),
            86 => 
            array (
                'id' => 587,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 167,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:30',
            ),
            87 => 
            array (
                'id' => 588,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 167,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:30',
            ),
            88 => 
            array (
                'id' => 589,
                'key' => 'handles',
                'value' => 'Blade Handle',
                'type' => 'string',
                'product_id' => 167,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:30',
            ),
            89 => 
            array (
                'id' => 590,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 167,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:30',
            ),
            90 => 
            array (
                'id' => 591,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 168,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:33',
            ),
            91 => 
            array (
                'id' => 592,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 168,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:33',
            ),
            92 => 
            array (
                'id' => 593,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 168,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:33',
            ),
            93 => 
            array (
                'id' => 594,
                'key' => 'handles',
                'value' => 'Blade Handle',
                'type' => 'string',
                'product_id' => 168,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:33',
            ),
            94 => 
            array (
                'id' => 595,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 168,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:33',
            ),
            95 => 
            array (
                'id' => 596,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 169,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:37',
            ),
            96 => 
            array (
                'id' => 597,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 169,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:37',
            ),
            97 => 
            array (
                'id' => 598,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 169,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:37',
            ),
            98 => 
            array (
                'id' => 599,
                'key' => 'handles',
                'value' => 'Blade Handle',
                'type' => 'string',
                'product_id' => 169,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:37',
            ),
            99 => 
            array (
                'id' => 600,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 169,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:37',
            ),
            100 => 
            array (
                'id' => 601,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 170,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:40',
            ),
            101 => 
            array (
                'id' => 602,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 170,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:40',
            ),
            102 => 
            array (
                'id' => 603,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 170,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:40',
            ),
            103 => 
            array (
                'id' => 604,
                'key' => 'handles',
                'value' => 'Blade Handle',
                'type' => 'string',
                'product_id' => 170,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:40',
            ),
            104 => 
            array (
                'id' => 605,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 170,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:40',
            ),
            105 => 
            array (
                'id' => 606,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 171,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:45',
            ),
            106 => 
            array (
                'id' => 607,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 171,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:45',
            ),
            107 => 
            array (
                'id' => 608,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 171,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:45',
            ),
            108 => 
            array (
                'id' => 609,
                'key' => 'handles',
                'value' => 'Blade Handle',
                'type' => 'string',
                'product_id' => 171,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:45',
            ),
            109 => 
            array (
                'id' => 610,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 171,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:45',
            ),
            110 => 
            array (
                'id' => 611,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 172,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:49',
            ),
            111 => 
            array (
                'id' => 612,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 172,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:49',
            ),
            112 => 
            array (
                'id' => 613,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 172,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:49',
            ),
            113 => 
            array (
                'id' => 614,
                'key' => 'handles',
                'value' => 'Blade Handle',
                'type' => 'string',
                'product_id' => 172,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:49',
            ),
            114 => 
            array (
                'id' => 615,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 172,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:49',
            ),
            115 => 
            array (
                'id' => 616,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 173,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:52',
            ),
            116 => 
            array (
                'id' => 617,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 173,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:52',
            ),
            117 => 
            array (
                'id' => 618,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 173,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:52',
            ),
            118 => 
            array (
                'id' => 619,
                'key' => 'handles',
                'value' => 'Blade Handle',
                'type' => 'string',
                'product_id' => 173,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:52',
            ),
            119 => 
            array (
                'id' => 620,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 173,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:52',
            ),
            120 => 
            array (
                'id' => 621,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 174,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:55',
            ),
            121 => 
            array (
                'id' => 622,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 174,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:55',
            ),
            122 => 
            array (
                'id' => 623,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 174,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:55',
            ),
            123 => 
            array (
                'id' => 624,
                'key' => 'handles',
                'value' => 'Blade Handle',
                'type' => 'string',
                'product_id' => 174,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:55',
            ),
            124 => 
            array (
                'id' => 625,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 174,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:55',
            ),
            125 => 
            array (
                'id' => 626,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 175,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:59',
            ),
            126 => 
            array (
                'id' => 627,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 175,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:59',
            ),
            127 => 
            array (
                'id' => 628,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 175,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:59',
            ),
            128 => 
            array (
                'id' => 629,
                'key' => 'handles',
                'value' => 'Blade Handle',
                'type' => 'string',
                'product_id' => 175,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:59',
            ),
            129 => 
            array (
                'id' => 630,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 175,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:45:59',
            ),
            130 => 
            array (
                'id' => 631,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 176,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:46:02',
            ),
            131 => 
            array (
                'id' => 632,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 176,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:46:02',
            ),
            132 => 
            array (
                'id' => 633,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 176,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:46:02',
            ),
            133 => 
            array (
                'id' => 634,
                'key' => 'handles',
                'value' => 'Blade Handle',
                'type' => 'string',
                'product_id' => 176,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:46:02',
            ),
            134 => 
            array (
                'id' => 635,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 176,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:46:02',
            ),
            135 => 
            array (
                'id' => 636,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 177,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            136 => 
            array (
                'id' => 637,
                'key' => 'door_type',
                'value' => 'Revel',
                'type' => 'integer',
                'product_id' => 177,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            137 => 
            array (
                'id' => 638,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 177,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            138 => 
            array (
                'id' => 639,
                'key' => 'handles',
                'value' => 'Blade Handle',
                'type' => 'string',
                'product_id' => 177,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            139 => 
            array (
                'id' => 640,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => 'string',
                'product_id' => 177,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            140 => 
            array (
                'id' => 641,
                'key' => 'short_description',
                'value' => 'Bathroom Doorway',
                'type' => 'string',
                'product_id' => 178,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            141 => 
            array (
                'id' => 642,
                'key' => 'long_description',
                'value' => 'Demo bathroom door and reinstall with the original door',
                'type' => 'string',
                'product_id' => 178,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            142 => 
            array (
                'id' => 643,
                'key' => 'short_description',
                'value' => 'Window in Shower',
                'type' => 'string',
                'product_id' => 179,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            143 => 
            array (
                'id' => 644,
                'key' => 'long_description',
                'value' => 'Window cannot exceed 36" W and must be 48" + above the pan',
                'type' => 'string',
                'product_id' => 179,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            144 => 
            array (
                'id' => 645,
                'key' => 'short_description',
            'value' => 'Gas Hot Water Heater (replace)',
                'type' => 'string',
                'product_id' => 180,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            145 => 
            array (
                'id' => 646,
                'key' => 'long_description',
            'value' => '50 Gallon replacement (ELECTRIC) with tank booster',
                'type' => 'string',
                'product_id' => 180,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            146 => 
            array (
                'id' => 647,
                'key' => 'short_description',
            'value' => 'Electric Hot Water Heater (replace)',
                'type' => 'string',
                'product_id' => 181,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            147 => 
            array (
                'id' => 648,
                'key' => 'long_description',
            'value' => '50 Gallon replacement (GAS) with tank booster',
                'type' => 'string',
                'product_id' => 181,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            148 => 
            array (
                'id' => 649,
                'key' => 'short_description',
                'value' => 'Drain repositioning',
                'type' => 'string',
                'product_id' => 182,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            149 => 
            array (
                'id' => 650,
                'key' => 'long_description',
                'value' => 'Positioning the drain to fit the new pan or tub',
                'type' => 'string',
                'product_id' => 182,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            150 => 
            array (
                'id' => 651,
                'key' => 'short_description',
                'value' => 'Slab / Concrete Floor',
                'type' => 'string',
                'product_id' => 183,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            151 => 
            array (
                'id' => 652,
                'key' => 'long_description',
                'value' => 'Drain work on a slab or mortar floor',
                'type' => 'string',
                'product_id' => 183,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            152 => 
            array (
                'id' => 653,
                'key' => 'short_description',
                'value' => 'Breakers',
                'type' => 'string',
                'product_id' => 184,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            153 => 
            array (
                'id' => 654,
                'key' => 'long_description',
                'value' => 'Two 20-AMP Circiuts installed',
                'type' => 'string',
                'product_id' => 184,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            154 => 
            array (
                'id' => 655,
                'key' => 'short_description',
                'value' => 'Sub Panel',
                'type' => 'string',
                'product_id' => 185,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            155 => 
            array (
                'id' => 656,
                'key' => 'long_description',
            'value' => 'New Electrical sub panel (no additional space in existing panel)',
                'type' => 'string',
                'product_id' => 185,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            156 => 
            array (
                'id' => 657,
                'key' => 'short_description',
                'value' => 'Back Wall 60"',
                'type' => 'string',
                'product_id' => 186,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            157 => 
            array (
                'id' => 658,
                'key' => 'long_description',
                'value' => 'Build out back wall using necessary sub-straight',
                'type' => 'string',
                'product_id' => 186,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            158 => 
            array (
                'id' => 659,
                'key' => 'short_description',
            'value' => 'Buttress/Pony Wall (right or left)',
                'type' => 'string',
                'product_id' => 187,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            159 => 
            array (
                'id' => 660,
                'key' => 'long_description',
                'value' => 'Build out left or right buttress/pony wall using necessary sub-straight',
                'type' => 'string',
                'product_id' => 187,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            160 => 
            array (
                'id' => 661,
                'key' => 'short_description',
                'value' => 'Misc. Construction',
                'type' => 'string',
                'product_id' => 188,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            161 => 
            array (
                'id' => 662,
                'key' => 'long_description',
                'value' => 'Additional construction work',
                'type' => 'string',
                'product_id' => 188,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            162 => 
            array (
                'id' => 663,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 189,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:11',
            ),
            163 => 
            array (
                'id' => 664,
                'key' => 'tub_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 189,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:11',
            ),
            164 => 
            array (
                'id' => 665,
                'key' => 'drain_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 189,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:11',
            ),
            165 => 
            array (
                'id' => 666,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 189,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:11',
            ),
            166 => 
            array (
                'id' => 667,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 190,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:16',
            ),
            167 => 
            array (
                'id' => 668,
                'key' => 'tub_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 190,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:16',
            ),
            168 => 
            array (
                'id' => 669,
                'key' => 'drain_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 190,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:16',
            ),
            169 => 
            array (
                'id' => 670,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 190,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:16',
            ),
            170 => 
            array (
                'id' => 671,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 191,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:21',
            ),
            171 => 
            array (
                'id' => 672,
                'key' => 'tub_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 191,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:21',
            ),
            172 => 
            array (
                'id' => 673,
                'key' => 'drain_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 191,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:21',
            ),
            173 => 
            array (
                'id' => 674,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 191,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:21',
            ),
            174 => 
            array (
                'id' => 675,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 192,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:27',
            ),
            175 => 
            array (
                'id' => 676,
                'key' => 'tub_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 192,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:27',
            ),
            176 => 
            array (
                'id' => 677,
                'key' => 'drain_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 192,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:27',
            ),
            177 => 
            array (
                'id' => 678,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 192,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:27',
            ),
            178 => 
            array (
                'id' => 679,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 193,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:32',
            ),
            179 => 
            array (
                'id' => 680,
                'key' => 'tub_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 193,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:32',
            ),
            180 => 
            array (
                'id' => 681,
                'key' => 'drain_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 193,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:32',
            ),
            181 => 
            array (
                'id' => 682,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 193,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:32',
            ),
            182 => 
            array (
                'id' => 683,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 194,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:38',
            ),
            183 => 
            array (
                'id' => 684,
                'key' => 'tub_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 194,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:38',
            ),
            184 => 
            array (
                'id' => 685,
                'key' => 'drain_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 194,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:38',
            ),
            185 => 
            array (
                'id' => 686,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 194,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:38',
            ),
            186 => 
            array (
                'id' => 687,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 195,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:43',
            ),
            187 => 
            array (
                'id' => 688,
                'key' => 'tub_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 195,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:43',
            ),
            188 => 
            array (
                'id' => 689,
                'key' => 'drain_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 195,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:43',
            ),
            189 => 
            array (
                'id' => 690,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 195,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:43',
            ),
            190 => 
            array (
                'id' => 691,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 196,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:48',
            ),
            191 => 
            array (
                'id' => 692,
                'key' => 'tub_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 196,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:48',
            ),
            192 => 
            array (
                'id' => 693,
                'key' => 'drain_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 196,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:48',
            ),
            193 => 
            array (
                'id' => 694,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 196,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:48',
            ),
            194 => 
            array (
                'id' => 695,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 197,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:53',
            ),
            195 => 
            array (
                'id' => 696,
                'key' => 'tub_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 197,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:53',
            ),
            196 => 
            array (
                'id' => 697,
                'key' => 'drain_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 197,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:53',
            ),
            197 => 
            array (
                'id' => 698,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 197,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:53',
            ),
            198 => 
            array (
                'id' => 699,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 198,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:59',
            ),
            199 => 
            array (
                'id' => 700,
                'key' => 'tub_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 198,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:59',
            ),
            200 => 
            array (
                'id' => 701,
                'key' => 'drain_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 198,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:59',
            ),
            201 => 
            array (
                'id' => 702,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 198,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:59',
            ),
            202 => 
            array (
                'id' => 703,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 199,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:03',
            ),
            203 => 
            array (
                'id' => 704,
                'key' => 'tub_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 199,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:03',
            ),
            204 => 
            array (
                'id' => 705,
                'key' => 'drain_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 199,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:03',
            ),
            205 => 
            array (
                'id' => 706,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 199,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:03',
            ),
            206 => 
            array (
                'id' => 707,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 200,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:09',
            ),
            207 => 
            array (
                'id' => 708,
                'key' => 'tub_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 200,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:09',
            ),
            208 => 
            array (
                'id' => 709,
                'key' => 'drain_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 200,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:09',
            ),
            209 => 
            array (
                'id' => 710,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 200,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:09',
            ),
            210 => 
            array (
                'id' => 711,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 201,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:14',
            ),
            211 => 
            array (
                'id' => 712,
                'key' => 'tub_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 201,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:14',
            ),
            212 => 
            array (
                'id' => 713,
                'key' => 'drain_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 201,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:14',
            ),
            213 => 
            array (
                'id' => 714,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 201,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:14',
            ),
            214 => 
            array (
                'id' => 715,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 202,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:19',
            ),
            215 => 
            array (
                'id' => 716,
                'key' => 'tub_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 202,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:19',
            ),
            216 => 
            array (
                'id' => 717,
                'key' => 'drain_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 202,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:19',
            ),
            217 => 
            array (
                'id' => 718,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 202,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:19',
            ),
            218 => 
            array (
                'id' => 719,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 203,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:23',
            ),
            219 => 
            array (
                'id' => 720,
                'key' => 'tub_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 203,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:23',
            ),
            220 => 
            array (
                'id' => 721,
                'key' => 'drain_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 203,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:23',
            ),
            221 => 
            array (
                'id' => 722,
                'key' => 'fixture_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 203,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:23',
            ),
            222 => 
            array (
                'id' => 723,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 204,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            223 => 
            array (
                'id' => 724,
                'key' => 'tub_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 204,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            224 => 
            array (
                'id' => 725,
                'key' => 'drain_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 204,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            225 => 
            array (
                'id' => 726,
                'key' => 'fixture_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 204,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            226 => 
            array (
                'id' => 727,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 205,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:30',
            ),
            227 => 
            array (
                'id' => 728,
                'key' => 'tub_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 205,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:30',
            ),
            228 => 
            array (
                'id' => 729,
                'key' => 'fixture_color_id',
                'value' => NULL,
                'type' => 'App\\Color',
                'product_id' => 205,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            229 => 
            array (
                'id' => 730,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 206,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:32',
            ),
            230 => 
            array (
                'id' => 731,
                'key' => 'tub_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 206,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:32',
            ),
            231 => 
            array (
                'id' => 732,
                'key' => 'fixture_color_id',
                'value' => NULL,
                'type' => 'App\\Color',
                'product_id' => 206,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            232 => 
            array (
                'id' => 733,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 207,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:33',
            ),
            233 => 
            array (
                'id' => 734,
                'key' => 'tub_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 207,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:33',
            ),
            234 => 
            array (
                'id' => 735,
                'key' => 'fixture_color_id',
                'value' => NULL,
                'type' => 'App\\Color',
                'product_id' => 207,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            235 => 
            array (
                'id' => 736,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 208,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:35',
            ),
            236 => 
            array (
                'id' => 737,
                'key' => 'tub_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 208,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:35',
            ),
            237 => 
            array (
                'id' => 738,
                'key' => 'fixture_color_id',
                'value' => NULL,
                'type' => 'App\\Color',
                'product_id' => 208,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            238 => 
            array (
                'id' => 739,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 209,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:36',
            ),
            239 => 
            array (
                'id' => 740,
                'key' => 'tub_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 209,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:36',
            ),
            240 => 
            array (
                'id' => 741,
                'key' => 'fixture_color_id',
                'value' => NULL,
                'type' => 'App\\Color',
                'product_id' => 209,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            241 => 
            array (
                'id' => 742,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 210,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:38',
            ),
            242 => 
            array (
                'id' => 743,
                'key' => 'tub_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 210,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:38',
            ),
            243 => 
            array (
                'id' => 744,
                'key' => 'fixture_color_id',
                'value' => NULL,
                'type' => 'App\\Color',
                'product_id' => 210,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            244 => 
            array (
                'id' => 745,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 211,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:39',
            ),
            245 => 
            array (
                'id' => 746,
                'key' => 'tub_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 211,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:39',
            ),
            246 => 
            array (
                'id' => 747,
                'key' => 'fixture_color_id',
                'value' => NULL,
                'type' => 'App\\Color',
                'product_id' => 211,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            247 => 
            array (
                'id' => 748,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 212,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:40',
            ),
            248 => 
            array (
                'id' => 749,
                'key' => 'tub_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 212,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:40',
            ),
            249 => 
            array (
                'id' => 750,
                'key' => 'fixture_color_id',
                'value' => NULL,
                'type' => 'App\\Color',
                'product_id' => 212,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            250 => 
            array (
                'id' => 751,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 213,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:42',
            ),
            251 => 
            array (
                'id' => 752,
                'key' => 'tub_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 213,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:42',
            ),
            252 => 
            array (
                'id' => 753,
                'key' => 'fixture_color_id',
                'value' => NULL,
                'type' => 'App\\Color',
                'product_id' => 213,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            253 => 
            array (
                'id' => 754,
                'key' => 'plumbing_position',
                'value' => 'Left',
                'type' => 'string',
                'product_id' => 214,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:43',
            ),
            254 => 
            array (
                'id' => 755,
                'key' => 'tub_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 214,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:43',
            ),
            255 => 
            array (
                'id' => 756,
                'key' => 'fixture_color_id',
                'value' => NULL,
                'type' => 'App\\Color',
                'product_id' => 214,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            256 => 
            array (
                'id' => 757,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 215,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:44',
            ),
            257 => 
            array (
                'id' => 758,
                'key' => 'tub_color_id',
                'value' => '1',
                'type' => 'App\\Color',
                'product_id' => 215,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:44',
            ),
            258 => 
            array (
                'id' => 759,
                'key' => 'fixture_color_id',
                'value' => NULL,
                'type' => 'App\\Color',
                'product_id' => 215,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            259 => 
            array (
                'id' => 760,
                'key' => 'plumbing_position',
                'value' => 'Right',
                'type' => 'string',
                'product_id' => 216,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:46',
            ),
            260 => 
            array (
                'id' => 761,
                'key' => 'tub_color_id',
                'value' => '2',
                'type' => 'App\\Color',
                'product_id' => 216,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:46',
            ),
            261 => 
            array (
                'id' => 762,
                'key' => 'fixture_color_id',
                'value' => NULL,
                'type' => 'App\\Color',
                'product_id' => 216,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            262 => 
            array (
                'id' => 763,
                'key' => 'width',
                'value' => '60',
                'type' => NULL,
                'product_id' => 205,
                'created_at' => '2020-01-28 03:47:30',
                'updated_at' => '2020-01-28 03:47:30',
            ),
            263 => 
            array (
                'id' => 764,
                'key' => 'depth',
                'value' => '32',
                'type' => NULL,
                'product_id' => 205,
                'created_at' => '2020-01-28 03:47:30',
                'updated_at' => '2020-01-28 03:47:30',
            ),
            264 => 
            array (
                'id' => 765,
                'key' => 'width',
                'value' => '60',
                'type' => NULL,
                'product_id' => 206,
                'created_at' => '2020-01-28 03:47:32',
                'updated_at' => '2020-01-28 03:47:32',
            ),
            265 => 
            array (
                'id' => 766,
                'key' => 'depth',
                'value' => '32',
                'type' => NULL,
                'product_id' => 206,
                'created_at' => '2020-01-28 03:47:32',
                'updated_at' => '2020-01-28 03:47:32',
            ),
            266 => 
            array (
                'id' => 767,
                'key' => 'width',
                'value' => '60',
                'type' => NULL,
                'product_id' => 207,
                'created_at' => '2020-01-28 03:47:33',
                'updated_at' => '2020-01-28 03:47:33',
            ),
            267 => 
            array (
                'id' => 768,
                'key' => 'depth',
                'value' => '32',
                'type' => NULL,
                'product_id' => 207,
                'created_at' => '2020-01-28 03:47:33',
                'updated_at' => '2020-01-28 03:47:33',
            ),
            268 => 
            array (
                'id' => 769,
                'key' => 'width',
                'value' => '60',
                'type' => NULL,
                'product_id' => 208,
                'created_at' => '2020-01-28 03:47:35',
                'updated_at' => '2020-01-28 03:47:35',
            ),
            269 => 
            array (
                'id' => 770,
                'key' => 'depth',
                'value' => '32',
                'type' => NULL,
                'product_id' => 208,
                'created_at' => '2020-01-28 03:47:35',
                'updated_at' => '2020-01-28 03:47:35',
            ),
            270 => 
            array (
                'id' => 771,
                'key' => 'width',
                'value' => '60',
                'type' => NULL,
                'product_id' => 209,
                'created_at' => '2020-01-28 03:47:36',
                'updated_at' => '2020-01-28 03:47:36',
            ),
            271 => 
            array (
                'id' => 772,
                'key' => 'depth',
                'value' => '30',
                'type' => NULL,
                'product_id' => 209,
                'created_at' => '2020-01-28 03:47:36',
                'updated_at' => '2020-01-28 03:47:36',
            ),
            272 => 
            array (
                'id' => 773,
                'key' => 'width',
                'value' => '60',
                'type' => NULL,
                'product_id' => 210,
                'created_at' => '2020-01-28 03:47:38',
                'updated_at' => '2020-01-28 03:47:38',
            ),
            273 => 
            array (
                'id' => 774,
                'key' => 'depth',
                'value' => '30',
                'type' => NULL,
                'product_id' => 210,
                'created_at' => '2020-01-28 03:47:38',
                'updated_at' => '2020-01-28 03:47:38',
            ),
            274 => 
            array (
                'id' => 775,
                'key' => 'width',
                'value' => '60',
                'type' => NULL,
                'product_id' => 211,
                'created_at' => '2020-01-28 03:47:39',
                'updated_at' => '2020-01-28 03:47:39',
            ),
            275 => 
            array (
                'id' => 776,
                'key' => 'depth',
                'value' => '30',
                'type' => NULL,
                'product_id' => 211,
                'created_at' => '2020-01-28 03:47:39',
                'updated_at' => '2020-01-28 03:47:39',
            ),
            276 => 
            array (
                'id' => 777,
                'key' => 'width',
                'value' => '60',
                'type' => NULL,
                'product_id' => 212,
                'created_at' => '2020-01-28 03:47:40',
                'updated_at' => '2020-01-28 03:47:40',
            ),
            277 => 
            array (
                'id' => 778,
                'key' => 'depth',
                'value' => '30',
                'type' => NULL,
                'product_id' => 212,
                'created_at' => '2020-01-28 03:47:40',
                'updated_at' => '2020-01-28 03:47:40',
            ),
            278 => 
            array (
                'id' => 779,
                'key' => 'width',
                'value' => '60',
                'type' => NULL,
                'product_id' => 213,
                'created_at' => '2020-01-28 03:47:42',
                'updated_at' => '2020-01-28 03:47:42',
            ),
            279 => 
            array (
                'id' => 780,
                'key' => 'depth',
                'value' => '30',
                'type' => NULL,
                'product_id' => 213,
                'created_at' => '2020-01-28 03:47:42',
                'updated_at' => '2020-01-28 03:47:42',
            ),
            280 => 
            array (
                'id' => 781,
                'key' => 'width',
                'value' => '60',
                'type' => NULL,
                'product_id' => 214,
                'created_at' => '2020-01-28 03:47:43',
                'updated_at' => '2020-01-28 03:47:43',
            ),
            281 => 
            array (
                'id' => 782,
                'key' => 'depth',
                'value' => '30',
                'type' => NULL,
                'product_id' => 214,
                'created_at' => '2020-01-28 03:47:43',
                'updated_at' => '2020-01-28 03:47:43',
            ),
            282 => 
            array (
                'id' => 783,
                'key' => 'width',
                'value' => '60',
                'type' => NULL,
                'product_id' => 215,
                'created_at' => '2020-01-28 03:47:44',
                'updated_at' => '2020-01-28 03:47:44',
            ),
            283 => 
            array (
                'id' => 784,
                'key' => 'depth',
                'value' => '30',
                'type' => NULL,
                'product_id' => 215,
                'created_at' => '2020-01-28 03:47:44',
                'updated_at' => '2020-01-28 03:47:44',
            ),
            284 => 
            array (
                'id' => 785,
                'key' => 'width',
                'value' => '60',
                'type' => NULL,
                'product_id' => 216,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:46',
            ),
            285 => 
            array (
                'id' => 786,
                'key' => 'depth',
                'value' => '30',
                'type' => NULL,
                'product_id' => 216,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:46',
            ),
            286 => 
            array (
                'id' => 787,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 217,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:49',
            ),
            287 => 
            array (
                'id' => 788,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 217,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:49',
            ),
            288 => 
            array (
                'id' => 789,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 218,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:52',
            ),
            289 => 
            array (
                'id' => 790,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 218,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:52',
            ),
            290 => 
            array (
                'id' => 791,
                'key' => 'glass_color_id',
                'value' => '19',
                'type' => 'App\\Color',
                'product_id' => 219,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:55',
            ),
            291 => 
            array (
                'id' => 792,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 219,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:55',
            ),
            292 => 
            array (
                'id' => 793,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 220,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:59',
            ),
            293 => 
            array (
                'id' => 794,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 220,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:59',
            ),
            294 => 
            array (
                'id' => 795,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 221,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:48:02',
            ),
            295 => 
            array (
                'id' => 796,
                'key' => 'trim_color_id',
                'value' => '17',
                'type' => 'App\\Color',
                'product_id' => 221,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:48:02',
            ),
            296 => 
            array (
                'id' => 797,
                'key' => 'glass_color_id',
                'value' => '18',
                'type' => 'App\\Color',
                'product_id' => 222,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:48:05',
            ),
            297 => 
            array (
                'id' => 798,
                'key' => 'trim_color_id',
                'value' => '15',
                'type' => 'App\\Color',
                'product_id' => 222,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:48:05',
            ),
            298 => 
            array (
                'id' => 799,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => NULL,
                'product_id' => 217,
                'created_at' => '2020-01-28 03:47:49',
                'updated_at' => '2020-01-28 03:47:49',
            ),
            299 => 
            array (
                'id' => 800,
                'key' => 'door_type',
                'value' => 'sliding door',
                'type' => NULL,
                'product_id' => 217,
                'created_at' => '2020-01-28 03:47:49',
                'updated_at' => '2020-01-28 03:47:49',
            ),
            300 => 
            array (
                'id' => 801,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => NULL,
                'product_id' => 218,
                'created_at' => '2020-01-28 03:47:52',
                'updated_at' => '2020-01-28 03:47:52',
            ),
            301 => 
            array (
                'id' => 802,
                'key' => 'door_type',
                'value' => 'sliding door',
                'type' => NULL,
                'product_id' => 218,
                'created_at' => '2020-01-28 03:47:52',
                'updated_at' => '2020-01-28 03:47:52',
            ),
            302 => 
            array (
                'id' => 803,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => NULL,
                'product_id' => 219,
                'created_at' => '2020-01-28 03:47:55',
                'updated_at' => '2020-01-28 03:47:55',
            ),
            303 => 
            array (
                'id' => 804,
                'key' => 'door_type',
                'value' => 'sliding door',
                'type' => NULL,
                'product_id' => 219,
                'created_at' => '2020-01-28 03:47:55',
                'updated_at' => '2020-01-28 03:47:55',
            ),
            304 => 
            array (
                'id' => 805,
                'key' => 'glass_thickness',
                'value' => '5/16"',
                'type' => NULL,
                'product_id' => 220,
                'created_at' => '2020-01-28 03:47:59',
                'updated_at' => '2020-01-28 03:47:59',
            ),
            305 => 
            array (
                'id' => 806,
                'key' => 'door_type',
                'value' => 'sliding door',
                'type' => NULL,
                'product_id' => 220,
                'created_at' => '2020-01-28 03:47:59',
                'updated_at' => '2020-01-28 03:47:59',
            ),
            306 => 
            array (
                'id' => 807,
                'key' => 'glass_thickness',
                'value' => '3/8"',
                'type' => NULL,
                'product_id' => 221,
                'created_at' => '2020-01-28 03:48:02',
                'updated_at' => '2020-01-28 03:48:02',
            ),
            307 => 
            array (
                'id' => 808,
                'key' => 'door_type',
                'value' => 'sliding door',
                'type' => NULL,
                'product_id' => 221,
                'created_at' => '2020-01-28 03:48:02',
                'updated_at' => '2020-01-28 03:48:02',
            ),
            308 => 
            array (
                'id' => 809,
                'key' => 'glass_thickness',
                'value' => '3/8"',
                'type' => NULL,
                'product_id' => 222,
                'created_at' => '2020-01-28 03:48:05',
                'updated_at' => '2020-01-28 03:48:05',
            ),
            309 => 
            array (
                'id' => 810,
                'key' => 'door_type',
                'value' => 'sliding door',
                'type' => NULL,
                'product_id' => 222,
                'created_at' => '2020-01-28 03:48:05',
                'updated_at' => '2020-01-28 03:48:05',
            ),
            310 => 
            array (
                'id' => 811,
                'key' => 'drain_color_id',
                'value' => '17',
                'type' => NULL,
                'product_id' => 223,
                'created_at' => '2020-01-28 03:48:07',
                'updated_at' => '2020-01-28 03:48:07',
            ),
            311 => 
            array (
                'id' => 812,
                'key' => 'drain_color_id',
                'value' => '15',
                'type' => NULL,
                'product_id' => 224,
                'created_at' => '2020-01-28 03:48:09',
                'updated_at' => '2020-01-28 03:48:09',
            ),
            312 => 
            array (
                'id' => 813,
                'key' => 'drain_color_id',
                'value' => '17',
                'type' => NULL,
                'product_id' => 225,
                'created_at' => '2020-01-28 03:48:10',
                'updated_at' => '2020-01-28 03:48:10',
            ),
            313 => 
            array (
                'id' => 814,
                'key' => 'drain_color_id',
                'value' => '15',
                'type' => NULL,
                'product_id' => 226,
                'created_at' => '2020-01-28 03:48:12',
                'updated_at' => '2020-01-28 03:48:12',
            ),
        ));
        
        
    }
}