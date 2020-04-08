<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class CreateBusinessEntryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setup();
    }

    /** @test */
    public function testGuestCannotAccessPage()
    {
        $response = $this->get(route('businesses.create'));
        $response->assertStatus(302);
    }

    /** @test */
    public function testAuthenticatedUserCanAccessPage()
    {
        $this->actingAs(factory(User::class)->create());
        $response = $this->get(route('businesses.create'));
        $response->assertStatus(200);
    }

    /** @test  */
    function can_create_post()
    {
        $this->actingAs(factory(User::class)->create())

        Livewire::test(CreatePost::class)
            ->set('title', 'foo')
            ->call('create');

        $this->assertTrue(Post::whereTitle('foo')->exists());
    }
}
