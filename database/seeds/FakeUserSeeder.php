<?php

use App\User;
use Illuminate\Database\Seeder;

class FakeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \App\Location::each(function ($location) {
            factory(App\User::class, 5)->state('salesRep')->create(['location_id' => $location->id]);
            factory(App\User::class, 3)->state('processor')->create(['location_id' => $location->id]);
            factory(App\User::class)->state('directorOfSales')->create(['location_id' => $location->id]);
            factory(App\User::class)->state('directorOfOps')->create(['location_id' => $location->id]);
            factory(App\User::class)->state('installManager')->create(['location_id' => $location->id]);
        });


    }
}
