<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Tests\TestCase;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DevLoginControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_throws_a_not_found_exception_if_app_env_is_not_local()
    {
        $this->withoutExceptionHandling();
        $this->expectException(NotFoundHttpException::class);
        config(['app.env' => 'staging']);
        $user = factory(User::class)->create();
        // string must be used because route is only defined in local
        $routeString = '/devlogin/'.$user->id;
        $this->get($routeString);
    }
}
