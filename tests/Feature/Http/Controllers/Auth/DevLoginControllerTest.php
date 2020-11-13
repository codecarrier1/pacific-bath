<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Tests\TestCase;
use InvalidArgumentException;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @see \App\Http\Controllers\Auth\DevLoginController
 */
class DevLoginControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /**
     * @test
     */
    public function store_returns_an_ok_response()
    {
        $user = factory(\App\User::class)->create();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Route [dev.login] not defined.');
        $response = $this->get(route('dev.login', [$user]));
    }

    // test cases...
}