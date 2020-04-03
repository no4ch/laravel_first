<?php

  /** @var \Illuminate\Database\Eloquent\Factory $factory */

  use App\Models\Question;
  use Faker\Generator as Faker;

  $factory->define(Question::class, function (Faker $faker) {
    return [
      'test_id' => rand(1, 15),
      'question' => $faker->realText(rand(30, 55)) . "?",
    ];
  });
