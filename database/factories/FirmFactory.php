<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Firm;
use Faker\Generator as Faker;

$factory->define(Firm::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'building_id' => factory('App\Models\Building')->create()->id,
    ];
});
