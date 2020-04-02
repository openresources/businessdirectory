<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Business::class, function (Faker $faker) {
    return [
        'business_name' => "{$faker->company} {$faker->companySuffix}",
        'business_contact_name' => "{$faker->firstName} {$faker->lastName}",
        'business_contact_number' => $faker->phoneNumber,
        'business_contact_email' => $faker->safeEmail,
        'business_website' => $faker->url,
        'address_1' => $faker->secondaryAddress,
        'address_2' => $faker->streetName,
        'area' => $faker->citySuffix                          ,
        'city' => $faker->city,
        'country' => $faker->country,
        'business_profile' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'business_sectors' => $faker->words,
        'services' => $faker->words,
        'business_hours' => ['start' => $faker->word, 'end' => $faker->word],
        'business_establishment_date' => Carbon::now()->subtract(1, 'year'),
        'geographical_area' => $faker->city,
        'search_keywords' => $faker->words
    ];
});
