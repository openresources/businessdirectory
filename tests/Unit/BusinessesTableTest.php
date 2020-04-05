<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class BusinessesTableTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function itRunsTheMigrations()
    {

        $user = factory(User::class)->create([
            'name' => 'Bob',
            'email' => 'bob@acme.test',
        ]);

        $this->assertTrue(Schema::hasTable('users'));
        $this->assertEquals('Bob', $user->name);
        $this->assertEquals('bob@acme.test', $user->email);
        $this->assertTrue(Schema::hasTable('businesses'));

        $this->assertEquals([
            'id',
            'name',
            'slug',
            'user_id',
            'category_id',
            'contact_name',
            'contact_number',
            'contact_email',
            'website',
            'address_1',
            'address_2',
            'area',
            'city',
            'country',
            'profile',
            'sector_id',
            'business_hours',
            'establishment_date',
            'geographical_area',
            'search_keywords',
            'created_at',
            'updated_at'
        ], Schema::getColumnListing('businesses'));
    }
}
