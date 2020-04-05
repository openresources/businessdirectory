<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\User::class)->states('admin')->create();
    }
}
