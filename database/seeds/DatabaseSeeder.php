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
      factory(\App\Models\User::class, 11)->create();
      factory(\App\Models\Test::class, 15)->create();
      factory(\App\Models\Question::class, 60)->create();
      factory(\App\Models\Answer::class, 240)->create();
    }
  }
