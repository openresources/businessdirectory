<?php

use App\Common\Enums\Sectors;
use App\Sector;
use Illuminate\Database\Seeder;

class SectorsTableSeeder extends Seeder
{
    public function run()
    {
        foreach (Sectors::getValues() as $value) {
            $name = (String) Str::of(Sectors::getDescription($value))->title();
            factory(App\Sector::class)->create(['name' => $name, 'description' => $name]);
        }
    }
}
