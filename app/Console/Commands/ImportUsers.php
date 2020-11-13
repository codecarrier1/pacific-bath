<?php

namespace App\Console\Commands;

use App\Actions\SalesforceService;
use App\User;
use Illuminate\Console\Command;

class ImportUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports Sales Representatives from Salesforce';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Default result size is 2000, and as PB will not have that many staff any time in
        // the next several years, no handling of paginated results is needed;
        $staff = app(SalesforceService::class)->listStaff();
        foreach($staff->records as $record){
            if(!$record->i360__Email__c){
                continue;
            }
            if($user = User::where('email', $record->i360__Email__c)->first()){
                $user->salesforce_id = $record->Id;
                $user->save();
                $this->info($user->email . ' was updated with ' . $user->salesforce_id);
            }
        }
    }
}
