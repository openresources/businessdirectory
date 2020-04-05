<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Schema\Blueprint;
use App\User;

class MigrationsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase();

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
            'email',
            'email_verified_at',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
            'avatar',
            'role_id',
            'status_id',
            'last_login',
            'current_login',
            'login_count',
            'name',
        ], Schema::getColumnListing('users'));
    }

    protected function setUpDatabase()
    {

        if (Schema::hasTable('users')) {
            return;
        }
    }
}
