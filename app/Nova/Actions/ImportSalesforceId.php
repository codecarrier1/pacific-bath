<?php

namespace App\Nova\Actions;

use App\Actions\SalesforceService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

class ImportSalesforceId extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
        $list = [];
        $models->each(function($user) use (&$list){
            try{
                $record = app(SalesforceService::class)->getStaffByEmail($user->email);
                $user->salesforce_id = $record->records[0]->Id;
                $user->save();
            }
            catch (\Throwable $exception){
                $list[]['user'] = $user->email;
                $list['message'] = $exception->getMessage();
            }
        });
        if(empty($list)){
            return Action::message("All users imported successfully.");
        }
        return Action::danger("Salesforce ID could not be imported for some users. Please make sure they already exist in Salesforce.");

    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
