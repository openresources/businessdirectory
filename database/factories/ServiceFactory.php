<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Service;
use App\Common\ServicesList;

$factory->define(Service::class, function (Faker $faker) {
    $service = ServicesList::services()->random();
    return [
        'name' => $service['name'],
        'description' => $service['description']
    ];
});
