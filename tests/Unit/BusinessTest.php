<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Carbon\Carbon;
use App\Business;

class BusinessTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->withoutExceptionHandling();
    }
    
    /** @test */
    public function testBusinessHasName()
    {
        $name = "{$this->faker->company} {$this->faker->companySuffix}";
        $business = factory(Business::class)->create(['business_name' => $name]);
        $this->assertEquals($name, $business->business_name);
    }

    public function testBusinessContactName()
    {
        $businessContactName = "{$this->faker->firstName} {$this->faker->lastName}";
        $business = factory(Business::class)->create(['business_contact_name' => $businessContactName]);
        $this->assertEquals($businessContactName, $business->business_contact_name);
    }

    public function testBusinessHasContactNumber()
    {
        $phoneNumber = $this->faker->phoneNumber;
        $business = factory(Business::class)->create(['business_contact_number' => $phoneNumber]);
        $this->assertEquals($phoneNumber, $business->business_contact_number);
    }

    public function testBusinessHasEmail()
    {
        $contactEmail = $this->faker->safeEmail;
        $business = factory(Business::class)->create(['business_contact_email' => $contactEmail]);
        $this->assertEquals($contactEmail, $business->business_contact_email);
    }

    public function testBusinessHasWebsite()
    {
        $url = $this->faker->url;

        $business = factory(Business::class)->create(['business_website' => $url]);
        $this->assertEquals($url, $business->business_website);
    }

    public function testBusinessHasAddress1()
    {
        $address1 = $this->faker->secondaryAddress;

        $business = factory(Business::class)->create([ 'address_1' => $address1]);
        $this->assertEquals($address1, $business->address_1);
    }

    public function testBusinessHasAddress2()
    {
        $address2 = $this->faker->secondaryAddress;

        $business = factory(Business::class)->create([ 'address_1' => $address2]);
        $this->assertEquals($address2, $business->address_1);
    }

    public function testBusinessHasArea()
    {
        $area = $this->faker->citySuffix;

        $business = factory(Business::class)->create(['area' => $area]);
        $this->assertEquals($area, $business->area);
    }

    public function testBusinessHasCity()
    {
        $city = $this->faker->city;

        $business = factory(Business::class)->create(['city' => $city]);
        $this->assertEquals($city, $business->city);
    }

    public function testBusinessHasCountry()
    {
        $country = $this->faker->country;

        $business = factory(Business::class)->create(['country' => $country]);
        $this->assertEquals($country, $business->country);
    }

    public function testBusinessHasBusinessProfile()
    {
        $businessProfile = $this->faker->realText($maxNbChars = 200, $indexSize = 2);
        $business = factory(Business::class)->create(['business_profile' => $businessProfile]);
        $this->assertEquals($businessProfile, $business->business_profile);
    }

    public function testBusinessHasBusinessSectors()
    {
        $businessSectors = $this->faker->words;

        $business = factory(Business::class)->create(['business_sectors' => $businessSectors]);
        $this->assertEquals($businessSectors, $business->business_sectors);
    }

    public function testBusinessHasServices()
    {
        $services = $this->faker->words;

        $business = factory(Business::class)->create(['services' => $services]);
        $this->assertEquals($services, $business->services);
    }

    public function testBusinessHasBusinessHours()
    {
        $businessHours = ['start' => $this->faker->word, 'end' => $this->faker->word];

        $business = factory(Business::class)->create(['business_hours' => $businessHours]);
        $this->assertEquals($businessHours, $business->business_hours);
    }

    public function testBusinessHasEstablishmentDate()
    {
        $establishmentDate = Carbon::now()->subtract(1, 'year');

        $business = factory(Business::class)->create(['business_establishment_date' => $establishmentDate]);
        $this->assertEquals($establishmentDate, $business->business_establishment_date);
    }

    public function testBusinessHasGeographicalArea()
    {
        $geographicalArea =  $this->faker->city;

        $business = factory(Business::class)->create(['geographical_area' => $geographicalArea]);
        $this->assertEquals($geographicalArea, $business->geographical_area);
    }

    public function testBusinessHasKeywords()
    {
        $keywords = $this->faker->words;

        $business = factory(Business::class)->create(['search_keywords' => $keywords]);
        $this->assertEquals($keywords, $business->search_keywords);
    }
}
