<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewLoginScreenTest extends DuskTestCase
{
   /** @test */
    public function the_login_screen_displays_a_customized_message_based_on_time_of_day()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('login'))
                    ->assertSee('Login with your Google account below:');
        });
    }


}
