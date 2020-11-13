<?php

use App\Lead;
use Illuminate\Database\Seeder;

class LeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $notSold = \App\SalesDisposition::isNotSold()->inRandomOrder()->get(['id'])->pluck('id')->values();
        $salesReps = \App\User::Role('Sales Representative')->get(['id']);
        $services = \App\Service::all(['id'])->pluck('id')->values();
        $now = \Carbon\Carbon::now();
        $data = [];
        $soldLeads = [];
        foreach ($salesReps as $salesRep) {
            $numTotalLeads = rand(40, 60);
            $numSoldLeads = rand(5, 30);
            $numUnSoldLeads = $numTotalLeads - $numSoldLeads;
            for ($i = 0; $i < $numUnSoldLeads; $i++) {
                $leadData = factory(Lead::class)->raw([
                    'sales_disposition_id' => $notSold->random(),
                    'service_id' => $services->random(),
                    'user_id' => $salesRep->id,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
                $data[] = $leadData;
            }
            for ($i = 0; $i < $numSoldLeads; $i++) {
                $soldLeads[] = factory(Lead::class)->state('sold')->raw([
                    'service_id' => $services->random(),
                    'user_id' => $salesRep->id,
                    'is_acknowledged' => true,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
            for($i = 0; $i < 3; $i++){
                $todaysLeads[] =  factory(Lead::class)->state('today')->raw([
                    'sales_disposition_id' => $notSold->random(),
                    'service_id' => $services->random(),
                    'user_id' => $salesRep->id,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
        Lead::insert($data);
        Lead::insert($soldLeads);
        Lead::insert($todaysLeads);

//        $questions = \App\DiscoveryQuestion::with('choices')->get();
//        foreach (Lead::where('sales_disposition_id', '!=', \App\SalesDisposition::SALES)->get(['id']) as $lead) {
//            if($lead->appointment_time < now()){
//                foreach ($questions as $question) {
//                    factory(\App\DiscoveryQuestionAnswer::class)->create([
//                        'lead_id' => $lead->id,
//                        'discovery_question_id' => $question->id,
//                    ]);
//                }
//            }
//        }
    }
}
