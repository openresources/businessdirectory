<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Role;
use App\Common\Enums\Roles;

$factory->define(Role::class, function (Faker $faker) {
    $name = (String) Str::of(Roles::getDescription(Roles::getRandomValue()))->title();

    return [
        'name' => $name,
        'description' => $name,
    ];
});
