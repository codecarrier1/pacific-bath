<?php

namespace App\Exceptions;

use Exception;

class IncorrectServiceName extends Exception
{
    protected $message = 'The service name provided by Salesforce does not match the local database.';
}
