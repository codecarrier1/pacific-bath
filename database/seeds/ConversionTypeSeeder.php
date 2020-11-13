<?php

use Illuminate\Database\Seeder;

class ConversionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Tub to Shower Conversion',
            'Tub to Tub Conversion',
            'Shower to Shower Conversion',
            'Kohler Walk In Bath',
        ];
        foreach ($types as $type) {
            \App\ConversionType::create(['name' => $type]);
        }
    }
}
