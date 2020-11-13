<?php

namespace Tests\Feature;

use App\Lead;
use App\User;
use App\Location;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase, WithoutEvents;

    /** @test */
    public function an_authenticated_sales_rep_can_view_the_sales_dashboard()
    {
        $this->seed('RoleAndPermissionSeeder');
        $user = factory(User::class)->state('salesRep')->create();
        $response = $this->actingAs($user)->get(route('dashboard.mine'));
        $response->assertOk();
        $response->assertViewIs('sales.dashboard');
    }

    /** @test */
    public function an_authenticated_admin_can_view_the_admin_dashboard()
    {
        $this->seed('RoleAndPermissionSeeder');
        $user = factory(User::class)->state('admin')->create();
        $response = $this->actingAs($user)->get(route('dashboard.admin'));
        $response->assertOk();
        $response->assertViewIs('admin.dashboard');
    }

    /** @test */
    public function a_user_must_be_authenticated_to_view_the_dashboard()
    {
        $response = $this->get(route('dashboard.mine'));
        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function it_returns_the_chart_data_for_all_users()
    {
        //TODO remove these seeds so its faster
        $this->seed(\LocationSeeder::class);
        $this->seed(\SalesDispositionSeeder::class);
        $this->seed(\ServiceSeeder::class);
        $this->seed(\RoleAndPermissionSeeder::class);
        $this->seed(\RealUserSeeder::class);
        $this->seed(\FakeUserSeeder::class);
        $this->seed(\InstallationStatusSeeder::class);
        $this->seed(\SmallerLeadSeeder::class);
        $user = User::role('Administrator')->inRandomOrder()->first();
        $response = $this->actingAs($user)->get(route('admin.dashboard.charts'));
        $response->assertOk();
        $response->assertSee('project_breakdown');
        $response->assertSee('close_rate');
        $response->assertSee('revenue');
    }

    /** @test */
    public function it_returns_the_chart_data_for_a_single_user()
    {
        $this->seed('SalesDispositionSeeder');
        $this->seed('ServiceSeeder');
        $this->seed('RoleAndPermissionSeeder');
        $user = factory(User::class)->state('salesRep')->create();
        $leads = factory(Lead::class, 30)->create(['user_id' => $user->id]);
        $response = $this->actingAs($user)->get(route('sales.dashboard.charts', [$user]));
        $response->assertOk();
        $response->assertSee('project_breakdown');
        $response->assertSee('close_rate');
        $response->assertSee('revenue');
    }
}
