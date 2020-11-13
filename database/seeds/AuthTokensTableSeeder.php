<?php

use Illuminate\Database\Seeder;

class AuthTokensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('auth_tokens')->delete();

        \DB::table('auth_tokens')->insert(array (
            0 =>
            array (
                'id' => 1,
                'access_token' => NULL,
                'refresh_token' => NULL,
                'type' => \App\AuthToken::HELLOSIGN,
                'user_id' => NULL,
                'created_at' => '2020-01-29 17:46:58',
                'updated_at' => '2020-01-29 17:46:58',
            ),
        ));


    }
}
