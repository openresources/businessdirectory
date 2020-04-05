<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class AuthenticationTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testGuestCanSeeHomePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee(config('app.name'));
        });
    }

    public function testGuestIsRedirectedToLogin()
    {
        $this->browse(function ($browser) {
            $browser->visit(route('businesses.index'))
                ->assertPathIs('/login')
            ;
        });
    }

    /** @test */
    public function testAuthenticatedUserSeesDirectoryListing()
    {

        $user = factory(User::class)->create([
            'password' => bcrypt('seven,7'),
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user)
                ->visit(route('businesses.index'))
                ->assertSee(__('Directory Listing Title'))
                ->assertTitleContains(config('app.name'))
            ;
        });
    }
}
