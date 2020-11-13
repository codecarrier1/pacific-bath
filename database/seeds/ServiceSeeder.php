<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Enforce our hard-coded IDs into our models
        $services = collect([
            Service::SHOWERS => 'Showers',
            Service::WALK_INS => 'Walk Ins',
            Service::BATHTUBS => 'Bath Tubs',
        ]);

        $services->each(function ($value, $id) {
            factory(Service::class)->create([
                'id' => $id,
                'name' => $value,
            ]);
        });
    }
}
