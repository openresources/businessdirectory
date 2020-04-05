<?php

namespace Tests\Feature;

use App\Business;
use App\Category;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class BusinessListingTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setup();
        $this->actingAs(factory(User::class)->create());
        $this->withoutExceptionHandling();
    }

    /** @test */
    public function testIfUserSeesListOfCategories()
    {
        $this->assertAuthenticated();

        factory(\App\Category::class, 10)->create();

        $categories = DB::table('categories')->get();

        $this->get(route('categories.index'))
            ->assertStatus(200)
        ;
    }

    /* @test */
    public function testIfUserSeesListOfBusinesses()
    {
        $this->assertAuthenticated();

        factory(\App\Business::class, 10)->create();

        $businesses = DB::table('businesses')->get();

        $this->get(route('categories.businesses.index'))
            ->assertStatus(200)
            ->assertViewIs('businesses.index')
            ->assertViewHas('businesses', $businesses)
        ;
    }
}
