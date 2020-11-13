<?php

use Illuminate\Database\Seeder;

class FinancingOptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('financing_options')->delete();
        
        \DB::table('financing_options')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Plan 1164',
                'default_monthly_payment_factor' => '0.0204000000',
                'default_interest_rate' => '4.99',
                'number_of_months' => 60,
                'institution' => 'GreenSky',
                'notes' => NULL,
                'created_at' => '2020-03-19 10:56:34',
                'updated_at' => '2020-03-19 10:56:34',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Plan 1166',
                'default_monthly_payment_factor' => '0.0213000000',
                'default_interest_rate' => '6.99',
                'number_of_months' => 60,
                'institution' => 'GreenSky',
                'notes' => NULL,
                'created_at' => '2020-03-19 10:57:16',
                'updated_at' => '2020-03-19 10:58:08',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Plan 1206',
                'default_monthly_payment_factor' => '0.0120000000',
                'default_interest_rate' => '6.99',
                'number_of_months' => 120,
                'institution' => 'GreenSky',
                'notes' => NULL,
                'created_at' => '2020-03-19 10:57:43',
                'updated_at' => '2020-03-19 10:57:43',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Plan 2436',
                'default_monthly_payment_factor' => '0.0299664000',
                'default_interest_rate' => '4.99',
                'number_of_months' => 36,
                'institution' => '1st Security Bank',
                'notes' => NULL,
                'created_at' => '2020-03-19 10:58:44',
                'updated_at' => '2020-03-19 10:58:44',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Plan 2560',
                'default_monthly_payment_factor' => '0.0193282000',
                'default_interest_rate' => '5.99',
                'number_of_months' => 60,
                'institution' => '1st Security Bank',
                'notes' => NULL,
                'created_at' => '2020-03-19 10:59:27',
                'updated_at' => '2020-03-19 10:59:27',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Plan 2614',
                'default_monthly_payment_factor' => '0.0102785000',
                'default_interest_rate' => '6.99',
                'number_of_months' => 144,
                'institution' => '1st Security Bank',
                'notes' => NULL,
                'created_at' => '2020-03-19 11:00:20',
                'updated_at' => '2020-03-19 11:00:20',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Code 6995YRL86',
                'default_monthly_payment_factor' => '0.0198000000',
                'default_interest_rate' => '6.99',
                'number_of_months' => 60,
                'institution' => 'Enerbank USA',
                'notes' => NULL,
                'created_at' => '2020-03-19 11:00:54',
                'updated_at' => '2020-03-19 11:00:54',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Code 99912YRLL36',
                'default_monthly_payment_factor' => '0.0119200000',
                'default_interest_rate' => '9.99',
                'number_of_months' => 144,
                'institution' => 'Enerbank USA',
                'notes' => NULL,
                'created_at' => '2020-03-19 11:01:55',
                'updated_at' => '2020-03-19 11:01:55',
            ),
        ));
        
        
    }
}