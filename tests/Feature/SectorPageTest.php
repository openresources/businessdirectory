<?php

namespace Tests\Feature;

use Tests\TestCase;
use SectorsTableSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Sector;
use App\Category;

class SectorPageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setup();
        $this->actingAs(factory(User::class)->create());
        $this->withoutExceptionHandling();
    }

    /* @test */
    public function testIfUserSeesListOfBusinesses()
    {
        $this->assertAuthenticated();
        $this->seed(SectorsTableSeeder::class);

        $sector = Sector::first();

        $response = $this->get(route('sectors.show', $sector))
        ->assertStatus(200)
            ->assertSee($sector->name)
            ->assertViewIs('sectors.show')
            ->assertViewHas('sector')
            ->assertViewHas('businesses')
        ;
    }
}
