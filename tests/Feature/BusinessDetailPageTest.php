<?php

namespace Tests\Feature;

use Tests\TestCase;
use SectorsTableSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Business;

class BusinessDetailPageTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setup();
        $this->actingAs(factory(User::class)->create());
        $this->withoutExceptionHandling();
    }

    /** @test */
    public function testIfUserCanSeeBusinessDetailsPage()
    {
        $this->assertAuthenticated();
        $this->seed(SectorsTableSeeder::class);

        $business = factory(Business::class)->states('sector')->create();
        $sector = $business->sector;

        $response = $this->get(route('sectors.businesses.show', [$sector, $business]))
            ->assertStatus(200)
            ->assertSee($business->name)
            ->assertViewIs('sectors.businesses.show')
            ->assertViewHas('business')
        ;
    }
}
