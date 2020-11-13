<?php

use Illuminate\Database\Seeder;

/**
 * Class SalesDocumentSeeder
 */
class SalesDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\SalesDocument::class, 3)->create();
    }
}
