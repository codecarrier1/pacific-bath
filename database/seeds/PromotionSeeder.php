<?php

use App\Promotion;
use Illuminate\Database\Seeder;

/**
 * Class PromotionSeeder
 */
class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('promotions')->truncate();
        factory(Promotion::class, 6)->create();
    }
}
