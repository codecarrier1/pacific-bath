<?php

use App\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Location::class)->create(['name' => 'Seattle, WA']);
        factory(App\Location::class)->create(['name' => 'Portland, OR']);
    }
}
