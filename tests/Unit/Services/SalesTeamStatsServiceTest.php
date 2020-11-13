<?php

namespace Tests\Unit\Services;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SalesTeamStatsServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_an_array_of_data_about_all_users_with_the_sales_reprentative_role()
    {
        $this->seed(\LocationSeeder::class);
        $this->seed(\InstallationStatusSeeder::class);
        $this->seed(\RoleAndPermissionSeeder::class);
        $this->seed(\ServiceSeeder::class);
        $this->seed(\SalesDispositionSeeder::class);
        $this->seed(\FakeUserSeeder::class);
        $this->seed(\SmallerLeadSeeder::class);
        $data = app(\App\Services\SalesTeamStatsService::class)->get();
        $this->assertIsArray($data);
        $salesRepsCount = User::Role('Sales Representative')->count();
        $this->assertCount($salesRepsCount, $data);

        // Spot check one
        $salesRep = User::Role('Sales Representative')->with('leads', 'location')->first();
        $this->assertEquals($salesRep->fullName, $data[0]['name']);
        $this->assertEquals($salesRep->location->name, $data[0]['office']);
        $this->assertEquals('Sales Agent', $data[0]['title']);
        $this->assertStringContainsString($salesRep->getSmallAvatar(), $data[0]['avatar']);
    }
}
