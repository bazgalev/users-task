<?php

/** @var Factory $factory */

use App\Eloquent\CityEloquent;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(CityEloquent::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->city
    ];
});
