<?php

namespace Tests\Mocks;

use App\Actions\SalesforceService;

class SalesforceServiceMock
{
    public function getStaffByEmail($email)
    {
        $reply = new \stdClass;
        $reply->records = [];
        $reply->records[0] = new \stdClass();
        $reply->records[0]->Id = 'somethingnotrandom';
        return $reply;
    }
}
