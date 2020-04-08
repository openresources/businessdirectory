<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Business;
use App\Common\Enums\Sectors;
use App\Sector;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$dt = Carbon::now();

$factory->define(App\Business::class, function (Faker $faker) {
    return [
        'name' => "{$faker->company} {$faker->companySuffix}",
        'contact_name' => "{$faker->firstName} {$faker->lastName}",
        'phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'website' => $faker->url,
        'address_1' => $faker->secondaryAddress,
        'address_2' => $faker->streetName,
        'area' => $faker->citySuffix,
        'city' => $faker->city,
        'country' => $faker->country,
        'profile' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'sector_id' => mt_rand(1, count(Sectors::getKeys())),
        'business_hours' => ['start' => Carbon::now()->hour(8)->minute(0), 'end' => Carbon::now()->hour(17)->minute(0)],
        'establishment_date' => Carbon::now()->subtract(1, 'year'),
        'geographical_area' => $faker->city,
        'search_keywords' => $faker->words,
    ];
});

$factory->state(App\Business::class, 'sector', function () {
    return [
        'sector_id' => Sectors::getRandomValue()
    ];
});

$factory->state(App\Business::class, 'owner', function () {
    return [
        'user_id' => factory(App\User::class)->create()->id,
    ];
});
