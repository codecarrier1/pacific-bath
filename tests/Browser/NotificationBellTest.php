<?php

namespace Tests\Browser;

use App\Lead;
use App\User;
use Tests\DuskTestCase;
use App\SalesDisposition;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class NotificationBellTest extends DuskTestCase
{

    /** @test */
    public function a_sales_representative_sees_the_number_of_unacknowleded_leads_in_the_bell_icon()
    {

        $this->browse(function (Browser $browser) {
            $user = User::Role('Sales Representative')->first();
            $browser->loginAs($user)->visit(route('home'))->assertSee('Pending Projects');
            $unacknowledged = $user->leads()->where('is_acknowledged', 0)->count();
            $browser->assertSee($unacknowledged);
        });
    }
}
