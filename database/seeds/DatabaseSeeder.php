<?php

  use Illuminate\Database\Seeder;

  class DatabaseSeeder extends Seeder
  {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      factory(\App\Models\User::class, 1)->create();
      factory(\App\Models\Test::class, 5)->create();
      factory(\App\Models\Question::class, 50)->create();
      factory(\App\Models\Answer::class, 220)->create();
    }
  }
