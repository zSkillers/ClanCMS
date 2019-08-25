<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'name' => 'zamight',
          'email' => 'admin@admin.com',
          'password' => '$2y$10$Zt3z8h6unOjGefFA0n.GwOzTd8esSTblJLgBjM0irzU02sKwiLfl.',
          'rsname' => 'zamight',
          'type' => 'admin',
          'photo' => 'http://zforums.org/data/avatars/l/0/1.jpg?1503969235',
          'title' => 'owner',
          'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
          'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
        ]);

          for($i = 0; $i < 50; $i++) {
            DB::table('users')->insert([
              'name' => str_random(10),
              'email' => str_random(10).'@gmail.com',
              'password' => bcrypt('secret'),
              'rsname' => str_random(10),
              'title' => '',
              'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
              'updated_at' => \DB::raw('CURRENT_TIMESTAMP')
            ]);
          }
    }
}
