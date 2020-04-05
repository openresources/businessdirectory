<?php

namespace Tests\Feature\Components;

use App\Business;
use App\Http\Livewire\CreateBusinessEntry;
use App\Service;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class CreateBusinessEntryTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function testCanCreateBusinessEntry()
    {
        $this->actingAs(factory(User::class)->create());

        $services = factory(Service::class, 3)->create();
        $establishmentDate = Carbon::now()->subtract(1, 'year');

        Livewire::test(CreateBusinessEntry::class)
            ->set('name', 'moon')
            ->set('contact_name', 'bob')
            ->set('contact_number', '12345')
            ->set('contact_email', 'abc@d.test')
            ->set('website', 'http://abcd.test')
            ->set('address_1', 'foo bar')
            ->set('address_2', 'foo bar')
            ->set('area', 'bar')
            ->set('city', 'baz')
            ->set('country', 'bar')
            ->set('profile', 'baz')
            ->set('sector_id', 1)
            ->set('services', ['1', '2'])
            ->set('business_hours', ['foo', 'bar'])
            ->set('establishment_date', $establishmentDate)
            ->set('geographical_area', 'foo')
            ->call('create')
            ->assertRedirect(route('businesses.index'))
        ;

        $this->assertTrue(Business::where('name', 'moon')
                ->where('contact_name', 'bob')
                ->where('contact_number', '12345')
                ->where('contact_email', 'abc@d.test')
                ->where('website', 'http://abcd.test')
                ->where('address_1', 'foo bar')
                ->where('address_2', 'foo bar')
                ->where('area', 'bar')
                ->where('city', 'baz')
                ->where('country', 'bar')
                ->where('profile', 'baz')
                ->where('sector_id', 1)
                ->where('business_hours->item-1', 'bar')
                ->where('establishment_date', $establishmentDate)
                ->where('geographical_area', 'foo')
                ->exists());

    }
}
