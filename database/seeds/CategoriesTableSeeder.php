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
        for ($i = 0; $i < 10; $i++) {
            DB::table('categories')->insert([
                'title' => str_random(10),
                'description' => str_random(10),
                'sort' => 1,
                'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
                'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
            ]);

            for ($j = 0; $j < 10; $j++) {
                DB::table('forums')->insert([
                    'title' => str_random(10),
                    'category_id' => $i + 1,
                    'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
                    'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
                ]);

                for ($q = 0; $q < 10; $q++) {
                    DB::table('threads')->insert([
                        'title' => str_random(10),
                        'user_id' => $j + 1,
                        'forum_id' => $j + 1,
                        'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
                        'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
                        'last_user_reply_id' => $j + 1
                    ]);
                    for ($w = 0; $w < 10; $w++) {
                        DB::table('posts')->insert([
                            'user_id' => $w + 1,
                            'thread_id' => $q + 1,
                            'body' => "This is a hello world test!",
                            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
                            'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
                        ]);
                    }
                }
            }
        }
    }
}
