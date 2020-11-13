<?php

use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leads = [];
        \App\Lead::each(function($lead) use (&$leads){
            $data['lead_id'] = $lead->id;
            $data['user_id'] = $lead->user_id;
            $data['created_at'] = now();
            $data['updated_at'] = now();
            $leads[] = $data;
        });
        \App\Quote::insert($leads);
    }
}
