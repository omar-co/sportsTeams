<?php

use Faker\Generator as Faker;

$factory->define(\App\Players::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'team_id' => $faker->randomElement(App\Teams::all())->id
    ];
});
