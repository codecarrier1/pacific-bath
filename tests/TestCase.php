<?php

namespace Tests;

use App\Actions\SalesforceService;
use JMac\Testing\Traits\HttpTestAssertions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Mockery;
use Tests\Mocks\SalesforceServiceMock;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, HttpTestAssertions;

}
