<?php

namespace Tests\Feature\Http\Controllers\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LogoutControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testExample()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->make();
        $this->assertFalse(auth()->check());
        auth()->login($user);
        $this->assertTrue(auth()->check());
        $response = $this->get(route('logout'));
        $response->assertRedirect(route('login'));
        $this->assertFalse(auth()->check());
    }
}
