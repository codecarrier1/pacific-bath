<?php

namespace App\Observers;

use App\AuthToken;
use App\Actions\SalesforceService;
use App\User;

class UserObserver
{
    public function created(User $user)
    {
        AuthToken::create([
            'user_id' => $user->id,
            'type' => AuthToken::SALESFORCE,
        ]);
    }
}
