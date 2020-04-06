<?php

namespace Tests\Feature;

use Tests\TestCase;
use SectorsTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class WelcomePageSectorsListTest extends TestCase
{

    use RefreshDatabase;
    
    protected function setUp(): void
    {
        parent::setup();
        $this->actingAs(factory(User::class)->create());
        $this->withoutExceptionHandling();
    }
    
    /** @test */
    public function testIfUserSeesListOfSectors()
    {

        $this->assertAuthenticated();
        $this->seed(SectorsTableSeeder::class);
        
        $this->get(route('welcome'))
            ->assertStatus(200)
            ->assertViewIs('welcome')
            ->assertViewHas('sectors')
        ;
    }
}
