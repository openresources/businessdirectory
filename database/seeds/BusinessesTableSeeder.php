<?php

use Illuminate\Database\Seeder;

class BusinessesTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Business::class, 10)->states('owner')->create();
    }
}
