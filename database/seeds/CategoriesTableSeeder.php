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
      for($i = 0; $i < 50; $i++) {
        DB::table('categories')->insert([
          'title' => str_random(10),
          'description' => str_random(10).'@gmail.com',
          'sort' => 1,
        ]);
      }
    }
}
