<?php

use Illuminate\Database\Seeder;

class ProcessorStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaults = [
            ['Assigned', 'The lead has been assigned to a processor.'],
            ['Acknowledged', 'The lead has been acknowledged by the processor.'],
            [' ', 'Empty'],
        ];

        foreach ($defaults as $default) {
            [$name, $description] = $default;
            \App\ProcessorStatus::create(['name' => $name, 'description' => $description]);
        }
    }
}
