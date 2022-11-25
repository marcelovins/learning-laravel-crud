<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_if_not_logged_return_for_home()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', 'marcelovins@gmail.com')
                    ->type('password', 'celular')
                    ->press('LOG IN')
                    ->assertPathIs('/');
    });

    }
}
