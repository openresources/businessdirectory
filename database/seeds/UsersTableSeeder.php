<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        if (app()->environment('local')) {
            factory(User::class)->create([
                'email' => "reginald.arnold@example.com",
                'name' => "Reginald Arnold",
                'password' => bcrypt('seven,7'),
            ]);

            factory(User::class)->state('admin')->create();
        } else {
            factory(User::class)->state('admin')->create([
                'password' => bcrypt('EightyEight,88'),
            ]);
        }
    }
}
