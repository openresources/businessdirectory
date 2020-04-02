<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGuestIsRedirectedToLogin()
    {
        $response = $this->get('/');
        $this->assertGuest();
        $response->assertRedirect(route('login'));
    }

    public function testAuthenticatedUserCanSeeDirectory()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->get('/');
        $this->assertAuthenticated();
    }

    /** @test */
    public function testAuthenticatedUserCanSeeForm()
    {
        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('businesses/create')
            ->assertOk()
            ->assertViewIs('businesses.create');
    }
}
