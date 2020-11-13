<?php

use Illuminate\Database\Seeder;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'House',
            'Town Home',
            'Manufacturer Home',
            'Condo',
        ];
        foreach ($types as $type) {
            \App\PropertyType::create(['name' => $type]);
        }
    }
}
