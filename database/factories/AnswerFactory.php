<?php

  /** @var \Illuminate\Database\Eloquent\Factory $factory */


  use App\Models\Answer;
  use Faker\Generator as Faker;

  $factory->define(Answer::class, function (Faker $faker) {
    return [
      'question_id' => rand(1, 20),
      'answer' => $faker->realText(rand(35, 70)),
    ];
  });
