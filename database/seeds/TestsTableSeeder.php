<?php

  use Illuminate\Database\Seeder;
  use Illuminate\Support\Facades\DB;
  use Illuminate\Support\Str;

  class TestsTableSeeder extends Seeder
  {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tests')->insert(
        [
          'name' => Str::random(25),
          'description' => Str::random(50),
        ]
      );
    }
  }
