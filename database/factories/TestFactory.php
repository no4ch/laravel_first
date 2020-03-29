<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Test;
use Faker\Generator as Faker;


  $factory->define(Test::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'description' => $faker->realText(50, 15),
    ];
});
