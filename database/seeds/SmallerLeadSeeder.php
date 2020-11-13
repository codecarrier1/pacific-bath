<?php

use Illuminate\Database\Seeder;

class SmallerLeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notSold = \App\SalesDisposition::isNotSold()->get(['id'])->pluck('id')->values();
        $notSold->random();
        $salesReps = \App\User::Role('Sales Representative')->get(['id'])->pluck('id')->values();
        $services = \App\Service::all(['id'])->pluck('id')->values();
        $now = \Carbon\Carbon::now();
        $data = factory(App\Lead::class, 30)->raw([
            'sales_disposition_id' => $notSold->random(),
            'service_id' => $services->random(),
            'user_id' => $salesReps->random(),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        \App\Lead::insert($data);
        $soldLeads = factory(App\Lead::class, 30)->state('sold')->raw([
            'service_id' => $services->random(),
            'user_id' => $salesReps->random(),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        \App\Lead::insert($soldLeads);
        $questions = \App\DiscoveryQuestion::with('choices')->get();
        foreach (\App\Lead::where('sales_disposition_id', '!=', \App\SalesDisposition::SALES)->get(['id']) as $lead) {
            foreach ($questions as $question) {
                factory(\App\DiscoveryQuestionAnswer::class)->create([
                    'lead_id' => $lead->id,
                    'discovery_question_id' => $question->id,
                ]);
            }
        }
    }
}
