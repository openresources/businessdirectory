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

        $this->assertEquals([
            'id',
            'user_id',
            'business_name',
            'business_contact_name',
            'business_contact_number',
            'business_contact_email',
            'business_website',
            'address_1',
            'address_2',
            'area',
            'city',
            'country',
            'business_profile',
            'business_sectors',
            'services',
            'business_hours',
            'business_establishment_date',
            'geographical_area',
            'search_keywords',
            'created_at',
            'updated_at'
        ], Schema::getColumnListing('businesses'));
    }
}
