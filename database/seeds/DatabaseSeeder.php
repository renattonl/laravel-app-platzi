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
        // $this->call(UsersTableSeeder::class);
        App\User::create([
          "name" => "Renatto NL",
          "email" => "renattonl@gmail.com",
          "password" => bcrypt("pass")
        ]);
        factory(App\Post::class, 24)->create();
    }
}
