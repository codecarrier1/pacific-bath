<?php

use Illuminate\Database\Seeder;

class RealUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->state('admin')->disableEvents()->create([
            'email' => 'rory@brightoak.com',
            'first_name' => 'Admin',
            'last_name' => 'McDaniel',
            'timezone' => 'America/New_York',
            'salesforce_id' => 'a0j8A000000dZLEQA2', // "Admin" salesforce user
            'location_id' => 1,
        ]);
        factory(App\User::class)->state('salesRep')->disableEvents()->create([
            'email' => 'hoyer801@gmail.com',
            'first_name' => 'Rory',
            'last_name' => 'McDaniel',
            'timezone' => 'America/New_York',
            'location_id' => 1,
        ]);
        factory(App\User::class)->state('salesRep')->disableEvents()->create([
            'email' => 'rorycmcdaniel@gmail.com',
            'first_name' => 'Sales Rep',
            'last_name' => 'McDaniel',
            'timezone' => 'America/New_York',
            'salesforce_id' => 'a0j8A000000yE7HQAU', // "test rep 3" salesforce user
            'location_id' => 1,
        ]);
        factory(App\User::class)->state('admin')->disableEvents()->create([
            'email' => 'mikhail@brightoak.com',
            'first_name' => 'Mikhail',
            'last_name' => 'Karkachov',
            'timezone' => 'Europe/Uzhgorod',
            'location_id' => 1,
        ]);
        factory(App\User::class)->state('admin')->disableEvents()->create([
            'email' => 'eric@brightoak.com',
            'first_name' => 'Eric',
            'last_name' => 'Percifield',
            'timezone' => 'America/Chicago',
            'location_id' => 1,
        ]);

        factory(App\User::class)->state('admin')->disableEvents()->create([
            'email' => 'zach@brightoak.com',
            'first_name' => 'Admin',
            'last_name' => 'Mettra',
            'location_id' => 1,
        ]);
        factory(App\User::class)->state('salesRep')->disableEvents()->create([
            'email' => 'twitter@brightoak.com',
            'first_name' => 'Sales Rep',
            'last_name' => 'Mettra',
            'location_id' => 1,
            'salesforce_id' => 'a0j8A000000yE7CQAU', // "test rep 2"
        ]);
        factory(App\User::class)->state('admin')->disableEvents()->create([
            'email' => 'jessica@brightoak.com',
            'first_name' => 'Admin',
            'last_name' => 'Jessica',
            'location_id' => 1,
        ]);
        factory(App\User::class)->state('salesRep')->disableEvents()->create([
            'email' => 'jzmcandless@gmail.com',
            'first_name' => 'Sales Rep',
            'last_name' => 'Jessica',
            'location_id' => 1,
            'salesforce_id' => 'a0j8A000000yE77QAE', // test rep 1
        ]);
        factory(App\User::class)->state('admin')->disableEvents()->create([
            'email' => 'tblinn@pacificbath.com',
            'first_name' => 'Todd',
            'last_name' => 'Blinn',
            'location_id' => 1,
        ]);
        factory(App\User::class)->state('admin')->disableEvents()->create([
            'email' => 'rbletko@pacificbath.com',
            'first_name' => 'Roy',
            'last_name' => 'Bletko',
            'location_id' => 1,
        ]);
        factory(App\User::class)->state('admin')->disableEvents()->create([
            'email' => 'ecurtis@pacificbath.com',
            'first_name' => 'Eric',
            'last_name' => 'Curtis',
            'location_id' => 1,
            'salesforce_id' => 'a0j8A000000eBuM',
        ]);
        factory(App\User::class)->state('admin')->disableEvents()->create([
            'email' => 'nvhoores@pacificbath.com',
            'first_name' => 'N',
            'last_name' => 'Vorhrees',
            'location_id' => 1,
        ]);
        factory(App\User::class)->state('admin')->disableEvents()->create([
            'email' => 'dbelgarde@pacificbath.com',
            'first_name' => 'Dawn',
            'last_name' => 'Belgarde',
            'location_id' => 1,
            'salesforce_id' => 'a0j8A000000xKc1QAE',
        ]);
    }
}
