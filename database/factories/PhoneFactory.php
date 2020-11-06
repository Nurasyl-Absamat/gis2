<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Phone;
use Faker\Generator as Faker;

$factory->define(Phone::class, function (Faker $faker) {
    return [
        'phone_num' => $faker->phoneNumber,
        'firm_id' => factory('App\Models\Firm')->create()->id,
    ];
});
