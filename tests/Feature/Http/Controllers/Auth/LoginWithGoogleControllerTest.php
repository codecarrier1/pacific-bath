<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Mockery;
use App\User;
use Socialite;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginWithGoogleControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function it_returns_ok_when_the_login_page_is_viewed()
    {
        $response = $this->get(route('login'));
        $response->assertOk();
        $response->assertSeeText('Login with your Google account below');
    }

    /** @test */
    public function it_redirects_when_already_authenticated()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get(route('login'));
        $response->assertRedirect();
    }

    /** @test */
    public function it_redirects_to_google()
    {
        $socialite = \Mockery::mock();
        $driver = \Mockery::mock();

        $socialite->shouldReceive('driver')
            ->with('google')
            ->andReturn($driver);

        $testResponse = 'This is the google login page';
        $driver->shouldReceive('redirect')
            ->withNoArgs()
            ->andReturn($testResponse);

        \Socialite::swap($socialite);

        $response = $this->get(route('google.login'));
        $response->assertStatus(200);
        $response->assertSee($testResponse);
    }

    /** @test */
    public function the_callback_redirects_an_authenticated_user_to_the_dashboard()
    {
        $this->withoutExceptionHandling();
        $this->seed('RoleAndPermissionSeeder');
        $adminUser = factory(User::class)->state('admin')->create();
        $abstractUser = Mockery::mock('Laravel\Socialite\Two\User');
        $abstractUser
            ->shouldReceive('getId')
            ->andReturn(rand())
            ->shouldReceive('getName')
            ->andReturn(Str::random(10))
            ->shouldReceive('getEmail')
            ->andReturn($adminUser->email)
            ->shouldReceive('getAvatar')
            ->andReturn('https://www.gravatar.com/avatar/'.md5($adminUser->email));

        Socialite::shouldReceive('driver->stateless->user')->andReturn($abstractUser);
        $this->get(route('google.callback'))->assertRedirect();
    }

    /** @test */
    public function the_callback_aborts_an_unathenticated_user()
    {
        $abstractUser = Mockery::mock('Laravel\Socialite\Two\User');
        $abstractUser
            ->shouldReceive('getId')
            ->andReturn(rand())
            ->shouldReceive('getName')
            ->andReturn(Str::random(10))
            ->shouldReceive('getEmail')
            ->andReturn($this->faker->email)
            ->shouldReceive('getAvatar')
            ->andReturn('https://en.gravatar.com/userimage');

        Socialite::shouldReceive('driver->stateless->user')->andReturn($abstractUser);

        $this->get(route('google.callback'))->assertStatus(403);
    }
}
