<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Sector;
use App\Common\Enums\Sectors;

$factory->define(App\Sector::class, function (Faker $faker) {
    
    $name = (String) Str::of(Sectors::getDescription(Sectors::getRandomValue()))->title();

    return [
        'name' => $name,
        'description' => $name,
    ];
});
