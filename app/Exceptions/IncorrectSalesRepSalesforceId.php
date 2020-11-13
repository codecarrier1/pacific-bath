<?php

namespace App\Exceptions;

use Exception;

class IncorrectSalesRepSalesforceId extends Exception
{
    protected $message = 'No User with the salesforce_id exists in the local database.';
}
