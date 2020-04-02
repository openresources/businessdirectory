<?php

namespace Tests\Feature\Components;

use App\Business;
use App\Http\Livewire\CreateBusinessEntry;
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

        $establishmentDate = Carbon::now()->subtract(1, 'year');

        Livewire::test(CreateBusinessEntry::class)
            ->set('business_name', 'moon')
            ->set('business_contact_name', 'bob')
            ->set('business_contact_number', '12345')
            ->set('business_contact_email', 'abc@d.test')
            ->set('business_website', 'http://abcd.test')
            ->set('address_1', 'foo bar')
            ->set('address_2', 'foo bar')
            ->set('area', 'bar')
            ->set('city', 'baz')
            ->set('country', 'bar')
            ->set('business_profile', 'baz')
            ->set('business_sectors', ['foo', 'bar'])
            ->set('services', ['foo', 'bar'])
            ->set('business_hours', ['foo', 'bar'])
            ->set('business_establishment_date', $establishmentDate)
            ->set('geographical_area', 'foo')
            ->call('create');

        $this->assertTrue(Business::where('business_name', 'moon')
                ->where('business_contact_name', 'bob')
                ->where('business_contact_number', '12345')
                ->where('business_contact_email', 'abc@d.test')
                ->where('business_website', 'http://abcd.test')
                ->where('address_1', 'foo bar')
                ->where('address_2', 'foo bar')
                ->where('area', 'bar')
                ->where('city', 'baz')
                ->where('country', 'bar')
                ->where('business_profile', 'baz')
                ->where('business_sectors->item-0', 'foo')
                ->where('business_sectors->item-1', 'bar')
                ->where('services->item-0', 'foo')
                ->where('services->item-1', 'bar')
                ->where('business_hours->item-1', 'bar')
                ->where('business_establishment_date', $establishmentDate)
                ->where('geographical_area', 'foo')
                ->exists());
    }
}
