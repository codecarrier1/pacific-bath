<?php

use Illuminate\Database\Seeder;

class InstallationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaults = [
            ['Assigned', 'The lead has been assigned to the installation manager.'],
            ['Acknowledged', 'The lead has been acknowledged by the installation manager.'],
            ['Approved', 'The lead has been approved by the installation manager.'],
            [' ', 'Empty'],
        ];

        foreach ($defaults as $default) {
            [$name, $description] = $default;
            \App\InstallationStatus::create(['name' => $name, 'description' => $description]);
        }
    }
}
