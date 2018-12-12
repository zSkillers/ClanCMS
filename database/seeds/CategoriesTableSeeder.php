<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 0; $i < 10; $i++) {
        DB::table('categories')->insert([
          'title' => str_random(10),
          'description' => str_random(10),
          'sort' => 1,
        ]);

        for($j = 0; $j < 10; $j++) {
          DB::table('forums')->insert([
            'title' => str_random(10),
            'category_id' => $i+1,
          ]);
        }
      }
    }
}
