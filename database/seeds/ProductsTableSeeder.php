<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sku' => '8659-0',
                'price' => '1723.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            1 => 
            array (
                'id' => 2,
                'sku' => '8659-96',
                'price' => '1723.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            2 => 
            array (
                'id' => 3,
                'sku' => '8649-0',
                'price' => '1523.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            3 => 
            array (
                'id' => 4,
                'sku' => '8649-96',
                'price' => '1523.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            4 => 
            array (
                'id' => 5,
                'sku' => '8458-0',
                'price' => '1345.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            5 => 
            array (
                'id' => 6,
                'sku' => '8458-96',
                'price' => '1345.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            6 => 
            array (
                'id' => 7,
                'sku' => '8459-0',
                'price' => '1345.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            7 => 
            array (
                'id' => 8,
                'sku' => '8459-96',
                'price' => '1345.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            8 => 
            array (
                'id' => 9,
                'sku' => '8642-0',
                'price' => '1275.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            9 => 
            array (
                'id' => 10,
                'sku' => '8642-96',
                'price' => '1275.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            10 => 
            array (
                'id' => 11,
                'sku' => '8643-0',
                'price' => '1275.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            11 => 
            array (
                'id' => 12,
                'sku' => '8643-96',
                'price' => '1275.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            12 => 
            array (
                'id' => 13,
                'sku' => '8648-0',
                'price' => '1350.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            13 => 
            array (
                'id' => 14,
                'sku' => '8648-96',
                'price' => '1350.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            14 => 
            array (
                'id' => 15,
                'sku' => '8461-0',
                'price' => '1275.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            15 => 
            array (
                'id' => 16,
                'sku' => '8461-96',
                'price' => '1275.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            16 => 
            array (
                'id' => 17,
                'sku' => '8638-0',
                'price' => '1275.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            17 => 
            array (
                'id' => 18,
                'sku' => '8638-96',
                'price' => '1275.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            18 => 
            array (
                'id' => 19,
                'sku' => '8639-0',
                'price' => '1275.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            19 => 
            array (
                'id' => 20,
                'sku' => '8639-96',
                'price' => '1275.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            20 => 
            array (
                'id' => 21,
                'sku' => '8647-0',
                'price' => '1200.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            21 => 
            array (
                'id' => 22,
                'sku' => '8647-96',
                'price' => '1200.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            22 => 
            array (
                'id' => 23,
                'sku' => '8644-0',
                'price' => '1200.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            23 => 
            array (
                'id' => 24,
                'sku' => '8644-96',
                'price' => '1200.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 1,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            24 => 
            array (
                'id' => 25,
                'sku' => '9479-0',
                'price' => '2000.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 2,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            25 => 
            array (
                'id' => 26,
                'sku' => '9479-96',
                'price' => '2000.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 2,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            26 => 
            array (
                'id' => 27,
                'sku' => '9397-0',
                'price' => '1750.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 2,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            27 => 
            array (
                'id' => 28,
                'sku' => '9397-96',
                'price' => '1750.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 2,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            28 => 
            array (
                'id' => 29,
                'sku' => '300B-P6030B75B-WW',
                'price' => '2600.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            29 => 
            array (
                'id' => 30,
                'sku' => '300B-P6030B75B-BI',
                'price' => '2700.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            30 => 
            array (
                'id' => 31,
                'sku' => '300B-P6032B75B-WW',
                'price' => '2800.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            31 => 
            array (
                'id' => 32,
                'sku' => '300B-P6032B75B-BI',
                'price' => '2900.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            32 => 
            array (
                'id' => 33,
                'sku' => '300B-P6034B75B-WW',
                'price' => '3000.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            33 => 
            array (
                'id' => 34,
                'sku' => '300B-P6034B75B-BI',
                'price' => '3100.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            34 => 
            array (
                'id' => 35,
                'sku' => '300B-P6036B75B-WW',
                'price' => '3200.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            35 => 
            array (
                'id' => 36,
                'sku' => '300B-P6036B75B-BI',
                'price' => '3300.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            36 => 
            array (
                'id' => 37,
                'sku' => '300B-P6042B1B-WW',
                'price' => '3400.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            37 => 
            array (
                'id' => 38,
                'sku' => '300B-P6042B1B-BI',
                'price' => '3500.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            38 => 
            array (
                'id' => 39,
                'sku' => '300B-P6048B1B-WW',
                'price' => '3600.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            39 => 
            array (
                'id' => 40,
                'sku' => '300B-P6048B1B-BI',
                'price' => '3700.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            40 => 
            array (
                'id' => 41,
                'sku' => '300B-P6060B1B-WW',
                'price' => '3800.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:28',
                'updated_at' => '2020-01-28 03:40:28',
            ),
            41 => 
            array (
                'id' => 42,
                'sku' => '300B-P6060B1B-BI',
                'price' => '3900.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:40:29',
            ),
            42 => 
            array (
                'id' => 43,
                'sku' => '300B-P7248B1B-WW',
                'price' => '4000.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:40:29',
            ),
            43 => 
            array (
                'id' => 44,
                'sku' => '300B-P7248B1B-BI',
                'price' => '4100.00',
                'product_category_id' => 1,
                'product_sub_category_id' => 3,
                'created_at' => '2020-01-28 03:40:29',
                'updated_at' => '2020-01-28 03:40:29',
            ),
            44 => 
            array (
                'id' => 45,
                'sku' => 'C97616-0',
                'price' => '2900.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 4,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            45 => 
            array (
                'id' => 46,
                'sku' => 'C97616-96',
                'price' => '2900.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 4,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            46 => 
            array (
                'id' => 47,
                'sku' => 'C97616-W07',
                'price' => '3800.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 4,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            47 => 
            array (
                'id' => 48,
                'sku' => 'C97616-W09',
                'price' => '3800.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 4,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            48 => 
            array (
                'id' => 49,
                'sku' => 'C97616-W10',
                'price' => '3800.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 4,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            49 => 
            array (
                'id' => 50,
                'sku' => 'C97616-T01-0',
                'price' => '3800.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 4,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            50 => 
            array (
                'id' => 51,
                'sku' => 'C97616-9G9',
                'price' => '3500.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 4,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            51 => 
            array (
                'id' => 52,
                'sku' => 'C97616-700',
                'price' => '3500.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 4,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            52 => 
            array (
                'id' => 53,
                'sku' => 'C97616-796',
                'price' => '3500.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 4,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            53 => 
            array (
                'id' => 54,
                'sku' => 'C97616-900',
                'price' => '3500.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 4,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            54 => 
            array (
                'id' => 55,
                'sku' => 'C97616-996',
                'price' => '3500.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 4,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            55 => 
            array (
                'id' => 56,
                'sku' => '97604-0',
                'price' => '1375.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 5,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            56 => 
            array (
                'id' => 57,
                'sku' => '97604-96',
                'price' => '1475.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 5,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            57 => 
            array (
                'id' => 58,
                'sku' => '97604-W07',
                'price' => '1750.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 5,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            58 => 
            array (
                'id' => 59,
                'sku' => '97604-W09',
                'price' => '1750.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 5,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            59 => 
            array (
                'id' => 60,
                'sku' => '97604-W10',
                'price' => '1800.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 5,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            60 => 
            array (
                'id' => 61,
                'sku' => '97604-T01-0',
                'price' => '1800.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 5,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            61 => 
            array (
                'id' => 62,
                'sku' => '97601-0',
                'price' => '1000.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 5,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            62 => 
            array (
                'id' => 63,
                'sku' => '97601-96',
                'price' => '1100.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 5,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            63 => 
            array (
                'id' => 64,
                'sku' => '97601-W07',
                'price' => '1400.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 5,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            64 => 
            array (
                'id' => 65,
                'sku' => '97601-W09',
                'price' => '1400.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 5,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            65 => 
            array (
                'id' => 66,
                'sku' => '97601-W10',
                'price' => '1600.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 5,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            66 => 
            array (
                'id' => 67,
                'sku' => '97601-T01-0',
                'price' => '1600.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 5,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            67 => 
            array (
                'id' => 68,
                'sku' => '97638-0',
                'price' => '0.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            68 => 
            array (
                'id' => 69,
                'sku' => '97638-96',
                'price' => '0.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            69 => 
            array (
                'id' => 70,
                'sku' => '97638-G9',
                'price' => '0.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            70 => 
            array (
                'id' => 71,
                'sku' => '97638-NY',
                'price' => '0.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            71 => 
            array (
                'id' => 72,
                'sku' => '97638-SHP',
                'price' => '0.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            72 => 
            array (
                'id' => 73,
                'sku' => '97638-BNK',
                'price' => '0.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            73 => 
            array (
                'id' => 74,
                'sku' => '90042-0',
                'price' => '100.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            74 => 
            array (
                'id' => 75,
                'sku' => '90042-96',
                'price' => '100.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            75 => 
            array (
                'id' => 76,
                'sku' => '90042-G9',
                'price' => '100.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            76 => 
            array (
                'id' => 77,
                'sku' => '90042-NY',
                'price' => '100.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            77 => 
            array (
                'id' => 78,
                'sku' => '90042-SHP',
                'price' => '150.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            78 => 
            array (
                'id' => 79,
                'sku' => '90042-BNK',
                'price' => '150.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            79 => 
            array (
                'id' => 80,
                'sku' => '97635-0',
                'price' => '150.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            80 => 
            array (
                'id' => 81,
                'sku' => '97635-96',
                'price' => '150.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            81 => 
            array (
                'id' => 82,
                'sku' => '97635-G9',
                'price' => '150.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            82 => 
            array (
                'id' => 83,
                'sku' => '97635-NY',
                'price' => '150.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            83 => 
            array (
                'id' => 84,
                'sku' => '97635-SHP',
                'price' => '150.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            84 => 
            array (
                'id' => 85,
                'sku' => '97635-BNK',
                'price' => '150.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            85 => 
            array (
                'id' => 86,
                'sku' => '90028-0',
                'price' => '100.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            86 => 
            array (
                'id' => 87,
                'sku' => '90028-96',
                'price' => '100.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            87 => 
            array (
                'id' => 88,
                'sku' => '90028-G9',
                'price' => '100.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            88 => 
            array (
                'id' => 89,
                'sku' => '90028-NY',
                'price' => '100.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            89 => 
            array (
                'id' => 90,
                'sku' => '90028-SHP',
                'price' => '150.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            90 => 
            array (
                'id' => 91,
                'sku' => '90028-BNK',
                'price' => '150.00',
                'product_category_id' => 2,
                'product_sub_category_id' => 6,
                'created_at' => '2020-01-28 03:41:30',
                'updated_at' => '2020-01-28 03:41:30',
            ),
            91 => 
            array (
                'id' => 92,
                'sku' => '72186104-0',
                'price' => '235.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 7,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            92 => 
            array (
                'id' => 93,
                'sku' => '72186104-96',
                'price' => '235.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 7,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            93 => 
            array (
                'id' => 94,
                'sku' => 'SHST-01-TK',
                'price' => '425.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 7,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            94 => 
            array (
                'id' => 95,
                'sku' => 'TS45104-4-CP / 8304-K-NA',
                'price' => '675.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 8,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            95 => 
            array (
                'id' => 96,
                'sku' => 'TS45104-4-BN / 8304-K-NA',
                'price' => '875.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 8,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            96 => 
            array (
                'id' => 97,
                'sku' => 'TS396-4G-CP / 8304-K-NA',
                'price' => '750.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 8,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            97 => 
            array (
                'id' => 98,
                'sku' => 'TS396-4G-BN / 8304-K-NA',
                'price' => '975.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 8,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            98 => 
            array (
                'id' => 99,
                'sku' => '76471-CP / 8304-K-NA / TS396-4G-CP',
                'price' => '1250.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 8,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            99 => 
            array (
                'id' => 100,
                'sku' => '76471-BN / 8304-K-NA / TS396-4G-BN',
                'price' => '1350.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 8,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            100 => 
            array (
                'id' => 101,
                'sku' => '99243-CP / T45121-4-CP / 98351-CP / 737-K-NA',
                'price' => '1400.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 9,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            101 => 
            array (
                'id' => 102,
                'sku' => '99243-BN / T45121-4-BN / 98351-BN / 737-K-NA',
                'price' => '1550.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 9,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            102 => 
            array (
                'id' => 103,
                'sku' => '76465-CP / T45121-4-CP / 7394-CP / 737-K-NA',
                'price' => '1500.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 9,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            103 => 
            array (
                'id' => 104,
                'sku' => '76465-BN / T45121-4-BN / 7394-BN / 737-K-NA',
                'price' => '1700.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 9,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            104 => 
            array (
                'id' => 105,
            'sku' => 'TR1000CH (HD)',
                'price' => '100.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 10,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            105 => 
            array (
                'id' => 106,
            'sku' => 'TR1000BN (HD)',
                'price' => '150.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 10,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            106 => 
            array (
                'id' => 107,
                'sku' => '97625-SHP',
                'price' => '210.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 11,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            107 => 
            array (
                'id' => 108,
                'sku' => '97625-BNK',
                'price' => '275.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 11,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            108 => 
            array (
                'id' => 109,
                'sku' => '97626-SHP',
                'price' => '235.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 11,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            109 => 
            array (
                'id' => 110,
                'sku' => '97626-BNK',
                'price' => '305.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 11,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            110 => 
            array (
                'id' => 111,
                'sku' => '97628-SHP',
                'price' => '475.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 11,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            111 => 
            array (
                'id' => 112,
                'sku' => '97628-BNK',
                'price' => '615.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 11,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            112 => 
            array (
                'id' => 113,
                'sku' => '97629-NA',
                'price' => '150.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 11,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            113 => 
            array (
                'id' => 114,
                'sku' => '97621-SHP',
                'price' => '200.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 11,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            114 => 
            array (
                'id' => 115,
                'sku' => '97621-BNK',
                'price' => '260.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 11,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            115 => 
            array (
                'id' => 116,
                'sku' => '97622-SHP',
                'price' => '275.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 11,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            116 => 
            array (
                'id' => 117,
                'sku' => '97622-BNK',
                'price' => '355.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 11,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            117 => 
            array (
                'id' => 118,
                'sku' => '97623-SHP',
                'price' => '300.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 11,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            118 => 
            array (
                'id' => 119,
                'sku' => '97623-BNK',
                'price' => '390.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 11,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            119 => 
            array (
                'id' => 120,
                'sku' => '97630-0',
                'price' => '800.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 12,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            120 => 
            array (
                'id' => 121,
                'sku' => '97630-96',
                'price' => '900.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 12,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            121 => 
            array (
                'id' => 122,
                'sku' => '97630-G9',
                'price' => '900.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 12,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            122 => 
            array (
                'id' => 123,
                'sku' => '97630-NY',
                'price' => '900.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 12,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            123 => 
            array (
                'id' => 124,
                'sku' => '97631-0',
                'price' => '1100.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 12,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            124 => 
            array (
                'id' => 125,
                'sku' => '97631-96',
                'price' => '1200.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 12,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            125 => 
            array (
                'id' => 126,
                'sku' => '97631-G9',
                'price' => '1200.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 12,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            126 => 
            array (
                'id' => 127,
                'sku' => '97631-NY',
                'price' => '1200.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 12,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            127 => 
            array (
                'id' => 128,
                'sku' => '10541-CP',
                'price' => '145.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 13,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            128 => 
            array (
                'id' => 129,
                'sku' => '10541-BN',
                'price' => '190.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 13,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            129 => 
            array (
                'id' => 130,
                'sku' => '10542-CP',
                'price' => '170.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 13,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            130 => 
            array (
                'id' => 131,
                'sku' => '10542-BN',
                'price' => '225.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 13,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            131 => 
            array (
                'id' => 132,
                'sku' => '10544-CP',
                'price' => '210.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 13,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            132 => 
            array (
                'id' => 133,
                'sku' => '10544-BN',
                'price' => '275.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 13,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            133 => 
            array (
                'id' => 134,
                'sku' => '11891-S',
                'price' => '350.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 13,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            134 => 
            array (
                'id' => 135,
                'sku' => '11891-BN',
                'price' => '455.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 13,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            135 => 
            array (
                'id' => 136,
                'sku' => '11892-S',
                'price' => '375.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 13,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            136 => 
            array (
                'id' => 137,
                'sku' => '11892-BN',
                'price' => '485.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 13,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            137 => 
            array (
                'id' => 138,
                'sku' => '11893-S',
                'price' => '400.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 13,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            138 => 
            array (
                'id' => 139,
                'sku' => '11893-BN',
                'price' => '520.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 13,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            139 => 
            array (
                'id' => 140,
                'sku' => '97624-SHP',
                'price' => '105.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 14,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            140 => 
            array (
                'id' => 141,
                'sku' => '97624-BNK',
                'price' => '135.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 14,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            141 => 
            array (
                'id' => 142,
                'sku' => '98348-SHP',
                'price' => '105.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 14,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            142 => 
            array (
                'id' => 143,
                'sku' => '98348-BNK',
                'price' => '135.00',
                'product_category_id' => 3,
                'product_sub_category_id' => 14,
                'created_at' => '2020-01-28 03:42:35',
                'updated_at' => '2020-01-28 03:42:35',
            ),
            143 => 
            array (
                'id' => 144,
                'sku' => '702217-L-SHP',
                'price' => '2400.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 15,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            144 => 
            array (
                'id' => 145,
                'sku' => '702217-L-NX',
                'price' => '2700.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 15,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            145 => 
            array (
                'id' => 146,
                'sku' => '706383-L-SHP',
                'price' => '1950.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 15,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            146 => 
            array (
                'id' => 147,
                'sku' => '706383-L-NX',
                'price' => '2150.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 15,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            147 => 
            array (
                'id' => 148,
                'sku' => '706009-D3-SH',
                'price' => '1700.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 15,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            148 => 
            array (
                'id' => 149,
                'sku' => '706009-D3-MX',
                'price' => '1900.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 15,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            149 => 
            array (
                'id' => 150,
                'sku' => '706015-L-SH',
                'price' => '2400.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 15,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            150 => 
            array (
                'id' => 151,
                'sku' => '706015-L-MX',
                'price' => '2600.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 15,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            151 => 
            array (
                'id' => 152,
                'sku' => '706015-D3-SH',
                'price' => '2100.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 15,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            152 => 
            array (
                'id' => 153,
                'sku' => '706015-D3-MX',
                'price' => '2300.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 15,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            153 => 
            array (
                'id' => 154,
                'sku' => '707206-L-SHP',
                'price' => '1950.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 15,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            154 => 
            array (
                'id' => 155,
                'sku' => '707206-L-BNK',
                'price' => '2250.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 15,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            155 => 
            array (
                'id' => 156,
                'sku' => '707206-D3-SHP',
                'price' => '1700.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 15,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            156 => 
            array (
                'id' => 157,
                'sku' => '707206-D3-BNK',
                'price' => '1900.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 15,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            157 => 
            array (
                'id' => 158,
                'sku' => '706375-L-SHP',
                'price' => '1800.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 16,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            158 => 
            array (
                'id' => 159,
                'sku' => '706375-L-NX',
                'price' => '2000.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 16,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            159 => 
            array (
                'id' => 160,
                'sku' => '706008-D3-SH',
                'price' => '1700.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 16,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            160 => 
            array (
                'id' => 161,
                'sku' => '706008-D3-MX',
                'price' => '1900.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 16,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            161 => 
            array (
                'id' => 162,
                'sku' => '707106-L-SHP',
                'price' => '1800.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 16,
                'created_at' => '2020-01-28 03:44:07',
                'updated_at' => '2020-01-28 03:44:07',
            ),
            162 => 
            array (
                'id' => 163,
                'sku' => '707106-L-BNK',
                'price' => '2000.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 16,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            163 => 
            array (
                'id' => 164,
                'sku' => '707106-D3-SHP',
                'price' => '1700.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 16,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            164 => 
            array (
                'id' => 165,
                'sku' => '707106-D3-BNK',
                'price' => '1900.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 16,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            165 => 
            array (
                'id' => 166,
                'sku' => '707551-L-SHP',
                'price' => '2200.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 16,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            166 => 
            array (
                'id' => 167,
                'sku' => '707551-L-BNK',
                'price' => '2400.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 16,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            167 => 
            array (
                'id' => 168,
                'sku' => '707551-D3-SHP',
                'price' => '2400.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 16,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            168 => 
            array (
                'id' => 169,
                'sku' => '707551-D3-BNK',
                'price' => '2600.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 16,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            169 => 
            array (
                'id' => 170,
                'sku' => '707541-L-SHP',
                'price' => '2200.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 17,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            170 => 
            array (
                'id' => 171,
                'sku' => '707541-L-BNK',
                'price' => '2400.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 17,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            171 => 
            array (
                'id' => 172,
                'sku' => '707541-D3-SHP',
                'price' => '2400.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 17,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            172 => 
            array (
                'id' => 173,
                'sku' => '707541-D3-BNK',
                'price' => '2600.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 17,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            173 => 
            array (
                'id' => 174,
                'sku' => '707511-L-SHP',
                'price' => '1800.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 18,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            174 => 
            array (
                'id' => 175,
                'sku' => '707511-L-BNK',
                'price' => '2000.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 18,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            175 => 
            array (
                'id' => 176,
                'sku' => '707511-D3-SHP',
                'price' => '1700.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 18,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            176 => 
            array (
                'id' => 177,
                'sku' => '707511-D3-BNK',
                'price' => '1900.00',
                'product_category_id' => 4,
                'product_sub_category_id' => 18,
                'created_at' => '2020-01-28 03:44:08',
                'updated_at' => '2020-01-28 03:44:08',
            ),
            177 => 
            array (
                'id' => 178,
                'sku' => 'ca-1',
                'price' => '250.00',
                'product_category_id' => 5,
                'product_sub_category_id' => 19,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            178 => 
            array (
                'id' => 179,
                'sku' => 'ca-2',
                'price' => '650.00',
                'product_category_id' => 5,
                'product_sub_category_id' => 19,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            179 => 
            array (
                'id' => 180,
                'sku' => 'ca-3',
                'price' => '2000.00',
                'product_category_id' => 5,
                'product_sub_category_id' => 20,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            180 => 
            array (
                'id' => 181,
                'sku' => 'ca-4',
                'price' => '3500.00',
                'product_category_id' => 5,
                'product_sub_category_id' => 20,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            181 => 
            array (
                'id' => 182,
                'sku' => 'ca-5',
                'price' => '250.00',
                'product_category_id' => 5,
                'product_sub_category_id' => 21,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            182 => 
            array (
                'id' => 183,
                'sku' => 'ca-6',
                'price' => '500.00',
                'product_category_id' => 5,
                'product_sub_category_id' => 21,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            183 => 
            array (
                'id' => 184,
                'sku' => 'ca-7',
                'price' => '1200.00',
                'product_category_id' => 5,
                'product_sub_category_id' => 22,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            184 => 
            array (
                'id' => 185,
                'sku' => 'ca-8',
                'price' => '2200.00',
                'product_category_id' => 5,
                'product_sub_category_id' => 22,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            185 => 
            array (
                'id' => 186,
                'sku' => 'ca-9',
                'price' => '500.00',
                'product_category_id' => 5,
                'product_sub_category_id' => 23,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            186 => 
            array (
                'id' => 187,
                'sku' => 'ca-10',
                'price' => '500.00',
                'product_category_id' => 5,
                'product_sub_category_id' => 23,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            187 => 
            array (
                'id' => 188,
                'sku' => 'ca-11',
                'price' => '500.00',
                'product_category_id' => 5,
                'product_sub_category_id' => 23,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            188 => 
            array (
                'id' => 189,
                'sku' => '156-LCP-0',
                'price' => '18550.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 24,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            189 => 
            array (
                'id' => 190,
                'sku' => '156-LBN-0',
                'price' => '18550.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 24,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            190 => 
            array (
                'id' => 191,
                'sku' => '156-RCP-0',
                'price' => '18550.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 24,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            191 => 
            array (
                'id' => 192,
                'sku' => '156-RBN-0',
                'price' => '18550.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 24,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            192 => 
            array (
                'id' => 193,
                'sku' => '156-LCP-96',
                'price' => '18550.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 24,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            193 => 
            array (
                'id' => 194,
                'sku' => '156-LBN-96',
                'price' => '18550.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 24,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            194 => 
            array (
                'id' => 195,
                'sku' => '156-RCP-96',
                'price' => '18550.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 24,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            195 => 
            array (
                'id' => 196,
                'sku' => '156-RBN-96',
                'price' => '18550.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 24,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            196 => 
            array (
                'id' => 197,
                'sku' => '191-LCP-0',
                'price' => '15500.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 25,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            197 => 
            array (
                'id' => 198,
                'sku' => '191-LBN-0',
                'price' => '15500.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 25,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            198 => 
            array (
                'id' => 199,
                'sku' => '191-RCP-0',
                'price' => '15500.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 25,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            199 => 
            array (
                'id' => 200,
                'sku' => '191-RBN-0',
                'price' => '15500.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 25,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            200 => 
            array (
                'id' => 201,
                'sku' => '191-LCP-96',
                'price' => '15500.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 25,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            201 => 
            array (
                'id' => 202,
                'sku' => '191-LBN-96',
                'price' => '15500.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 25,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            202 => 
            array (
                'id' => 203,
                'sku' => '191-RCP-96',
                'price' => '15500.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 25,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            203 => 
            array (
                'id' => 204,
                'sku' => '191-RBN-96',
                'price' => '15500.00',
                'product_category_id' => 6,
                'product_sub_category_id' => 25,
                'created_at' => '2020-01-28 03:46:06',
                'updated_at' => '2020-01-28 03:46:06',
            ),
            204 => 
            array (
                'id' => 205,
                'sku' => '1123-LA-0',
                'price' => '2650.00',
                'product_category_id' => 7,
                'product_sub_category_id' => 26,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            205 => 
            array (
                'id' => 206,
                'sku' => '1123-LA-96',
                'price' => '2745.00',
                'product_category_id' => 7,
                'product_sub_category_id' => 26,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            206 => 
            array (
                'id' => 207,
                'sku' => '1123-RA-0',
                'price' => '2650.00',
                'product_category_id' => 7,
                'product_sub_category_id' => 26,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            207 => 
            array (
                'id' => 208,
                'sku' => '1123-RA-96',
                'price' => '2725.00',
                'product_category_id' => 7,
                'product_sub_category_id' => 26,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            208 => 
            array (
                'id' => 209,
                'sku' => '1946-LA-0',
                'price' => '2650.00',
                'product_category_id' => 7,
                'product_sub_category_id' => 26,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            209 => 
            array (
                'id' => 210,
                'sku' => '1946-LA-96',
                'price' => '2745.00',
                'product_category_id' => 7,
                'product_sub_category_id' => 26,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            210 => 
            array (
                'id' => 211,
                'sku' => '1946-RA-0',
                'price' => '2650.00',
                'product_category_id' => 7,
                'product_sub_category_id' => 26,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            211 => 
            array (
                'id' => 212,
                'sku' => '1946-RA-96',
                'price' => '2745.00',
                'product_category_id' => 7,
                'product_sub_category_id' => 26,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            212 => 
            array (
                'id' => 213,
                'sku' => '1118-LA-0',
                'price' => '2750.00',
                'product_category_id' => 7,
                'product_sub_category_id' => 27,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            213 => 
            array (
                'id' => 214,
                'sku' => '1118-LA-96',
                'price' => '2850.00',
                'product_category_id' => 7,
                'product_sub_category_id' => 27,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            214 => 
            array (
                'id' => 215,
                'sku' => '1118-RA-0',
                'price' => '2750.00',
                'product_category_id' => 7,
                'product_sub_category_id' => 27,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            215 => 
            array (
                'id' => 216,
                'sku' => '1118-RA-96',
                'price' => '2850.00',
                'product_category_id' => 7,
                'product_sub_category_id' => 27,
                'created_at' => '2020-01-28 03:47:28',
                'updated_at' => '2020-01-28 03:47:28',
            ),
            216 => 
            array (
                'id' => 217,
                'sku' => '542808-59S-G03',
                'price' => '1150.00',
                'product_category_id' => 8,
                'product_sub_category_id' => 28,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:46',
            ),
            217 => 
            array (
                'id' => 218,
                'sku' => '542808-59S-G05',
                'price' => '1150.00',
                'product_category_id' => 8,
                'product_sub_category_id' => 28,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:46',
            ),
            218 => 
            array (
                'id' => 219,
                'sku' => '542808-59N-G03',
                'price' => '1300.00',
                'product_category_id' => 8,
                'product_sub_category_id' => 28,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:46',
            ),
            219 => 
            array (
                'id' => 220,
                'sku' => '542808-59N-G05',
                'price' => '1300.00',
                'product_category_id' => 8,
                'product_sub_category_id' => 28,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:46',
            ),
            220 => 
            array (
                'id' => 221,
                'sku' => '702205-L-SHP',
                'price' => '2100.00',
                'product_category_id' => 8,
                'product_sub_category_id' => 29,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:46',
            ),
            221 => 
            array (
                'id' => 222,
                'sku' => '702205-L-NX',
                'price' => '2100.00',
                'product_category_id' => 8,
                'product_sub_category_id' => 29,
                'created_at' => '2020-01-28 03:47:46',
                'updated_at' => '2020-01-28 03:47:46',
            ),
            222 => 
            array (
                'id' => 223,
                'sku' => '9132-CP',
                'price' => '0.00',
                'product_category_id' => 9,
                'product_sub_category_id' => NULL,
                'created_at' => '2020-01-28 03:48:05',
                'updated_at' => '2020-01-28 03:48:05',
            ),
            223 => 
            array (
                'id' => 224,
                'sku' => '9132-BN',
                'price' => '0.00',
                'product_category_id' => 9,
                'product_sub_category_id' => NULL,
                'created_at' => '2020-01-28 03:48:05',
                'updated_at' => '2020-01-28 03:48:05',
            ),
            224 => 
            array (
                'id' => 225,
                'sku' => '7272-CP',
                'price' => '0.00',
                'product_category_id' => 10,
                'product_sub_category_id' => NULL,
                'created_at' => '2020-01-28 03:48:09',
                'updated_at' => '2020-01-28 03:48:09',
            ),
            225 => 
            array (
                'id' => 226,
                'sku' => '7272-BN',
                'price' => '0.00',
                'product_category_id' => 10,
                'product_sub_category_id' => NULL,
                'created_at' => '2020-01-28 03:48:09',
                'updated_at' => '2020-01-28 03:48:09',
            ),
        ));
        
        
    }
}