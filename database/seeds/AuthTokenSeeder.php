<?php

use Illuminate\Database\Seeder;

class AuthTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\AuthToken::create(['type' => \App\AuthToken::HELLOSIGN]);
    }
}
