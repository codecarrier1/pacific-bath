<?php

use Illuminate\Database\Seeder;

class SalesDispositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaults = [
            ['Sold', 'Contract Signed'],
            ['New', 'Not yet acknowledged'],
            ['Acknowledged', 'Lead acknowledged in dashboard'],
            ['Demoed, Not Sold', 'Demoed, Not Sold'],
            ['Follow-up', 'Follow-up'],
            ['Not Demoed', 'Not Demoed'],
            ['No Show', 'No Show'],
            ['Not Run', 'Not Run'],
            ['Not Covered', 'Not Covered'],
            ['Not Confirmed', 'Not Confirmed'],
            ['Cancelled', 'Cancelled'],

        ];

        foreach ($defaults as $default) {
            [$name, $description] = $default;
            \App\SalesDisposition::create(['name' => $name, 'description' => $description]);
        }
    }
}
