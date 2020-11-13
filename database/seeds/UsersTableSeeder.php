<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'first_name' => 'Admin',
                'last_name' => 'McDaniel',
                'email' => 'rory@brightoak.com',
                'phone' => '168942364143155',
                'salesforce_id' => NULL,
                'timezone' => 'America/New_York',
                'location_id' => 1,
                'created_at' => '2020-01-30 18:16:56',
                'updated_at' => '2020-01-30 18:16:56',
            ),
            1 => 
            array (
                'id' => 2,
                'first_name' => 'Rory',
                'last_name' => 'McDaniel',
                'email' => 'hoyer801@gmail.com',
                'phone' => '17743612413244',
                'salesforce_id' => 'a0j8A000000dZLEQA2',
                'timezone' => 'America/New_York',
                'location_id' => 1,
                'created_at' => '2020-01-30 18:16:56',
                'updated_at' => '2020-01-30 18:16:56',
            ),
            2 => 
            array (
                'id' => 3,
                'first_name' => 'Sales Rep',
                'last_name' => 'McDaniel',
                'email' => 'rorycmcdaniel@gmail.com',
                'phone' => '15355176119',
                'salesforce_id' => 'a0j8A000000yE7HQAU',
                'timezone' => 'America/New_York',
                'location_id' => 1,
                'created_at' => '2020-01-30 18:16:56',
                'updated_at' => '2020-01-31 03:30:29',
            ),
            3 => 
            array (
                'id' => 4,
                'first_name' => 'Mikhail',
                'last_name' => 'Karkachov',
                'email' => 'mikhail@brightoak.com',
                'phone' => '9602441253',
                'salesforce_id' => NULL,
                'timezone' => 'Europe/Uzhgorod',
                'location_id' => 1,
                'created_at' => '2020-01-30 18:16:56',
                'updated_at' => '2020-01-30 18:16:56',
            ),
            4 => 
            array (
                'id' => 5,
                'first_name' => 'Eric',
                'last_name' => 'Percifield',
                'email' => 'eric@brightoak.com',
                'phone' => '13953588056',
                'salesforce_id' => NULL,
                'timezone' => 'America/Chicago',
                'location_id' => 1,
                'created_at' => '2020-01-30 18:16:56',
                'updated_at' => '2020-01-30 18:16:56',
            ),
            5 => 
            array (
                'id' => 6,
                'first_name' => 'Admin',
                'last_name' => 'Mettra',
                'email' => 'zach@brightoak.com',
                'phone' => '5249159052',
                'salesforce_id' => NULL,
                'timezone' => 'America/Los_Angeles',
                'location_id' => 1,
                'created_at' => '2020-01-30 18:16:56',
                'updated_at' => '2020-01-30 18:16:56',
            ),
            6 => 
            array (
                'id' => 7,
                'first_name' => 'Sales Rep',
                'last_name' => 'Mettra',
                'email' => 'twitter@brightoak.com',
                'phone' => '14583469160',
                'salesforce_id' => 'a0j8A000000yE7CQAU',
                'timezone' => 'America/Los_Angeles',
                'location_id' => 1,
                'created_at' => '2020-01-30 18:16:56',
                'updated_at' => '2020-01-31 03:30:31',
            ),
            7 => 
            array (
                'id' => 8,
                'first_name' => 'Admin',
                'last_name' => 'Jessica',
                'email' => 'jessica@brightoak.com',
                'phone' => '1734285389241590',
                'salesforce_id' => NULL,
                'timezone' => 'America/Los_Angeles',
                'location_id' => 1,
                'created_at' => '2020-01-30 18:16:56',
                'updated_at' => '2020-01-30 18:16:56',
            ),
            8 => 
            array (
                'id' => 9,
                'first_name' => 'Sales Rep',
                'last_name' => 'Jessica',
                'email' => 'jzmcandless@gmail.com',
                'phone' => '2094968428',
                'salesforce_id' => 'a0j8A000000yE77QAE',
                'timezone' => 'America/Los_Angeles',
                'location_id' => 1,
                'created_at' => '2020-01-30 18:16:56',
                'updated_at' => '2020-01-31 03:30:30',
            ),
            9 => 
            array (
                'id' => 10,
                'first_name' => 'Todd',
                'last_name' => 'Blinn',
                'email' => 'tblinn@pacificbath.com',
                'phone' => '40384777647491',
                'salesforce_id' => NULL,
                'timezone' => 'America/Los_Angeles',
                'location_id' => 1,
                'created_at' => '2020-01-30 18:16:56',
                'updated_at' => '2020-01-30 18:16:56',
            ),
            10 => 
            array (
                'id' => 11,
                'first_name' => 'Roy',
                'last_name' => 'Bletko',
                'email' => 'rbletko@pacificbath.com',
                'phone' => '5052509923',
                'salesforce_id' => NULL,
                'timezone' => 'America/Los_Angeles',
                'location_id' => 1,
                'created_at' => '2020-01-30 18:16:56',
                'updated_at' => '2020-01-30 18:16:56',
            ),
            11 => 
            array (
                'id' => 12,
                'first_name' => 'Eric',
                'last_name' => 'Curtis',
                'email' => 'ecurtis@pacificbath.com',
                'phone' => '2124232060',
                'salesforce_id' => 'a0j8A000000eBuM',
                'timezone' => 'America/Los_Angeles',
                'location_id' => 1,
                'created_at' => '2020-01-30 18:16:56',
                'updated_at' => '2020-01-30 18:16:56',
            ),
            12 => 
            array (
                'id' => 13,
                'first_name' => 'N',
                'last_name' => 'Vorhrees',
                'email' => 'nvhoores@pacificbath.com',
                'phone' => '18735493112',
                'salesforce_id' => NULL,
                'timezone' => 'America/Los_Angeles',
                'location_id' => 1,
                'created_at' => '2020-01-30 18:16:56',
                'updated_at' => '2020-01-30 18:16:56',
            ),
            13 => 
            array (
                'id' => 14,
                'first_name' => 'Dawn',
                'last_name' => 'Belgarde',
                'email' => 'dbelgarde@pacificbath.com',
                'phone' => '2407576053',
                'salesforce_id' => 'a0j8A000000xKc1QAE',
                'timezone' => 'America/Los_Angeles',
                'location_id' => 1,
                'created_at' => '2020-01-30 18:16:56',
                'updated_at' => '2020-01-31 03:30:29',
            ),
        ));
        
        
    }
}