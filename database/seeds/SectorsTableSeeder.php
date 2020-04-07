<?php

use App\Common\Enums\Icons;
use App\Common\Enums\Sectors;
use App\Sector;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SectorsTableSeeder extends Seeder
{
    public function run()
    {
        $icons = Icons::toArray();

        foreach (Sectors::getValues() as $value) {
            $name = (String) Str::of(Sectors::getDescription($value))->title();

            $key = Sectors::getKey($value);

            factory(App\Sector::class)->create([
                'name' => $name,
                'description' => $name,
                'icon' => $icons[$key]
            ]);
        }
    }
}
